<?php
/**
 * @package SIIKer3
 * @subpackage Modul
 */
class siiker_referencia extends siiker_modul
{
	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBReferencia);
	}
	
	public function getData()
	{
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$rec=$this->getDb()->fetchAll('SELECT p.nev,pr.htmlszoveg,pr.logoext AS kit,pr.kod AS prkod '.
				'FROM partner p,partnerreferencia pr '.
				'WHERE (p.kod=pr.partner) AND (pr.nyelv="'.$this->nyelv.'") AND (lathato=1) '.
				'ORDER BY RAND() LIMIT '.siiker_store::getDbParams()->getParam(siiker_const::$pWEBReferenciaDarab,0));
			$lista=array();
			foreach($rec as $sor)
			{
				$filenev=siiker_store::getConfig()->path->files.'partnerreferencia'.str_pad($sor['prkod'],10,'0',STR_PAD_LEFT).'_m_s'.$sor['kit'];
				$lista[]=array(
					'caption'=>$sor['nev'],
					'imageuri'=>$filenev,
					'text'=>str_replace('<a ','<a target="_blank " ',$sor['htmlszoveg']));
			}
			$result['referencialist']=$lista;
		}
		return $result;
	}
}
?>