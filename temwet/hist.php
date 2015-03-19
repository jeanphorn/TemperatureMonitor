
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
	
        <td width="8" background="images/tab/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="35" background="images/tab/tab_19.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="35"><img src="images/tab/tab_18.gif" width="12" height="35" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="STYLE4">&nbsp;&nbsp;共有${pageCount}页，当前第${pageNo}页</td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                <c:if test="${pageNo==1}">
                  <td width="40"><img src="images/tab/first.gif" width="37" height="15" border="0" /></td>
                  <td width="45"><img src="images/tab/back.gif" width="43" height="15"  border="0"/></td>
                </c:if>
                <c:if test="${pageNo!=1}">
                  <td width="40"><a href="list?pageNo=1"><img src="images/tab/first.gif" width="37" height="15" border="0" /></a></td>
                  <td width="45"><a href="list?pageNo=${pageNo-1}"><img src="images/tab/back.gif" width="43" height="15"  border="0"/></a></td>
                </c:if>
                <c:if test="${pageNo==pageCount}">
                  <td width="45"><img src="images/tab/next.gif" width="43" height="15" border="0" /></td>
                  <td width="40"><img src="images/tab/last.gif" width="37" height="15" border="0" /></td>
                </c:if>
                <c:if test="${pageNo!=pageCount}">
                  <td width="45"><a href="list?pageNo=${pageNo+1}"><img src="images/tab/next.gif" width="43" height="15" border="0" /></a></td>
                  <td width="40"><a href="list?pageNo=${pageCount}"><img src="images/tab/last.gif" width="37" height="15" border="0" /></a></td>
                </c:if> 
                  <td width="100"><div align="center"><form  method="post" action="list" name="form2">

                  <span class="STYLE1">转到第
                  <input name="text" type="text" size="4" style="height:12px; width:20px; border:1px solid #999999;" /> 
                    页 </span></form></div></td>
                  <td width="40"><img src="images/tab/go.gif" width="37" height="15" onClick="form2.submit();"/></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="images/tab/tab_20.gif" width="16" height="35" /></td>
      </tr>
    </table></td>
  </tr>
</table>
  </body>
</html>

