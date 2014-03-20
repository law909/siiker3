<?php
/**
 * @package SIIKer3
 * @subpackage 
 */
class siiker_linktar extends siiker_dbalapclass
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getData()
	{
		$linkek=$this->getDb()->fetchAll('SELECT l.link,ln.nev AS linknev,l.kod AS linkkod,logomimetype,logoext,lcsn.nev AS linkcsoportnev,lcs.kod AS linkcsoportkod '.
			'FROM link l,linknev ln,linkcsoport lcs,linkcsoportnev lcsn '.
			'WHERE (l.kod=ln.link) AND (ln.nyelv="'.$this->nyelv.'") '.
			'AND (l.linkcsoport=lcs.kod) AND (lcs.kod=lcsn.linkcsoport) AND (lcsn.nyelv="'.$this->nyelv.'") '.
			'ORDER BY linkcsoportnev,linkcsoportkod,linknev,linkkod');
		$linkcsoportlista=array();
		foreach($linkek as $sor)
		{
			$linkcsoportlista[$sor['linkcsoportkod']]['csoportnev']=$sor['linkcsoportnev'];
			$linkcsoportlista[$sor['linkcsoportkod']]['linklista'][]=array(
				'imageuri'=>siiker_store::getConfig()->path->files.'link'.str_pad($sor['linkkod'],10,'0',STR_PAD_LEFT).'_m_s'.$sor['logoext'],
				'uri'=>'http://'.str_replace('http://','',$sor['link']),
				'caption'=>$sor['linknev']);
		}
		return $linkcsoportlista;
	}
}
?>