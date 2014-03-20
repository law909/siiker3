<?php
/**
 * @package SIIKer3
 * @subpackage Alap
 */
class siiker_modul extends siiker_dbalapclass
{
	protected $showparam;

	public function __construct($showparam)
	{
		parent::__construct();
		$this->showparam=$showparam;
	}

	public function getShow()
	{
	  return $this->dbparams->getParam($this->showparam,0)==1;
	}
}
?>
