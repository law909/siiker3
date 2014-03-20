<?php
class siiker_statdoboz extends siiker_modul {

	public function __construct() {
		parent::__construct(siiker_const::$pWEBLatogatoSzamLatszik);
	}

	public function getData() {
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$rec=$this->getDb()->fetchRow('SELECT COUNT(kod) AS db '.
				'FROM web_stat_sessids');
			$result['stat']=array(
				'latogatoszam'=>$rec['db']);
		}
		return $result;
	}
}
?>