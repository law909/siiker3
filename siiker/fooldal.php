<?php
/**
 * @package SIIKer3
 * @subpackage Funkció
 */
class siiker_fooldal extends siiker_dbalapclass {

	public function __construct() {
		parent::__construct();
	}

	public function getData() {
		$rec=$this->getDb()->fetchRow('SELECT szoveg FROM web_nyitolap WHERE (nyelv="'.$this->nyelv.'")');
		if ($rec) {
			return $rec['szoveg'];
		}
		else {
			return '';
		}
	}
}
?>