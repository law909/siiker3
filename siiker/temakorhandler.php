<?php
class siiker_temakorhandler extends siiker_funkcio {

	public function getProcessedTemakorBejegyzesLista($temakorkod,$page) {
		$t=new siiker_temakor();
		$eredmeny=$t->getList($temakorkod,$page);
		$this->assignData('temakorbejegyzesek',$eredmeny['lista']);
		$this->assignData('lapozo',$eredmeny['lapozo']);
		$this->assignData('temakor',$eredmeny['temakor']);
		return $this->getTemplateResult();
	}

	public function getProcessedTemakorBejegyzes($temakorbjkod) {
		$t=new siiker_temakor();
		$eredmeny=$t->getData($temakorbjkod);
		$this->assignData('temakorbejegyzes',$eredmeny);
		return $this->getTemplateResult();
	}
}
?>