<?php
require_once ('db.php');

class Senser {

	var $senser_id;
	var $senser_name;
	var $senser_addr;
	var $senser_tem;
	var $senser_wet;
	var $senser_time;

}

class Option {
	
	var $cursenser;
	var $hissenser;
	var $senname ;
	var $histime ;
	var $pages;
	const tembound = 30;
	const wetbound = 30;

	function Option() {
		$this->cursenser = new Senser();
		$this->hissenser = new Senser();
		
	}
	function getStateByName($senname) {
		$sql = "select b.senser_tem,b.senser_wet from sensers as a,cursenstate as b where a.senser_id=b.senser_id and a.senser_name ='".$senname."'";
		global $DB;

		return $DB->fetch_one_array($sql);
	}
	function getCurState() {
		$sql = "select a.senser_name,a.senser_addr,b.senser_tem,b.senser_wet from sensers as a,cursenstate as b where a.senser_id=b.senser_id";

		global $DB;
		$DB->query($sql);
		$tmp = $DB->get_rows_array();

		
		return $tmp;
	}

	function getSensers() {
		$sql = "select * from sensers";
		global $DB;
		$DB->query($sql);

		$tmp = $DB->get_rows_array();
		return $tmp;
	}
	function getSenInfo($senId) {
		$sql = "select * from sensers where senser_id = $senId";
		global $DB;

		return $DB->fetch_one_array($sql);
	}

	function getCfgInfo() {
		$sql = "select * from event where uid = 1";
		global $DB;

		return $DB->fetch_one_array($sql);
	}

	function getHisDataNu($sen, $time) {
		
		$this->senname = $sen;
		$this->histime = $time;
		
		if($sen == "all") {
			$sql = "select senser_name,senser_addr,senser_temp,senser_wet,senser_time from sensers as a,history as b where a.senser_id=b.senser_id and TO_DAYS(NOW())-TO_DAYS(senser_time)<=30*$time";
		}
		else {
			$sql = "select senser_name,senser_addr,senser_temp,senser_wet,senser_time from sensers as a,history as b where a.senser_id=b.senser_id and senser_name='".$sen."' and TO_DAYS(NOW())-TO_DAYS(senser_time)<=30*$time";
		}
		
		global $DB;
		$DB->query($sql);
		return $DB->get_rows();
	}

	function getHisData($offset,$pagesize) {
		
		if($this->senname == "all") {
			$sql = "select senser_name,senser_addr,senser_temp,senser_wet,senser_time from sensers as a,history as b where a.senser_id=b.senser_id and TO_DAYS(NOW())-TO_DAYS(senser_time)<=30*".$this->histime." limit $offset, $pagesize";
		}
		else {
			$sql = "select senser_name,senser_addr,senser_temp,senser_wet,senser_time from sensers as a,history as b where a.senser_id=b.senser_id and senser_name='".$this->senname."' and TO_DAYS(NOW())-TO_DAYS(senser_time)<=30*".$this->histime." limit $offset, $pagesize";
		}

		global $DB;
		$DB->query($sql);

		$tmp = $DB->get_rows_array();
		return $tmp;
	}

	function getDayTW($date,$sen) {
		$sql = "select senser_id from sensers where senser_name='".$sen."'";

		global $DB;
		$tmp = $DB->fetch_one_array($sql);
		$senser_id = $tmp['senser_id'];

		$sql = "select avg(senser_temp) as avg_tem,avg(senser_wet) as avg_wet,date_format(senser_time,'%H') as hour from history where senser_time between '".$date." 00:00:00' and '".$date." 23:59:59' and senser_id= ".$senser_id." group by date_format(senser_time,'%y-%m-%d %H')";

		$DB->query($sql);

		$tmp = $DB->get_rows_array();
		return $tmp;
	}

	function getMonthTW($sdate,$ldate,$sen) {
		$sql = "select senser_id from sensers where senser_name='".$sen."'";

		global $DB;
		$tmp = $DB->fetch_one_array($sql);
		$senser_id = $tmp['senser_id'];
		
		$sql = "select avg(senser_temp) as avg_tem,avg(senser_wet) as avg_wet,date_format(senser_time,'%d') as day from history where senser_time between '".$sdate."-01' and '".$ldate."-01' and senser_id= ".$senser_id." group by date_format(senser_time,'%y-%m-%d')";
		
		$DB->query($sql);

		$tmp = $DB->get_rows_array();
		return $tmp;
	}

}
$opt = new Option;

?>


