<?php
 //header("content-type:text/html; charset=utf-8");
  

require_once ('dao/data.php');

$data = new Option();
$carr = $data->getCurState(); 
$cfg = $data->getCfgInfo();
		
		$cnt =0;
		for($i=0; $i<5; $i++) {
			for($j=0; $j<2; $j++){  
				$tt = 27+$j*32; $yy= 31+$i*14;
				echo '<script type="text/javascript">drawcirles('.($yy-4).','.($tt+6).','.$carr[$cnt]['senser_tem'].','.Option::tembound.');</script>';

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
