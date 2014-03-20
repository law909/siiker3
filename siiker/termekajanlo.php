<?php
/**
 * @package SIIKer3
 * @subpackage Modul
 */
class siiker_termekajanlo extends siiker_modul
{	
	private $elemcount;
	
	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBTermekAjanloKelle);
		$this->elemcount=$this->dbparams->getParam(siiker_const::$pWEBTermekAjanloLimit,3);
	}
	
	public function getData()
	{
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$termek=new siiker_termekcollection();
			$result['termeklista']=$termek->getAjanlottTermek($this->elemcount);
		}
		return $result;
	}
}
?>