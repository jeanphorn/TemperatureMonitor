
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
                <td><img src="images/tab/tb.gif" width="16" height="16" /></td>
    			<td valign="middle"><font size="2">【 温湿度监控中心】　</font></td>
    			       
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
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">传感器名称</span></div></td>
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">传感器地址</span></div></td>
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">当前温度</span></div></td>
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">当前湿度</span></div></td>
          </tr>
          
          
         <c:forEach items="${pkgs}" var="pkg" >
      <tr>
      <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">${pkg.packageid}</span></div></td>
      <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">${pkg.orderid}</span></div></td>
      <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">${pkg.addresser}</span></div></td>
      <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">${pkg.reciever}</span></div></td>  
      </tr>
   </c:forEach> 
                
          
   </table></td>
	
  </tr>
</table>
  </body>
</html>

