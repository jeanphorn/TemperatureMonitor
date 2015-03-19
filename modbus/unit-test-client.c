#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <errno.h>
#include <modbus.h>
#include <unistd.h>
#include <fcntl.h>
#include <time.h>
#include <pthread.h>
#include <mysql/mysql.h>

#include "unit-test.h"
FILE *fp;

MYSQL mysql;
MYSQL_RES *res;
MYSQL_ROW row;
char sqlcmd[200];
int t,r;

int getdir(char *dir)
{
	int year,mon,day;
	time_t t;
	struct tm *timeinfo;
	time (&t);
	timeinfo = localtime(&t);

	year = timeinfo->tm_year + 1900;
	mon = timeinfo->tm_mon + 1;
	day = timeinfo->tm_mday;

	sprintf(dir,"%d%d%d",year,mon,day);

	return 1;
}
int JudgeDir(char *dir)
{
	
	if(chdir(dir) == -1)
		mkdir(dir);
	chdir("../");
	return 1;
}

int GetFileName(char *name)
{
	int hour,m,sec;
	time_t t;
	struct tm *timeinfo;
	time (&t);
	timeinfo = localtime(&t);

	sprintf(name,"%d%d%d.txt",timeinfo->tm_hour,timeinfo->tm_min,timeinfo->tm_sec);

	return 1;
}


void check_db() {
	
	while(1)
	{	//printf("check db...\n");
		sprintf(sqlcmd,"%s","delete from history where TO_DAYS(NOW())-TO_DAYS(senser_time) > 30*12;");
 		t=mysql_real_query(&mysql,sqlcmd,(unsigned int)strlen(sqlcmd));
		sleep(60*60*24);
	}
}

int main(int argc, char *argv[])
{
	const int NB_REPORT_SLAVE_ID = 10;
	uint8_t *tab_rp_bits = NULL;
	uint16_t *tab_rp_registers = NULL;
	uint16_t *tab_rp_registers_bad = NULL;
	modbus_t *ctx = NULL;
	int nb_points;
	int rc;
	uint32_t new_response_to_sec;
	uint32_t new_response_to_usec;
	int use_backend;
	int cnt,temp,wet;
	int slaveid,i;
	//FILE *file;
	pthread_t threaddb;


	char senserName[20],str[LINE_LEN],fileName[20],abPath[256],dir[256],content[LINE_LEN];
	
	/*if(argc < 2)
	{
		printf("usage: unit-test-client [divce id].\n\n");
		return -1;
	}*/

	mysql_init(&mysql);//初始化MYSQL标识符，用于连接
	if(!mysql_real_connect(&mysql,"localhost","root","root","TemWet",0,NULL,0))
	{
  		fprintf(stderr,"无法连接到数据库，错误原因是:%s/n",mysql_error(&mysql));
		return -1;
	}
	
	printf("数据库连接成功!\n");
	srand((unsigned)time(NULL));		
	sprintf(sqlcmd,"%s","set names utf8;");
 	t=mysql_real_query(&mysql,sqlcmd,(unsigned int)strlen(sqlcmd));
	
	pthread_create(&threaddb,NULL,(void*)(&check_db),NULL);
	
	ctx = modbus_new_rtu("/dev/ttyS0", 9600, 'N', 8, 1);

	 if (ctx == NULL) {
		 fprintf(stderr, "Unable to allocate libmodbus context\n");
		 return -1;
	 }
	 //modbus_set_debug(ctx, TRUE);
	 modbus_set_error_recovery(ctx,
		 MODBUS_ERROR_RECOVERY_LINK |
		 MODBUS_ERROR_RECOVERY_PROTOCOL);
	
	 if (modbus_connect(ctx) == -1) {
		 fprintf(stderr, "Connection failed: %s\n", modbus_strerror(errno));
		 modbus_free(ctx);
		 return -1;
	 }
	
	 modbus_get_response_timeout(ctx, &new_response_to_sec, &new_response_to_usec);
	 //modbus_set_response_timeout(ctx,0,800000);
 	
loop: 

	sprintf(sqlcmd,"%s","select senser_id,senser_addr from sensers");
 	t=mysql_real_query(&mysql,sqlcmd,(unsigned int)strlen(sqlcmd));

 	if(t)
	{
 		printf("查询数据库失败%s/n",mysql_error(&mysql));
		return -1;
	}
	res=mysql_store_result(&mysql);		//返回查询的全部结果集
	

	 /* Allocate and initialize the memory to store the registers */
	 nb_points = (UT_REGISTERS_NB > UT_INPUT_REGISTERS_NB) ?
UT_REGISTERS_NB : UT_INPUT_REGISTERS_NB;
	 tab_rp_registers = (uint16_t *) malloc(nb_points * sizeof(uint16_t));
	 memset(tab_rp_registers, 0, nb_points * sizeof(uint16_t));

	 //slaveid = 24;
	 cnt =0;
	 //while(fgets(str,LINE_LEN,file) != NULL)
	 while(row=mysql_fetch_row(res))
	 {

		 //sscanf(str,"%s %d",senserName,&slaveid);
		 
		 modbus_set_slave(ctx, atoi(row[1]));
		printf("senser address:%d\n",atoi(row[1]));
		rc = modbus_read_input_registers(ctx, UT_INPUT_REGISTERS_ADDRESS,
			 UT_INPUT_REGISTERS_NB,
			 tab_rp_registers);
		 if(rc > 0)
		 {
			  temp = tab_rp_registers[0]/100;
			  printf("%d modbus_read_input_registers_tmp: %d. from device %d.\n",cnt,tab_rp_registers[0],slaveid);
		 }
		 else
			 temp = -1;

		 rc = modbus_read_input_registers(ctx, UT_INPUT_REGISTERS_WET_ADDRESS,
			 UT_INPUT_REGISTERS_NB,
			 tab_rp_registers);
		 if(rc > 0)
		 {
			 wet = tab_rp_registers[0]/100;
			  printf("%d modbus_read_input_registers_wet: %d. from device %d.\n",cnt,tab_rp_registers[0],slaveid);
		 }
		 else
			 wet = -1;
		
		
			
		
		 strcpy(sensers[cnt].senserName,senserName);
		 sensers[cnt].senserId = atoi(row[0]);
		 sensers[cnt].temperature = temp;
		 sensers[cnt].humidity = wet;
 		

		 printf("\n");
		 sleep(1);
		 //sprintf(content,"%s\t%d\t%d\t%d\r\n",senserName,slaveid,temp,wet);
		 //fputs(content,fp);
		cnt++;

	 }
	
	
	for(i=0; i<cnt; i++)
	{
		sprintf(sqlcmd,"update cursenstate set senser_tem=%d,senser_wet=%d where senser_id=%d",sensers[i].temperature,sensers[i].humidity,sensers[i].senserId);
		mysql_query(&mysql,sqlcmd);

		sprintf(sqlcmd,"insert into history (senser_time,senser_id,senser_temp,senser_wet) values(NOW(),%d,%d,%d)",sensers[i].senserId,sensers[i].temperature,sensers[i].humidity);
		mysql_query(&mysql,sqlcmd);
		sleep(1);

	}
	
	sleep(60*30);
	 //fseek(file,0L,0);
	 //fclose(fp);
	goto loop;
	
	//fclose(file);
	return 0;
}
