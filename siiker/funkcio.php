<?php
class siiker_funkcio extends siiker_dbalapclass {

	private $tplhandler;

	public function __construct($tplfilename='') {
		parent::__construct();
		$this->tplhandler=siiker_store::makeTemplateHandler(siiker_store::getConfig()->path->template.$tplfilename);
		$this->tplhandler->assignSystemData();
	}

	public function getTemplateResult() {
		return $this->tplhandler->getTemplateResult();
	}

	public function assignData($variable,$data) {
		$this->tplhandler->assignData($variable,$data);
	}
}
?>