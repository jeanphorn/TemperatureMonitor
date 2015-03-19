 <?php

require_once ( 'jsontrend.php' );

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
	<!--<meta http-equiv ="refresh" content="60">-->
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
<style type="text/css">

</style>
  </head>
	
  <body>
   <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>

   <td height="30" background="images/tab/tab_05.gif" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="images/tab/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%" valign="middle"><form action="jsontrend.php" method="post" name="reg_testdate">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="images/tab/tb.gif" width="16" height="16" /></td>
    			<td valign="middle"><font size="2">　温湿度历史趋势图</font></td>
			<td valign="right"><font size="2">   传感器：</font></td>
    			<td><div align="left"><select name="senser" style="width:100px">
				<option value="<?echo $senname ?>" ><?echo $senname ?></option>
				<?php
					foreach($carr as $sen) {
 						if($senname != $sen['senser_name'])
						echo '<option value="'.$sen['senser_name'].'">'.$sen['senser_name'].'</option>';
					}
				?>
    			</select></td>

			<td><div align="middle">
			<select name="YYYY" onchange="YYYYDD(this.value)" style="width:100px">
    				<option value="<? echo $year ?>"><? echo $year ?>年</option>
  			</select>
  			<select name="MM" onchange="MMDD(this.value)" style="width:100px">
   				 <option value="<? echo $month ?>"><? echo $month ?>月</option>
  			</select>
  			<select name="DD" style="width:100px">
   				 <option value="<? echo $day ?>"><? echo $day ?>日</option>
  			</select></td>    

						

			<td><input type="submit" name="submit" value="确定" /></td> 
              </tr>
            </table></form>
            
	    <script language="JavaScript"><!--   
   		function YYYYMMDDstart()   
   		{   
           		MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];   
    			yy = <? echo $year; ?>;
			mm = <? echo $month; ?>;
           		//先给年下拉框赋内容  
			 
           		var y  = new Date().getFullYear();   
           		//for (var i = (y-1); i <= y; i++) 
				if( yy == y)
                  		 document.reg_testdate.YYYY.options.add(new Option(" "+ y-1 +" 年", y-1));  
				else
				document.reg_testdate.YYYY.options.add(new Option(" "+ y +" 年", y));	 
    					
          		 //赋月份的下拉框   
          		 for (var i = 1; i < 13; i++)  
				if(mm != i)
                 		  document.reg_testdate.MM.options.add(new Option(" " + i + " 月", i));   
    
           		//document.reg_testdate.YYYY.value = y;   
           		//document.reg_testdate.MM.value = new Date().getMonth() + 1;   
          		 var n = MonHead[new Date().getMonth()];   
          		 if (new Date().getMonth() ==1 && IsPinYear(YYYYvalue)) n++;   
              		  writeDay(n); //赋日期下拉框Author:meizz   
          		 //document.reg_testdate.DD.value = new Date().getDate();   
  		}   
  		 if(document.attachEvent)   
      		 window.attachEvent("onload", YYYYMMDDstart);   
  		 else   
      		 window.addEventListener('load', YYYYMMDDstart, false);   
  		 function YYYYDD(str) //年发生变化时日期发生变化(主要是判断闰平年)   
   		{   
          		 var MMvalue = document.reg_testdate.MM.options[document.reg_testdate.MM.selectedIndex].value;   
           		if (MMvalue == ""){ var e = document.reg_testdate.DD; optionsClear(e); return;}   
           		var n = MonHead[MMvalue - 1];   
           		if (MMvalue ==2 && IsPinYear(str)) n++;   
                		writeDay(n)   
   		}   
   		function MMDD(str)   //月发生变化时日期联动   
   		{   
       		 var YYYYvalue = document.reg_testdate.YYYY.options[document.reg_testdate.YYYY.selectedIndex].value;   
        		if (YYYYvalue == ""){ var e = document.reg_testdate.DD; optionsClear(e); return;}   
        		var n = MonHead[str - 1];   
        		if (str ==2 && IsPinYear(YYYYvalue)) n++;   
       		writeDay(n)   
   		}   
   		function writeDay(n)   //据条件写日期的下拉框   
   		{   
			dd = <? echo $day; ?>;
          		 var e = document.reg_testdate.DD; optionsClear(e);  
           		for (var i=1; i<(n+1); i++) 
				if(dd !=i)  
               			 e.options.add(new Option(" "+ i + " 日", i));   
  		 }   
   		function IsPinYear(year)//判断是否闰平年   
   		{     return(0 == year%4 && (year%100 !=0 || year%400 == 0));}   
   		function optionsClear(e)   
  		 {   
     		   e.options.length = 1;   
   		}   
  		//--> </script></td>
           
          </tr>
        </table></td>
        <td width="16"><img src="images/tab/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>

  <tr ><table width="100%" border="0" cellspacing="0" cellpadding="0" ><tr>
    <td height="30%" valign="middle">
     <script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.zune.js"></script>
	<script type="text/javascript">
	jsondata_daytrend = <?php echo $daytrendjson; ?>;
	FusionCharts.ready(function(){
    	var temChart = new FusionCharts({
      type: "msline",
      renderAt: "chartContainer",
      width: "600",
      height: "300",
      dataFormat: "json",
      dataSource: jsondata_daytrend
 
  	});
  	temChart.render("chartContainer");
	}); 
 	
	</script>
	<div id="chartContainer"></div>
    </td>
     
    </tr></table>
    <tr><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
     <td height="30%" valign="middle">
	<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.zune.js"></script>
	<script type="text/javascript">
	jsondata_mothtrend = <?php echo $mothtrendjson; ?>;
	
	FusionCharts.ready(function(){
    	var wetChart = new FusionCharts({
      type: "msline",
      renderAt: "chartContainer1",
	width: "600",
      height: "300",
      dataFormat: "json",
      dataSource: jsondata_mothtrend
 
  	});
  	wetChart.render("chartContainer1");   
	
	}); 
 
	</script>
	<div id="chartContainer1"></div>
    </td>
    </tr></table>
  </tr>
  <tr>
   
	
  </tr>
</table>
  </body>
</html>

