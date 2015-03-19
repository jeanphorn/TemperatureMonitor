<?php

include ('db.php');

if( isset($_POST['Submit']) && $_POST['Submit'] ){
	
	if($_POST['Submit'] == "确定" ){
		$senname = $_POST['devname'];
		$senaddr = $_POST['devaddr'];
		if(strlen($senname)>30) {
			echo "<script>alert('名字过长！重新输入！')</script>";
			header("Location:../adddev.php");
		}
	
		global $DB;
		$sql = "insert into sensers (senser_name, senser_addr) values ('".$senname."',".$senaddr.")";
		$DB->query($sql);

		$sql = "select senser_id from sensers where senser_addr = $senaddr";
		$re = $DB->fetch_one_array($sql);
		$senserid = $re[0];

		$sql = "insert into cursenstate (senser_id,senser_tem,senser_wet) values ($senserid,26,10)";

		$DB->query($sql);

		header("Location:../deldev.php");
	}
	else if($_POST['Submit'] == "修改"){
		$senname = $_POST['devname'];
		$senaddr = $_POST['devaddr'];
		$senserid= $_POST['sid'];
	
		if(strlen($senname)>30) {
			echo "<script>alert('名字过长！重新输入！')</script>";
			header("Location:../adddev.php");
		}

		global $DB;
		
		$sql = "update sensers set senser_name='".$senname."',senser_addr=".$senaddr." where senser_id =".$senserid;
		$DB->query($sql);

		header("Location:../deldev.php");
	}
}

?>
