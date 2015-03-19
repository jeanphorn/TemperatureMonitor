
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>config event</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	
	<link rel="stylesheet" type="text/css" href="images/skin.css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #EEF2FB;
}
.STYLE1 {font-size: 12px}
-->
</style>
  </head>
<?php

require_once ('dao/data.php');
$data = new Option();
$carr = $data->getCfgInfo();

?>
  
<body>
<form name="configform" method="post" action="dao/config.php">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31" width = "180px"><div class="titlebt">报警配置</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><br>
      <table width="100%" height="144" border="0" cellpadding="0" cellspacing="0" class="line_table">
        <tr>
          <td width="10%" height="27" valign="middle" background="images/news-title-bg.gif"><span class="STYLE1"><strong>报警信息配置</strong></span></td>
        </tr>
        <tr>
          <td height="102" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="36%"><div align="left" class="STYLE1">
            <div align="right">温度报警上限：</div>
          </div></td>
          <td width="64%" class="STYLE1">　<input type="hidden" name="uid" value="<?=$carr['uid']?>">　<input name="maxtem" type="text" value ="<?=$carr['max_tem']?>" style="width:140px"/></td>
        </tr>
        <tr>
          <td><div align="right" class="STYLE1">湿度报警上限：</div></td>
          <td class="STYLE1">　　<input name="maxwet" type="text" value ="<?=$carr['max_wet']?>" style="width:140px"/></td>
        </tr>

	<tr>
          <td><div align="right" class="STYLE1">事件发送url：</div></td>
          <td class="STYLE1">　　<input name="eventurl" type="text" value ="<?=$carr['event_url']?>" style="width:400px"/></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>　　<input type="submit" name="Submit" value="修改" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>		  </td>
        </tr>
        <tr>
          <td width="7%" height="27" valign="middle" background="images/news-title-bg.gif">&nbsp;</td>
        </tr>
      </table></td>
    <td background="images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="images/mail_leftbg.gif"><img src="images/buttom_left2.gif" width="17" height="17" /></td>
    <td background="images/buttom_bgs.gif"><img src="images/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="images/mail_rightbg.gif"><img src="images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</form>
</body>
</html>

