<?php
/**
 * @package SIIKer3
 * @subpackage
 */
class siiker_hir extends siiker_dbalapclass {

	protected $hirdb;

	public function __construct() {
		parent::__construct();
	}

	public function getHirKod($par) {
		if ($this->rewriteon) {
			$rec=$this->getDb()->fetchRow('SELECT kod FROM web_hirek WHERE permalink="'.$par.'"');
			return $rec['kod'];
		}
		else {
			return $par;
		}
	}

	public function getData($hirkod) {
		$hkod=$this->getHirKod($hirkod);
		$sor=$this->getDb()->fetchRow(sprintf('SELECT wh.kod,wh.datum,whsz.cim,whsz.lead,whsz.htmlszoveg,wh.forras,wh.logoext,wh.permalink '.
			'FROM web_hirek wh,web_hirek_szoveg whsz '.
			'WHERE (wh.elsodatum<=CURDATE()) AND (wh.utolsodatum>=CURDATE()) AND (wh.lathato=1) AND (whsz.nyelv="'.$this->nyelv.'") AND '.
			'(wh.kod=whsz.hirkod) AND (wh.kod=%d)'.
			'ORDER BY wh.datum DESC,whsz.cim',$hkod));
		$result=array(
			'caption'=>$sor['cim'],
			'lead'=>$sor['lead'],
			'datum'=>$sor['datum'],
			'szoveg'=>$sor['htmlszoveg'],
			'forras'=>$sor['forras'],
			'uri'=>'/index.php?com='.siiker_command::$ShowHirLista,
			'imageuri'=>siiker_store::getConfig()->path->files.'web_hirek'.str_pad($hirkod,10,'0',STR_PAD_LEFT).'_m_f'.$sor['logoext']);
		return $result;
	}

	public function getShortListData($page) {
		$result=array();
		$pager=new law_pager($page,$this->dbparams->getParam(siiker_const::$pWEBHirekSzama,10),$_SERVER['PHP_SELF'].'?com='.siiker_command::$ShowHirLista.'&par=');
		$result['hirlista']=$this->getList($pager->getLimitSQL());
		$result['lapozo']=$pager->getPager($this->hirdb);
		return $result;
	}

	public function getMiniListData() {
		$result=array();
		$result['show']=$this->dbparams->getParam(siiker_const::$pWEBHirekFooldalra,0)==1;
		if ($result['show']) {
			$result['hirlista']=$this->getList('');
		}
		return $result;
	}

	public function getBoxListData() {
		$result=array();
		$result['show']=$this->dbparams->getParam(siiker_const::$pWEBHirekLatszik,0)==1;
		if ($result['show']) {
			$result['hirlista']=$this->getList('LIMIT 0,'.$this->dbparams->getParam(siiker_const::$pWEBHirDobozHirekSzama,2));
		}
		return $result;
	}

	protected function getList($limitsql) {
		$rec=$this->getDb()->fetchAll('SELECT SQL_CALC_FOUND_ROWS wh.kod,wh.datum,whsz.cim,whsz.lead,whsz.htmlszoveg,whsz.szoveg,wh.forras,wh.logoext,wh.permalink '.
			'FROM web_hirek wh,web_hirek_szoveg whsz '.
			'WHERE (wh.elsodatum<=CURDATE()) AND (wh.utolsodatum>=CURDATE()) AND (wh.lathato=1) AND (whsz.nyelv="'.$this->nyelv.'") AND '.
			'(wh.kod=whsz.hirkod) '.
			'ORDER BY wh.datum DESC,whsz.cim '.$limitsql);
		$this->hirdb=$this->getDb()->fetchOne('SELECT FOUND_ROWS()');
		$tlist=array();
		foreach ($rec as $sor) {
			$tlist[]=array(
				'caption'=>$sor['cim'],
				'lead'=>($sor['lead']==''?substr($sor['szoveg'],0,$this->dbparams->getParam(siiker_const::$pWEBHirLeadHossz,100)).'...':$sor['lead']),
				'datum'=>$sor['datum'],
				'imageuri'=>siiker_store::getConfig()->path->files.'web_hirek'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).'_m_f'.$sor['logoext'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowHir,array('on'=>array('par'=>$sor['permalink']),'off'=>array('par'=>$sor['kod'])),$this->rewriteon)
			);
		}
		return $tlist;
	}
}
?>