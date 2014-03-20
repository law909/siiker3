<?php
/**
 * @package SIIKer3
 * @subpackage Funkci�
 */
class siiker_termekcsoport extends siiker_dbalapclass
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAlCsoportok($szulokod,$dimfilter)
	{
		$tcskod=$this->getTermekCsoportKod($szulokod);
		$s=array();
		foreach($dimfilter as $k=>$v) {
			if ($v>0) {
				$s[]='(t.'.$k.'='.$v.')';
			}
		}
		if ($tcskod>0) {
			return $this->getTermekCsoportData('AND (tcs.szulokod='.$tcskod.')','ORDER BY tcs.sorrend,tcsn.nev','',implode(' AND ',$s));
		}
		else {
			return $this->getTermekCsoportData('AND (1=0)','','',implode(' AND ',$s));
		}
	}

	public function getTermekCsoport($csoportkod)
	{
		$tcskod=$this->getTermekCsoportKod($csoportkod);
		return $this->getTermekCsoportData('AND (tcs.kod='.$tcskod.')','ORDER BY tcs.sorrend,tcsn.nev','');
	}

	public function getNavigator($csoportkod)
	{
		$navigator=array();
		$szulokod=$this->getTermekCsoportKod($csoportkod);
		while ($szulokod>0)
		{
			$rec=$this->getDb()->fetchRow('SELECT tcs.kod,tcs.szulokod,tcsn.nev,tcs.permalink '.
				'FROM termekcsoport tcs,termekcsoportnev tcsn '.
				'WHERE (tcs.kod=tcsn.termekcsoport) AND (tcsn.nyelv="'.$this->nyelv.'") AND (lathato=1) AND (torolt=0) AND '.
				'(tcs.kod='.$szulokod.')');
			$navigator[]=array(
				'caption'=>$rec['nev'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTermekLista,array('on'=>array('par'=>$rec['permalink'],'par2'=>1),'off'=>array('par'=>$rec['kod'],'par2'=>1)),$this->rewriteon)
			);
			$szulokod=$rec['szulokod'];
		}
		return array_reverse($navigator);
	}

	public function getPermalink($csoportkod)
	{
		$rec=$this->getDb()->fetchRow('SELECT permalink FROM termekcsoport WHERE kod='.$csoportkod);
		return $rec['permalink'];
	}

	public function getTermekCsoportKod($par)
	{
		if ($this->rewriteon)
		{
			$rec=$this->getDb()->fetchRow('SELECT kod FROM termekcsoport WHERE permalink="'.$par.'"');
			return $rec['kod'];
		}
		else
		{
			return $par;
		}
	}

	protected function getTermekCsoportData($wheresql,$ordersql,$limitsql,$dimfiltersql='')
	{
		$result=array();
		if (siiker_store::getDbParams()->getParam(siiker_const::$pWEBTermekDarabszamLatszik,0)==0) {
			$rec=$this->getDb()->fetchAll('SELECT tcs.kod,tcsn.nev,tcs.szulokod,tcsn.htmlleiras,tcsn.rovidleiras,tcs.kulcsszavak,'.
				'-1 AS elemcount,tcs.permalink,tf.kod AS tfkod,tf.filenev AS tffilenev,tf.logoext '.
				'FROM termekcsoport tcs '.
				'INNER JOIN termekcsoportnev tcsn ON (tcs.kod=tcsn.termekcsoport) AND (tcsn.nyelv="'.$this->nyelv.'")'.
				'LEFT OUTER JOIN termekcsoport_files tf ON (tcs.kod=tf.termekcsoport) AND (tf.tipus=1) AND (tf.publikus=1) '.
				'WHERE (tcs.lathato=1) AND (tcs.torolt=0) '.$wheresql.' '.$ordersql.' '.$limitsql);
		}
		else {
			$rec=$this->getDb()->fetchAll('SELECT tcs.kod,tcsn.nev,tcs.szulokod,tcsn.htmlleiras,tcsn.rovidleiras,tcs.kulcsszavak,'.
				'COUNT(t.kod) AS elemcount,tcs.permalink,tf.kod AS tfkod,tf.filenev AS tffilenev,tf.logoext '.
				'FROM termekcsoport tcs '.
				'INNER JOIN termekcsoportnev tcsn ON (tcs.kod=tcsn.termekcsoport) AND (tcsn.nyelv="'.$this->nyelv.'")'.
				'LEFT OUTER JOIN termekcsoport_files tf ON (tcs.kod=tf.termekcsoport) AND (tf.tipus=1) AND (tf.publikus=1) '.
				'LEFT OUTER JOIN termek t ON (t.karkod LIKE CONCAT(tcs.karkod,"%")) AND (t.lathato=1) '.$dimfiltersql.
				'WHERE (tcs.lathato=1) AND (tcs.torolt=0) '.$wheresql.' '.
				'GROUP BY tcs.kod '.$ordersql.' '.$limitsql);
		}
		foreach ($rec as $sor)
		{
			$fejadat=array(
				'cim'=>'',
				'kulcsszavak'=>$sor['kulcsszavak'],
				'seodescription'=>'',
				'seoclassification'=>''
			);
			$tlist=array(
				'nev'=>$sor['nev'],
				'rovidleiras'=>$sor['rovidleiras'],
				'leiras'=>$sor['htmlleiras'],
				'bigimageuri'=>siiker_store::getConfig()->path->files.'termekcsoport_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m'.$sor['logoext'],
				'smallimageuri'=>siiker_store::getConfig()->path->files.'termekcsoport_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m_s'.$sor['logoext'],
				'imagealt'=>$sor['tffilenev'],
				'elemcount'=>$sor['elemcount'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTermekLista,array('on'=>array('par'=>$sor['permalink'],'par2'=>1),'off'=>array('par'=>$sor['kod'],'par2'=>1)),$this->rewriteon)
			);
			$result[]=array(
				'data'=>$tlist
			);
		}
		return $result;
	}
}
?>