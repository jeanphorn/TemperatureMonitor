	
There are mainly two parts in this project. One is the model of capturing temperature and humidity data, and the other is monitoring model.

	1.Libmodbus is a libarary to gather the temperature and humidity data from RS485 devices with temperature and humidity sensers integrated in them. The sensers connected to the host through 
RTU mode and 9600 Baud.
	Firstly, install the modbus libarary. 
	Refer: https://github.com/jeanphorn/libmodbus

	Compile the c file in modbus with follow commands:
	gcc unit-test-client.c -o unit-test `pkg-config --libs --cflags libmodbus` -lmysqlclient


	2. Web pages and scripts files are included in temwet file. Some costum interface functons operating mysql database are packated in temwet/dao/db.php Ajax,CSS and js techniques were adopt to complete 
dynamic interaction. Some data visualization materials  like fusioncharts and D3 are also used.

	3. tw.sql is a database file  for testing. User name is "root", and password is "root" too. the name of database is "TemWet".
