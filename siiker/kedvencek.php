<?php
class siiker_kedvencek extends siiker_dbalapclass {

	public function addTo($termekkod) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		$rec=$this->getDb()->fetchRow('SELECT COUNT(*) AS db FROM termek WHERE kod='.$termekkod);
		if ($rec['db']<=0) {
			return null;
		}
		$rec=$this->getDb()->fetchRow('SELECT COUNT(*) AS db FROM web_ws_kedvenctermek WHERE '.
			siiker_store::getUser()->getWhereSQL('user_kod','sessid').' AND (termek_kod='.$termekkod.')');
		if ($rec['db']==0) {
			$this->getDb()->query('INSERT INTO web_ws_kedvenctermek (sessid,user_kod,termek_kod) VALUES '.
				'("'.Zend_Session::getId().'",'.siiker_store::getUser()->getKod().','.$termekkod.')');
		}
	}
	
	public function removeFrom($termekkod) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		$this->getDb()->query('DELETE FROM web_ws_kedvenctermek WHERE '.$where.' AND (termek_kod='.$termekkod.')');
	}
}
?>