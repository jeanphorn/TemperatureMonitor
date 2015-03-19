<?php

require_once ('db.php');
if(isset($_POST['submit'])){
	global $DB;
	if($_POST['submit'] == "删除" ){
		$senserid = $_POST['senserid'];
		
		$sql = "delete from sensers where senser_id =$senserid";
		$DB->query($sql);

		$sql = "delete from cursenstate where senser_id =$senserid";
		$DB->query($sql);
		
		header("Location:../deldev.php");
	}
	if($_POST['submit'] == "编辑" ){

		$senserid = $_POST['senserid'];
		require('edtdev.php');
	}
}

?>
