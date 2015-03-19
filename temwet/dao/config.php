<?php

require_once ('db.php');

if( isset($_POST['Submit']) && $_POST['Submit'] ){
	
	 if($_POST['Submit'] == "修改"){
		$maxtem = $_POST['maxtem'];
		$maxwet = $_POST['maxwet'];
		$url = $_POST['eventurl'];
		$uid= $_POST['uid'];
		
		if(strstr($url,'http://') == "") {
			echo "<script>alert('url 不合发！！')</script>";
			header("Location:../configevent.php");
		}

		global $DB;
		
		$sql = "update event set max_tem=".$maxtem.",max_wet=".$maxwet.",event_url='".$url."' where uid =".$uid;
		$DB->query($sql);
		echo "<script>alert('修改成功！！')</script>";
		header("Location:../configevent.php");
	}
}
?>
