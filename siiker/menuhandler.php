<?php
/**
 * @package SIIKer3
 * @subpackage Funkció
 */
class siiker_menuhandler extends siiker_funkcio {
	
	public function __construct($tplfilename) {
		parent::__construct($tplfilename);
	}
	
	public function getProcessedMenu($menukod) {
		$menupont=new siiker_menu();
		$this->assignData('menu',$menupont->getData($menukod));
		return $this->getTemplateResult();
	}
}
?>