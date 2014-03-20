<?php
/**
 * @package SIIKer3
 * @subpackage Modul
 */
class siiker_legtobbszorrendelttermek extends siiker_toplista {	

	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBToplistaRendelt);
		$this->elemcount=$this->dbparams->getParam(siiker_const::$pWEBToplistaRendeltLimit,5);
	}
	
	public function getData()
	{
		if ($this->getShow())
		{
			$termek=new siiker_termekcollection();
			return $this->compileData($termek->getLegtobbszorRendeltTermek($this->elemcount));
		}
	}
}
?>