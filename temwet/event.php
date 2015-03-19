<?php
 header("content-type:text/html; charset=utf-8");
	

	require_once ('dao/data.php');

	mb_internal_encoding("UTF-8");
  	function getRes($senname)
	{
		$re ="";
		for($i = 0; $i < mb_strlen($senname); $i++)
		{
			$tmp = mb_substr($senname,$i,1);
			if(is_numeric($tmp)) $re .= $tmp;
		}
		return $re;
	}


	$data = new Option();
	$carr = $data->getCurState(); 
	
	$cfg = $data->getCfgInfo();

	$flag = 0;

	$xmlData = "<?xml version=\"1.0\" encoding=\"GBK\"?>\n<request>\n";
	$cnt = sizeof($carr);
	
	
	for($i = 0; $i < $cnt; $i++)
	{
		if($carr[$i]['senser_tem'] > $cfg['max_tem'])
		{
			$flags = 1;
			$xmlData .= "<event>
				<appname>TWM</appname>
				  <res>110000000010-00";
			
			//$res = mb_substr($carr[$i]['senser_name'],4); 
			//if(sizeof($res) == 1) $res = "0".$res; 
			$res = getRes($carr[$i]['senser_name']);
			$xmlData .= $res . "</res>\n";
			$xmlData .= "<type>7000001</type>\n";
			$level = 4;
			if($carr[$i]['senser_tem'] > $cfg['max_tem']+5) $level = 5;
			$xmlData .= "<level>".$level."</level>\n";
			$error = "温度高于";
			if($level == 4) $error .= $cfg['max_tem']; else $error .= ($cfg['max_tem']+5);
			$xmlData .= "<msg>".$error."°C</msg>\n";
			$xmlData .= "<time>".date('Y-m-d H:i:s',time()-2*60)."</time>\n";
			$xmlData .= "<lasttime>".date('Y-m-d H:i:s',time())."</lasttime>\n";
			$xmlData .= "<externalId>TWM_0001</externalId>\n";
			$xmlData .= "</event>\n";
		}
		if($carr[$i]['senser_wet'] > $cfg['max_wet'])
		{
			$flags = 2;
			$xmlData .= "<event>
				<appname>TWM</appname>
				   <res>110000000010-00";
			//$res = mb_substr($carr[$i]['senser_name'],3);
			//if(sizeof($res) == 1) $res = "0".$res;
			$res = getRes($carr[$i]['senser_name']);
			$xmlData .= $res . "</res>\n";
			$xmlData .= "<type>7000002</type>\n";
			$level = 4;
			if($carr[$i]['senser_wet'] > $cfg['max_wet']+5) $level = 5;
			$xmlData .= "<level>".$level."</level>\n";
			$error = "湿度高于";
			if($level == 4) $error .= $cfg['max_wet']; else $error .= ($cfg['max_wet']+5);
			$xmlData .= "<msg>".$error."</msg>\n";
			$xmlData .= "<time>".date('Y-m-d H:i:s',time()-2*60)."</time>\n";
			$xmlData .= "<lasttime>".date('Y-m-d H:i:s',time())."</lasttime>\n";
			$xmlData .= "<externalId>TWM_0002</externalId>\n";
			$xmlData .= "</event>\n";
		}
	}

	$xmlData .= "</request>\n";
	if($flags != 0) 
	{        
		//$url = 'http://192.168.1.33/postxmltest/getXml.php';  //接收xml数据的文件
		//$url = 'http://132.77.142.6:6002/unionmon/eventexterna';
		$url = $cfg['event_url'];
		 $header[]="Content-Type: text/xml; charset=utf-8";  
		  
		$header[]="User-Agent: nginx";  
		$header[]="Host: 192.168.1.33";  
		$header[]="Accept: text/html";  
		$header[]="Connection: keep-alive";  
		$header[]="Content-Length: ".strlen($xmlData);  
		  
		//$url = "http://{$_SERVER['HTTP_HOST']}".dirname($_SERVER['PHP_SELF']).‘/response.php’;  
		  
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $url);  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  
		curl_setopt($ch, CURLOPT_POST, 1);   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_setopt($ch, CURLOPT_HEADER, 0);  
		$res = curl_exec($ch);  
		if(curl_errno($ch)){
		    print curl_error($ch);
		}
		curl_close($ch);  
		
		if( $flags == 1) echo "温度异常,发送报警成功!";
		else echo "湿度异常,发送报警成功！";
		//echo ($res); 
		
	}
	else echo "北京联通金盏四层机房";
?>
