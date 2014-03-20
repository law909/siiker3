<?php
class siiker_lablec extends siiker_dbalapclass {

	public function getData() {
		$rec=$this->getDb()->fetchRow('SELECT szoveg FROM web_lapzaro WHERE (nyelv="'.$this->nyelv.'")');
		return $rec['szoveg'];
	}
}
?>