 <?php

require_once ( 'jsondata.php' );
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

   <td height="30" background="images/tab/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="images/tab/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="76%" valign="middle"><form action="jsondata.php" method="post" name="form1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="images/tab/tb.gif" width="16" height="16" /></td>
    			<td valign="middle"><font size="2">实时温湿度状态显示　</font></td>
			<td valign="right"><font size="2">   传感器：</font></td>
    			<td><div align="left"><select name="senser" style="width:100px">
				<option value="<? echo $senname ?>" ><?echo $senname ?></option>
				<?php
					foreach($carr as $sen) {
 						if($senname != $sen['senser_name'])
						echo '<option value="'.$sen['senser_name'].'">'.$sen['senser_name'].'</option>';
					}
				?>
    			</select></td>

			<td><input type="submit" name="submit" value="确定" /></td> 
              </tr>
            </table></form></td>
            
           
          </tr>
        </table></td>
        <td width="16"><img src="images/tab/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>

  <tr><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>
    <td height="30%" valign="middle">
     <script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.zune.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.ocean.js"></script>
	<script type="text/javascript">
	jsondata_tem = <?php echo $temjson; ?>;
	
	FusionCharts.ready(function(){
    	var temChart = new FusionCharts({
      type: "thermometer",
      renderAt: "chartContainer",
      //width: "500",
      //height: "300",
      dataFormat: "json",
      dataSource: jsondata_tem
 
  	});
  	temChart.render("chartContainer");
	
	function getdata(){
		<? $res = $data->getStateByName($sensername);?>;
		<?$tem = $res['senser_tem'];?>;
		
		temChart.setData(<? echo $tem; ?>);
	}
	
	setInterval(getdata,1000*60);
	}); 
 	
	</script>
	<div id="chartContainer"></div>
    </td>
      <td height="30%" valign="middle">
	<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.zune.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.carbon.js"></script>
	<script type="text/javascript">
	jsondata_wet = <?php echo $wetjson; ?>;
	
	FusionCharts.ready(function(){
    	var wetChart = new FusionCharts({
      type: "thermometer",
      renderAt: "chartContainer1",
      //width: "500",
      //height: "300",
      dataFormat: "json",
      dataSource: jsondata_wet
 
  	});
  	wetChart.render("chartContainer1");   
	//setTimeout("temChart.render('chartContainer1')",1000);
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

