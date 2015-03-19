<?php
/********************************************
*数据库访问类
*********************************************/
class DB_MySQL 
{
//==========================
var $Host = "localhost";		//服务器地址
var $Database = "TemWet";		//数据库名称
var $User = "root";			//用户名
var $Password = "root";			//用户密码
//==========================
var $Link_ID = 0;			//数据库连接	
var $Query_ID = 0;			//查询结果	
var $Row_Result = array();		//结果集组成的数组	
var $Field_Result = array();		//结果集字段名组成的数组
var $Affected_Rows;			//影响的行数
var $Rows;				//结果集中记录行数
var $Fields;				//结果集中字段个数
var $Row_Position = 0;			//记录指针位置索引

//*******************************************************
	/*** 构造函数 */
	function __construct()
	{
		$this->connect();
	}//__construct()

	/*** 解析函数 */
	function __destruct()
	{
		//mysql_free_result($this->Query_ID);
		mysql_close($this->Link_ID);
	}//__destruct()

	/*** 连接服务器,选择数据库 */
	function connect($Database = "",$Host = "",$User = "",$Password = "") 
	{
		if ("" == $Database)
		{
		  $Database = $this->Database;
		}
		if ("" == $Host)
		{
		  $Host     = $this->Host;
		}
		if ("" == $User)
		{
		  $User     = $this->User;
		}
		if ("" == $Password)
		{
		  $Password = $this->Password;
		}
		//==========================
		if ( 0 == $this->Link_ID ) 
		{
			$this->Link_ID=@mysql_pconnect($Host, $User, $Password);
			if (!$this->Link_ID) 
			{
			$this->halt("连接数据库服务端失败!");
			}
			if (!mysql_select_db($this->Database,$this->Link_ID))
			{
			$this->halt("不能打开指定的数据库:".$this->Database);
			}

			@mysql_query("set names utf8",$this->Link_ID);
		}
		return $this->Link_ID;
	}//connect()

	/*** 释放内存 */
	function free() 
	{
		if ( @mysql_free_result($this->Query_ID) )
		unset ($this->Row_Result);
		$this->Query_ID = 0;
	}//free()

	/*** 执行查询 */
	function query($Query_String) 
	{
		/* 释放上次查询占用的内存 */
		if ($this->Query_ID) 
		{
			$this->free();
		}
		if(0 == $this->Link_ID)
		{
			$this->connect();
		}
		
		
		$this->Query_ID = @mysql_query($Query_String,$this->Link_ID);
		
		if (!$this->Query_ID) 
		{
		$this->halt("SQL查询语句出错: ".$Query_String);
		}

		return $this->Query_ID;
	}//query()
	/*** 将结果集指针指向指定行 */
	function seek($pos)
	{
		if(@mysql_data_seek($this->Query_ID, $pos))
		{
			$this->Row_Position = $pos;
			return true;
		}
		else
		{
			$this->halt("定位结果集发生错误!");
			return false;
		}

	}//seek()

	/*** 返回结果集记录组成的数组 */
	function get_rows_array() 
	{
		$this->get_rows();
		
		if($this->get_rows()==0)
			{$this->Row_Result="1";}
		
		for($i=0;$i<$this->Rows;$i++)
		{
			if(!mysql_data_seek($this->Query_ID,$i))
			{
				$this->halt("mysql_data_seek查询语句出错");
			}
				$this->Row_Result[$i] = mysql_fetch_array($this->Query_ID);	
		}
		return $this->Row_Result;
	}//get_rows_array()

	/*** 返回结果集字段组成的数组 */
	function get_fields_array() 
	{
		$this->get_fields();
		for($i=0;$i<$this->Fields;$i++)
		{
			$obj = mysql_fetch_field($this->Query_ID,$i);
			$this->Field_Result[$i] = $obj->name;
		}
		return $this->Field_Result;
	}//get_fields_array()

	/*** 返回影响记录数 */
	function get_affected_rows() 
	{
		$this->Affected_Rows = mysql_affected_rows($this->Link_ID);
		return $this->Affected_Rows;
	}//Get_Affected_Rows()

	/*** 返回结果集中记录行数 */
	function get_rows() 
	{
		$this->Rows = mysql_num_rows($this->Query_ID); 
		return $this->Rows;
	}//Get_Rows()

	/*** 返回结果集中字段个数 */
	function get_fields() 
	{
		$this->Fields = mysql_num_fields($this->Query_ID);
		return $this->Fields;
	}//Get_Fields()

	/*** 执行SQL语句并返回由查询结果中第一行记录组成的数组 */
	function fetch_one_array($sql)
	{
		$this->query($sql);
		return mysql_fetch_array($this->Query_ID);
	}//fetch_one_array()

	/*** 打印错误信息 */
	function halt($msg) 
	{
		$this->Error=mysql_error();
		printf("<BR><b>数据库发生错误:</b> %s<br>\n", $msg);
		printf("<b>MySQL 返回错误信息:</b> %s <br>\n",	$this->Error);
		die("脚本终止");
	}//halt()
}

$DB = new DB_MySQL;
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////


?>

