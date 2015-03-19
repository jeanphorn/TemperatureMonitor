<?php

require_once ('search.php');

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
            <td width="76%" valign="middle"><form action="search.php" method="post" name="form1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="images/tab/tb.gif" width="16" height="16" /></td>
    			<td valign="middle"><font size="2">【 历史数据查询 】　</font></td>
			<td valign="right"><font size="2">   传感器：</font></td>
    			<td><div align="left"><select name="senser" style="width:100px">
      				<option value="<? echo $sensername ?>" ><?if($sensername != "all") echo $sensername; else echo "全部" ?></option>
				<?php
					if($sensername != "all") echo '<option value="all">全部</option>';
					foreach($carr as $sen) {
						echo '<option value="'.$sen['senser_name'].'">'.$sen['senser_name'].'</option>';
					}
				?>
    			</select></td>
			<td valign="middle"><font size="2">   时间：</font></td>
			<td><div align="left"><select name="time" style="width:100px"> 
			<?php
				for($i=1; $i <= 12 ; $i ++) {
					echo '<option value='.$i.'>最近'.$i.'个月</option>';
				}
			?>
			</select></td> 

			<td><img src="images/vie.gif" width="16" height="16" /><input type="submit" name="submit" value="查询" /></td> 
              </tr>
            </table></form></td>
            
           
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
           
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">当前温度</span></div></td>
            <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">当前湿度</span></div></td>
 	    <td width="10%" height="22" background="images/tab/bg.gif" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">日期时间</span></div></td>
          </tr>
          
       <?php 

	require_once( 'search.php');
        foreach( $res as $sen) {
      	echo "<tr>";
        echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">'.$sen['senser_name']."</span></div></td>";
      	
      	echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">'.$sen['senser_temp']."</span></div></td>";
      	echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">'.$sen['senser_wet']."</span></div></td>";
	echo '<td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE1">'.$sen['senser_time']."</span></div></td>";
      	echo "</tr>";
   	}
      ?>       
          
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
            <td class="STYLE4">&nbsp;&nbsp;共有<?=$pages?>页，当前第<?=$pageno?>页</td>
            <td><table border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
		<?php
		  $pre = $pageno-1;
		  $nex = $pageno+1;
                  if($pageno == 1) {
                  	echo '<td width="40"><img src="images/tab/first.gif" width="37" height="15" border="0" /></td>';
                  	echo '<td width="45"><img src="images/tab/back.gif" width="43" height="15"  border="0"/></td>';
                 }
                 if($pageno != 1) {
                  	echo '<td width="40"><a href="search.php?pageno=1&pages='.$pages."&senname=".$sensername."&time=".$time.'"><img src="images/tab/first.gif" width="37" height="15" border="0" /></a></td>';
                  	echo '<td width="45"><a href="search.php?pageno='.$pre."&pages=".$pages."&senname=".$sensername."&time=".$time.'"><img src="images/tab/back.gif" width="43" height="15"  border="0"/></a></td>';
               	  }
		
                  if($pageno == $pages) {
                  	echo '<td width="45"><img src="images/tab/next.gif" width="43" height="15" border="0" /></td>';
                  	echo '<td width="40"><img src="images/tab/last.gif" width="37" height="15" border="0" /></td>';
                  }
		
                  if($pageno != $pages) { 
                  echo '<td width="45"><a href="search.php?pageno='.$nex."&pages=".$pages."&senname=".$sensername."&time=".$time.'"><img src="images/tab/next.gif" width="43" height="15" border="0" /></a></td>';
                  echo '<td width="40"><a href="search.php?pageno='.$pages."&pages=".$pages."&senname=".$sensername."&time=".$time.'"><img src="images/tab/last.gif" width="37" height="15" border="0" /></a></td>';
                  } 
		?>
                  <td width="100"><div align="center"><form  method="post" action="search.php" name="form2">
		  <input type="hidden" name="pages" value="<?=$pages?>">
		  <input type="hidden" name="senname" value="<?=$sensername?>">
		  <input type="hidden" name="time" value="<?=$time?>">
                  <span class="STYLE1">转到第
                  <input name="text" type="text" size="4" style="height:20px; width:36px; border:1px solid #999999;" /> 
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

