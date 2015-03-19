<?php

include ('dao/data.php');
include ('dao/deldev_dao.php');

$data = new Option();
$carr = $data->getSensers();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    
    <title>info page</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {font-size: 12px}
.STYLE3 {font-size: 12px; font-weight: bold; }
.STYLE4 {
	color: #03515d;
	font-size: 12px;
}
-->
</style>
  </head>
  
  <body>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" background="images/tab/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="images/tab/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%" valign="middle">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td ><img src="images/tab/tb.gif" width="16" height="16" /></td>
    		<td valign="middle"><font size="2"> 【设备管理】　</font></td>
    			       
              </tr>
            </table></td>
            
           
          </tr>
        </table></td>
        <td width="16"><img src="images/tab/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="images/tab/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6">
          <tr>
	    <td width="3%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"></td>
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">传感器名称</span></div></td>
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">传感器地址</span></div></td>
	    <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">类别</span></div></td>
          </tr>
          
   <?php
	$sure = "确认删除该设备?";
      foreach ( $carr as $sen) {
      echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name="checkbox16" value="checkbox" /></div></td>';
      echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">'.$sen['senser_name']."</span></div></td>";
      echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">'.$sen['senser_addr']."</span></div></td>";
      echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE4">';
      echo '<form action="dao/deldev_dao.php" method="post" onSubmit="return confirm('.$sure.');"><input type="hidden" name="senserid"'." value=".$sen['senser_id'].' />';
      echo '<img src="images/tab/edt.gif" width="16" height="16" /><input type="submit" name = "submit" value="编辑"/>&nbsp; &nbsp;<img src="images/tab/del.gif" width="16" height="16" /><input type="submit" name="submit" value="删除"/></form></span></div></td>';
      echo "</tr>";
   }
   ?>        
          
   </table></td>
	
  </tr>
</table>
  </body>
</html>

