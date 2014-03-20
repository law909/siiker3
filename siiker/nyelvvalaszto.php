<?php
/**
 * @package SIIKer3
 * @subpackage Modul 
 */
class siiker_nyelvvalaszto extends siiker_modul
{
	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBNyelvek);
	}
	
	public function getData()
	{
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$rec=$this->getDb()->fetchAll('SELECT nev,chrkod FROM nyelv ORDER BY chrkod');
			$lista=array();
			foreach($rec as $sor)
			{
				$lista[]=array(
					'caption'=>$sor['nev'],
					'chrkod'=>strtolower($sor['chrkod']),
					'uri'=>$_SERVER['PHP_SELF'].'?com='.siiker_command::$ChangeLanguage.'&par='.strtolower($sor['chrkod']));
			}
			$result['nyelvlist']=$lista;
		}
		return $result;
	}
}
?>