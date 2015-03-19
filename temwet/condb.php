<?php

$link=mysql_connect("localhost","root","root");
if(!$link) echo "Failed connect to Database.";

mysql_select_db("TemWet",$link);
mysql_query("set names utf8");

?>
