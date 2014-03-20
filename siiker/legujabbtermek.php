<?php
/**
 * @package SIIKer3
 * @subpackage Modul
 */
class siiker_legujabbtermek extends siiker_toplista {

	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBToplistaUj);
		$this->elemcount=$this->dbparams->getParam(siiker_const::$pWEBToplistaUjLimit,5);
	}

	public function getData()
	{
		if ($this->getShow())
		{
			$termek=new siiker_termekcollection();
			return $this->compileData($termek->getLegujabbTermek($this->elemcount));
		}
	}
}
?>