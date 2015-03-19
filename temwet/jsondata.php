<?php

require_once ('dao/data.php');
$data = new Option();
$carr = $data->getSensers();


$res = $data->getCurState();
$tem = $res[0]['senser_tem'];
$wet = $res[0]['senser_wet'];
$senname =$carr[0]['senser_name'];
$flag = 0;

if(isset($_POST['submit']) && $_POST['submit'] == "确定") {
	$sensername = $_POST['senser'];
	global $senname;
	$res = $data->getStateByName($sensername);
	$tem = $res['senser_tem'];
	$wet = $res['senser_wet'];
	 $senname = $sensername;
	$flag = 1;
}

$temjson = '
{
   "chart": {
      "caption": "联通金盏4层机房",
      "subcaption": "温度",
      "lowerLimit": "20",
      "upperLimit": "36",
      "numberSuffix": "°C",
      "decimals": "1",
      "showhovereffect": "1",
      "thmFillColor": "#008ee4",
      "showGaugeBorder": "1",
      "gaugeBorderColor": "#008ee4",
      "gaugeBorderThickness": "2",
      "gaugeBorderAlpha": "70",
      "thmOriginX": "100",
      "chartBottomMargin": "20",
      "valueFontColor": "#000000",
      "theme": "zune"
   },
   "value": "'.$tem.'",
   "annotations": {
      "showbelow": "0",
      "groups": [
         {
            "id": "indicator",
            "items": [
               {
                  "id": "background",
                  "type": "rectangle",
                  "alpha": "60",
                  "fillColor": "#AABBCC",
                  "x": "$gaugeEndX-40",
                  "tox": "$gaugeEndX",
                  "y": "$gaugeEndY+54",
                  "toy": "$gaugeEndY+72"
               }
            ]
         }
      ]
   }
}
';

$wetjson = '
{
   "chart": {
      "caption": "联通金盏机房4层",
      "subcaption": "湿度",
      "lowerLimit": "5",
      "upperLimit": "30",
      "decimals": "1",
      "showhovereffect": "1",
      "thmFillColor": "#008ee4",
      "showGaugeBorder": "1",
      "gaugeBorderColor": "#008ee4",
      "gaugeBorderThickness": "2",
      "gaugeBorderAlpha": "70",
      "thmOriginX": "100",
      "theme": "zune"
   },
  "value": "'.$wet.'"
}
';
if($flag ==1) {
	require_once( 'cursta_chart.php' );
}
?>
