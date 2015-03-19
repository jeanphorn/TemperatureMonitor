<?php

require_once ('dao/data.php');
$data = new Option();
$carr = $data->getSensers();
$twdata =array();
$montwdata = array();

$senname =$carr[0]['senser_name'];
$flag = 0;

date_default_timezone_set('Etc/GMT-9');
$year = date("Y");
$month = date("m");
$day = date("d");

$date = $year."-".$month."-".$day;	
$twdata = $data->getDayTW($date,$senname);

$sdate = $year."-".$month;
$lmonth = ($month+1) % 12;
if($month+1 > 12) $year++;
$ldate = $year."-".$lmonth; 

$montwdata = $data->getMonthTW($sdate,$ldate,$senname);
$days = date("t",$date); 

if(isset($_POST['submit']) && $_POST['submit'] == "确定") {
	$sensername = $_POST['senser'];
	$yy = $_POST['YYYY'];
	$mm = $_POST['MM'];
	$dd = $_POST['DD'];

	global $senname;
	global $year;
	global $month;
	global $day;
	
	$senname = $sensername;
	$year = $yy;
	$month = $mm;
	$day = $dd;

	$date = $year."-".$month."-".$day;
	$days = date("t",$date);
	
	$twdata = $data->getDayTW($date,$senname);
	
	$sdate = $year."-".$month;
	$lmonth = ($month+1)%12;
	if($month+1 > 12) $year++;
	$ldate = $year."-".$lmonth;

	$montwdata = $data->getMonthTW($sdate,$ldate,$senname);
	
	$flag = 1;
}

$daytrendjson = '
{
   "chart": {
      "caption": "金盏4层机房'.$year.'年'.$month.'月'.$day.'日",
      "subCaption": "温湿度走势",
      "captionFontSize": "14",
      "subcaptionFontSize": "14",
      "subcaptionFontBold": "0",
      "paletteColors": "#0075c2,#1aaf5d",
      "bgcolor": "#ffffff",
      "showBorder": "0",
      "showShadow": "0",
      "showCanvasBorder": "0",
      "usePlotGradientColor": "0",
      "legendBorderAlpha": "0",
      "legendShadow": "0",
      "showAxisLines": "0",
      "showAlternateHGridColor": "0",
      "divlineThickness": "1",
      "divLineDashed": "1",
      "divLineDashLen": "1",
      "divLineGapLen": "1",
      "xAxisName": "时间",
      "showValues": "0"
   },
   "categories": [
      {
         "category": [';

for($i=0; $i<23; $i++) {
	$daytrendjson.='{"label":"'.$i.':00"},';
}

$daytrendjson .='
	    {
               "label": "23:00"
            }
         ]
      }
   ],
   "dataset": [
      {
         "seriesname": "温度",
         "data": [';

$i=0;
if(count($twdata)>1)
foreach($twdata as $tw) { 
	if($i != 0) $daytrendjson .= ",";
	else {
		for($j =0; $j < $tw['hour']; $j++) 
			$daytrendjson .= '{"value":"0"},';
	}

	$daytrendjson .= '{"value":"'.$tw['avg_tem'].'"}';
	
	$i++;
}

$daytrendjson .= '
         ]
      },
      {
         "seriesname": "湿度",
         "data": [';
$i=0;
if(count($twdata)>1)
foreach($twdata as $tw) { 
	if($i != 0) $daytrendjson .= ",";
	else {
		for($j =0; $j < $tw['hour']; $j++) 
			$daytrendjson .= '{"value":"0"},';
	}

	$daytrendjson .= '{"value":"'.$tw['avg_wet'].'"}';
	
	$i++;
}

            
$daytrendjson .= '
         ]
      }
   ]
}
';

$mothtrendjson = '
{
   "chart": {
      "caption": "金盏4层机房'.$year.'年'.$month.'月",
      "subCaption": "温湿度走势",
      "captionFontSize": "14",
      "subcaptionFontSize": "14",
      "subcaptionFontBold": "0",
      "paletteColors": "#0075c2,#1aaf5d",
      "bgcolor": "#ffffff",
      "showBorder": "0",
      "showShadow": "0",
      "showCanvasBorder": "0",
      "usePlotGradientColor": "0",
      "legendBorderAlpha": "0",
      "legendShadow": "0",
      "showAxisLines": "0",
      "showAlternateHGridColor": "0",
      "divlineThickness": "1",
      "divLineDashed": "1",
      "divLineDashLen": "1",
      "divLineGapLen": "1",
      "xAxisName": "日期",
      "showValues": "0"
   },
   "categories": [
      {
         "category": [';

for($i =1; $i <= $days; $i++) {
	if($i != 1 )
		$mothtrendjson .= ",";
	$mothtrendjson .= '{"label":"'.$i.'日"}';
}	
$mothtrendjson .= '
         ]
      }
   ],
   "dataset": [
      {
         "seriesname": "温度",
         "data": [';
$i=0;
if(count($montwdata)>1)
foreach($montwdata as $tw) { 
	if($i != 0) $mothtrendjson .= ",";
	else {
		for($j =1; $j < $tw['day']; $j++) 
			$mothtrendjson .= '{"value":"0"},';
	}

	$mothtrendjson .= '{"value":"'.$tw['avg_tem'].'"}';
	
	$i++;
}
$mothtrendjson .= '
         ]
      },
      {
         "seriesname": "湿度",
         "data": [';

$i=0;
if(count($montwdata)>1)
foreach($montwdata as $tw) { 
	if($i != 0) $mothtrendjson .= ",";
	else {
		for($j =1; $j < $tw['day']; $j++) 
			$mothtrendjson .= '{"value":"0"},';
	}

	$mothtrendjson .= '{"value":"'.$tw['avg_wet'].'"}';
	
	$i++;
}
$mothtrendjson .= '
         ]
      }
   ]
   
}
';

if($flag ==1) {
	require_once( 'trend_chart.php' );
}

?>
