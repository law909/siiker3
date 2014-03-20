<?php
class siiker_partnerdocuments extends siiker_dbalapclass implements siiker_idocuments {

	private $tulaj;

	public function __construct($tulajkod) {
		parent::__construct();
		$this->tulaj=$tulajkod;
	}

	public function getDocumentsCount() {
		if ($this->getLoggedIn()) {
			$rec=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM partnerfiles '.
				'WHERE (partner='.$this->tulaj->getKod().') AND (tipus=3) AND (nyelv="'.$this->nyelv.'")');
			$result=$rec['db'];
			return $result;
		}
		else {
			return 0;
		}
	}

	public function getDocuments() {
		if ($this->tulaj->getLoggedIn()) {
			$result=array();
			$rec=$this->getDb()->FetchAll('SELECT kod,filenev FROM partnerfiles '.
				'WHERE (partner='.$this->tulaj->getKod().') AND (tipus=3) AND (nyelv="'.$this->nyelv.'") ORDER BY filenev');
			foreach($rec as $sor) {
				$result[]=array(
					'uri'=>'?com='.siiker_command::$DownloadFile.'&par=partnerfiles&par2='.$sor['kod'],
					'leiras'=>$sor['filenev']);
			}
			return $result;
		}
		else {
			return array();
		}
	}
}
?>