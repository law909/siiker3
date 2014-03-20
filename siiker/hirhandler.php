<?php
/**
 * @package SIIKer3
 * @subpackage Funkció
 */
class siiker_hirhandler extends siiker_funkcio {
	
	public function __construct($tplfilename) {
		parent::__construct($tplfilename);
	}
	
	public function getProcessedHir($hirkod) {
		$hir=new siiker_hir();
		$hiradat=$hir->getData($hirkod);
		$this->assignData('hir',$hiradat);
		return $this->getTemplateResult();
	}

	public function getProcessedHirLista($page) {
		$hirek=new siiker_hir();
		$hirtomb=$hirek->getShortListData($page);
		$this->assignData('lapozo',$hirtomb['lapozo']);
		$this->assignData('hirlista',$hirtomb['hirlista']);
		return $this->getTemplateResult();
	}
}
?>