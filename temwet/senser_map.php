<?php
require_once ('dao/data.php');

$data = new Option();
$carr = $data->getCurState();  
$cfg = $data->getCfgInfo();

?>
<html>
  <head>
    <title>info page</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!--<meta http-equiv ="refresh" content="60">-->
	<script type="text/javascript" src="js/d3.v3.js"></script>
	<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/mark.css">
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->

  </head>
 
  <body bgcolor="#EEF2FB" class="off-canvas hide-extras antialiased">
	<div id="layer0" style="position:absolute;width:100%;height:100%;z-index:-1">
	<img src="images/map_black.png" width=100% height=100%/>
	</div>
	<div id="div1" class="sed" >
		<div id="div10" >
		<script type="text/javascript" src="js/concert.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
		<script type="text/javascript">
		//setIntervals();
		
		setInterval("refresh()",5000);
		</script></div>
		<script type="text/javascript" src="js/showinfo.js"></script>
	    <div id="div02" class="embeddiv">
        	<!--<script type="text/javascript" src="js/showinfo.js"></script>-->
		<?php
		$cnt =0;
		for($i=0; $i<5; $i++) {
			for($j=0; $j<2; $j++){  
				$tt = 27+$j*32; $yy= 31+$i*14;
				echo '<script type="text/javascript"> drawcirles('.($yy-4).','.($tt+6).','.$carr[$cnt]['senser_tem'].','.Option::tembound.');</script>';

				if($carr[$cnt]['senser_tem']> $cfg['max_tem'] || $carr[$cnt]['senser_wet']> $cfg['max_wet']) {
					echo '<a class="red button" style="position:absolute;left:'.($yy-4).'%;top:'.$tt.'%" onmouseover='."'createTable2(this,".$carr[$cnt]['senser_tem'].",".$carr[$cnt++]['senser_wet'].",".$cfg['max_tem'].");'>异常</a>";
				}else
					echo '<a class="green button" style="position:absolute;left:'.($yy-4).'%;top:'.$tt.'%" onmouseover='."'createTable2(this,".$carr[$cnt]['senser_tem'].",".$carr[$cnt++]['senser_wet'].",".$cfg['max_tem'].");'>正常</a>";

				echo '<script type="text/javascript"> drawcirles('.($yy+2).','.($tt+6).','.$carr[$cnt]['senser_tem'].','.Option::tembound.');</script>';
				if($carr[$cnt]['senser_tem']> $cfg['max_tem'] || $carr[$cnt]['senser_wet']> $cfg['max_wet'])
					echo '<a class="red button" style="position:absolute;left:'.($yy+2).'%;top:'.$tt.'%" onmouseover='."'createTable2(this,".$carr[$cnt]['senser_tem'].",".$carr[$cnt++]['senser_wet'].",".$cfg['max_tem'].");'>异常</a>";
				else
					echo '<a class="green button" style="position:absolute;left:'.($yy+2).'%;top:'.$tt.'%" onmouseover='."'createTable2(this,".$carr[$cnt]['senser_tem'].",".$carr[$cnt++]['senser_wet'].",".$cfg['max_tem'].");'>正常</a>";
			}
		}
		?>
	   </div>
	</div>
	<div id = "testdiv"></div>
  </body>
</html>

