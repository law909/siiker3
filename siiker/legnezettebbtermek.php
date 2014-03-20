<?php
/**
 * @package SIIKer3
 * @subpackage Modul
 */
class siiker_legnezettebbtermek extends siiker_toplista {

	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBToplistaNezett);
		$this->elemcount=$this->dbparams->getParam(siiker_const::$pWEBToplistaNezettLimit,5);
	}
	
	public function getData()
	{
		if ($this->getShow())
		{
			$termek=new siiker_termekcollection();
			return $this->compileData($termek->getLegnezettebbTermek($this->elemcount));
		}
	}
}
?>