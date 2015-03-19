<?php
require_once( 'dao/data.php');
$data = new Option();
$carr = $data->getSensers();
$pagesize = 20;

$pages =1;
$res = array();
$pageno = 1;
$sensername ="all";
$time =1;

if(isset($_POST['submit']) && $_POST['submit'] == "查询") {
		
	global $sensername;
	global $time;	
	$sensername = $_POST['senser'];
	$time = $_POST['time'];

	global $opt;
	$records = $opt->getHisDataNu($sensername,$time);
	$pages = intval($records/$pagesize);
	if($records%$pagesize)
		$pages ++;

	$offset = $pagesize*($pageno-1);

	$res = $opt->getHisData($offset,$pagesize);
	require ('hisdata.php');
}
else if(isset($_GET['pageno'])) {
	global $sensername;
	global $time;	

	$pageno = $_GET['pageno'];
	$pages = $_GET['pages'];
	$sensername = $_GET['senname'];
	$time = $_GET['time'];
	
	global $opt;
	$records = $opt->getHisDataNu($sensername,$time);

	$offset = $pagesize*($pageno-1);
	$res = $opt->getHisData($offset,$pagesize);
	require ('hisdata.php');
}
else if(isset($_POST['text'])) {
	global $sensername;
	global $time;	

	$pageno = $_POST['text'];
	$pages = $_POST['pages'];
	$sensername = $_POST['senname'];
	$time = $_POST['time'];

	global $opt;
	$records = $opt->getHisDataNu($sensername,$time);

	$offset = $pagesize*($pageno-1);
	$res = $opt->getHisData($offset,$pagesize);
	require ('hisdata.php');
}


?>
