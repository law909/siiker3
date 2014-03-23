<?php
/**
 * @package SIIKer3
 */
class siiker_menu extends siiker_dbalapclass {
	public function __construct() {
		parent::__construct();
	}

	public function getMenu1() {
		if ($this->dbparams->getParam(siiker_const::$pWEBMenu1Latszik,1)==1) {
			return $this->getMenu(1);
		}
		else {
			return array();
		}
	}

	public function getMenu2() {
		if ($this->dbparams->getParam(siiker_const::$pWEBMenu2Latszik,0)==1) {
			return $this->getMenu(2);
		}
		else {
			return array();
		}
	}

	public function getMenu3() {
		if ($this->dbparams->getParam(siiker_const::$pWEBMenu3Latszik,0)==1) {
			return $this->getMenu(3);
		}
		else {
			return array();
		}
	}

	public function getMenu4() {
		if ($this->dbparams->getParam(siiker_const::$pWEBMenu4Latszik,0)==1) {
			return $this->getMenu(4);
		}
		else {
			return array();
		}
	}

	public function getData($menukod)
	{
		if ($this->dbparams->getParam(siiker_const::$pWEBApacheRewriter,0))
		{
			$rec=$this->getDb()->fetchRow('SELECT kod FROM web_menu WHERE permalink="'.$menukod.'"');
			$mkod=$rec['kod'];
		}
		else
		{
			$mkod=$menukod;
		}
		$menuext=$this->getDb()->fetchRow('SELECT elo_logoext,uto_logoext FROM web_menu WHERE kod='.$mkod);
		$sor=$this->getDb()->fetchRow('SELECT nev,leiras FROM web_menu_nev WHERE (menu_kod='.$mkod.') AND (nyelv="'.$this->nyelv.'")');
		$result=array('cim'=>$sor['nev'],
			'elokepuri'=>siiker_store::getConfig()->path->files.'menu_elo'.str_pad($mkod,10,'0',STR_PAD_LEFT).'_m'.$menuext['elo_logoext'],
			'utokepuri'=>siiker_store::getConfig()->path->files.'menu_uto'.str_pad($mkod,10,'0',STR_PAD_LEFT).'_m'.$menuext['uto_logoext'],
			'szoveg'=>$sor['leiras']);
		return $result;
	}

	protected function getMenu($mezo) {
		$result=array();
		if (siiker_store::getUser()->getLoggedIn()) {
			$loggedinsql='';
		}
		else {
			$loggedinsql=' AND (wm.loginutanlathato=0)';
		}
		if (siiker_store::getDbParams()->getParam(siiker_const::$pWEBTermekDarabszamLatszik,0)==0) {
			$menuk=$this->getDb()->fetchAll(
				'(SELECT 1 AS menutipus,wm.kod AS kod,wmn.nev AS nev,wm.weblink AS weblink,wm.permalink AS permalink,"" AS htmlleiras,-1 AS elemcount, '.
				'wm.menu'.$mezo.'sorrend AS sorrend '.
				'FROM web_menu wm, web_menu_nev wmn '.
				'WHERE (wm.kod=wmn.menu_kod) AND (wmn.nyelv="'.$this->nyelv.'") AND (wm.menu'.$mezo.'=1) '.$loggedinsql.' )'.
				'UNION '.
				'(SELECT 2 AS menutipus,tcs.kod AS kod,tcsn.nev AS nev,"" AS weblink,tcs.permalink AS permalink,tcsn.htmlleiras AS htmlleiras,-1 AS elemcount, '.
				'tcs.menu'.$mezo.'sorrend AS sorrend '.
				'FROM termekcsoportnev tcsn,termekcsoport tcs '.
				'WHERE (tcs.kod=tcsn.termekcsoport) AND (tcsn.nyelv="'.$this->nyelv.'") AND (tcs.torolt=0) AND (tcs.menu'.$mezo.'=1)) '.
				'UNION '.
				'(SELECT 3 AS menutipus,t.kod AS kod,tn.cim AS nev,"" AS weblink,t.permalink AS permalink,tn.htmlleiras AS htmlleiras,-1 AS elemcount, '.
				't.menu'.$mezo.'sorrend AS sorrend '.
				'FROM temakornev tn,temakor t '.
				'WHERE (t.kod=tn.temakor) AND (tn.nyelv="'.$this->nyelv.'") AND (t.menu'.$mezo.'=1)) '.
				'ORDER BY sorrend,nev');
		}
		else {
			$menuk=$this->getDb()->fetchAll(
				'(SELECT 1 AS menutipus,wm.kod AS kod,wmn.nev AS nev,wm.weblink AS weblink,wm.permalink AS permalink,"" AS htmlleiras,-1 AS elemcount, '.
				'wm.menu'.$mezo.'sorrend AS sorrend '.
				'FROM web_menu wm, web_menu_nev wmn '.
				'WHERE (wm.kod=wmn.menu_kod) AND (wmn.nyelv="'.$this->nyelv.'") AND (wm.menu'.$mezo.'=1) '.$loggedinsql.' )'.
				'UNION '.
				'(SELECT 2 AS menutipus,tcs.kod AS kod,tcsn.nev AS nev,"" AS weblink,tcs.permalink AS permalink,tcsn.htmlleiras AS htmlleiras,COUNT(t.kod) AS elemcount, '.
				'tcs.menu'.$mezo.'sorrend AS sorrend '.
				'FROM termekcsoportnev tcsn,termekcsoport tcs '.
				'LEFT OUTER JOIN termek t ON (t.karkod LIKE CONCAT(tcs.karkod,"%")) AND (t.lathato=1) '.
				'WHERE (tcs.kod=tcsn.termekcsoport) AND (tcsn.nyelv="'.$this->nyelv.'") AND (tcs.torolt=0) AND (tcs.menu'.$mezo.'=1) '.
				'GROUP BY tcs.kod) '.
				'UNION '.
				'(SELECT 3 AS menutipus,t.kod AS kod,tn.cim AS nev,"" AS weblink,t.permalink AS permalink,tn.htmlleiras AS htmlleiras,COUNT(tb.kod) AS elemcount, '.
				't.menu'.$mezo.'sorrend AS sorrend '.
				'FROM temakornev tn,temakor t '.
				'LEFT OUTER JOIN temakorbejegyzes tb ON (t.kod=tb.temakor) AND (tb.lathato=1) '.
				'WHERE (t.kod=tn.temakor) AND (tn.nyelv="'.$this->nyelv.'") AND (t.menu'.$mezo.'=1) '.
				'GROUP BY t.kod) '.
				'ORDER BY sorrend,nev');
		}
		foreach ($menuk as $rec) {
			switch ($rec['menutipus']) {
				case 1:
					if ($rec['weblink']!='') {
						$link='/'.ltrim($rec['weblink'].'&mx='.$rec['kod'],'/');
					}
					else {
						$link=siiker_tools::getPermalink(siiker_command::$ShowMenupont,array('on'=>array('par'=>$rec['permalink']),'off'=>array('par'=>$rec['kod'])),$this->rewriteon);
					}
					break;
				case 2:
					$link=siiker_tools::getPermalink(siiker_command::$ShowTermekLista,
						array('on'=>array('par'=>$rec['permalink'],'par2'=>1),'off'=>array('par'=>$rec['kod'],'par2'=>1)),
						$this->rewriteon);
					break;
				case 3:
					$link=siiker_tools::getPermalink(siiker_command::$ShowTemaLista,
						array('on'=>array('par'=>$rec['permalink'],'par2'=>1),'off'=>array('par'=>$rec['kod'],'par2'=>1)),
						$this->rewriteon);
					break;
			}
            if (strpos($link, '=kosar') === false) {
                $iskosar = false;
            }
            else {
                $iskosar = true;
            }
            if (strpos($link, '=kedvenc') === false) {
                $iskedvenc = false;
            }
            else {
                $iskedvenc = true;
            }
			$result[]=array(
				'uri'=>$link,
				'caption'=>$rec['nev'],
				'leiras'=>$rec['htmlleiras'],
				'selected'=>0,
                'kosar'=>$iskosar || $iskedvenc,
				'elemcount'=>$rec['elemcount']);
		}
		return $result;
	}
}
?>