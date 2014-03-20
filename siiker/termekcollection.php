<?php
class siiker_termekcollection extends siiker_dbalapclass {
	private $arakloginnelkul;
	private $vasarlasloginnelkul;

	private $nettolatszik;
	private $bruttolatszik;
	private $valutasarlatszik;
	private $cikkszamlatszik;
	private $nev1latszik;
	private $nev2latszik;
	private $nev3latszik;
	private $nev4latszik;
	private $nev5latszik;
	private $melatszik;
	private $gyujtolatszik;
	private $rovidleiraslatszik;
	private $kedvenctermeklatszik;
	private $tulajdonsaglatszik;
	private $galerialatszik;
	private $dokumentumlatszik;
	private $ajanlotttermeklatszik;
	private $keszletlatszik;

	private $alapvalutanemkod;
	private $alapvalutanemnev;
	private $termekdb;
	public $termekkod;

	public function __construct() {
		parent::__construct();
	}

	public function getAjanlottTermek($limit) {
		return $this->getTermekData(2,'','ORDER BY ajanlott DESC','LIMIT '.$limit,true);
	}

	public function getLegujabbTermek($limit) {
		return $this->getTermekDataForToplista('ORDER BY t.kod DESC LIMIT '.$limit);
	}

	public function getLegnezettebbTermek($limit) {
		return $this->getTermekDataForToplista('ORDER BY t.megtekintve DESC,t.kod LIMIT '.$limit);
	}

	public function getLegtobbszorRendeltTermek($limit) {
		return $this->getTermekDataForToplista('ORDER BY t.kosarbateve DESC,t.kod LIMIT '.$limit);
	}

	public function getTermek($termekkod) {
		$tkod=$this->getTermekKod($termekkod);
		return $this->getTermekData(3,'AND (t.kod='.$termekkod.')','','',true);
	}

	public function getKedvencTermek($page) {
		$pager=new law_pager($page,$this->dbparams->getParam(siiker_const::$pWEBTermekekSzama,10),
			siiker_tools::getPermalink(siiker_command::$Kedvencek,array('on'=>array('par'=>''),'off'=>array('par'=>'')),$this->rewriteon));
		$limitsql=$pager->getLimitSQL();
		$tomb=array();
		if (siiker_store::getUser()->getLoggedIn()) {
			$rec=$this->getDb()->fetchAll('SELECT termek_kod FROM web_ws_kedvenctermek WHERE user_kod='.siiker_store::getUser()->getKod());
		}
		else {
			$rec=$this->getDb()->fetchAll('SELECT termek_kod FROM web_ws_kedvenctermek WHERE sessid="'.Zend_Session::getId().'"');
		}
		$x=array();
		foreach($rec as $sor) {
			$x[]=$sor['termek_kod'];
		}
		if (count($x)==0) {
			$where='AND (1=0)';
		}
		else {
			$where='AND (t.kod IN ('.implode(',',$x).'))';
		}
		$tomb['lista']=$this->getTermekData(2,$where,'ORDER BY t.sorrend,t.nev', $limitsql,true);
		$tomb['lapozo']=$pager->getPager($this->termekdb);
		return $tomb;
	}

	public function getKeresettTermek($keresendo,$page) {
		$pager=new law_pager($page,$this->dbparams->getParam(siiker_const::$pWEBTermekekSzama,10),
			siiker_tools::getPermalink(siiker_command::$QuickSearch,
				array('on'=>array('par'=>$keresendo,'par2'=>''),'off'=>array('par'=>$keresendo,'par2'=>'')),$this->rewriteon));
		$limitsql=$pager->getLimitSQL();
		$tomb=array();
		$where='AND ((tn.nev LIKE "%'.$keresendo.'%") OR (tn.nev2 LIKE "%'.$keresendo.'%") OR '.
			'(tn.nev3 LIKE "%'.$keresendo.'%") OR (tn.nev4 LIKE "%'.$keresendo.'%") OR (tn.nev5 LIKE "%'.$keresendo.'%") OR '.
			'(tn.rovidleiras LIKE "%'.$keresendo.'%") OR (t.cikkszam LIKE "%'.$keresendo.'%") OR (tn.leiras LIKE "%'.$keresendo.'%"))';
		$tomb['lista']=$this->getTermekData(2,$where,'ORDER BY t.sorrend,t.nev',$limitsql,true);
		$tomb['lapozo']=$pager->getPager($this->termekdb);
		return $tomb;
	}

	public function getKosarTermek() {
		$tomb=array();
		if (siiker_store::getUser()->getLoggedIn()) {
			$rec=$this->getDb()->fetchAll('SELECT termek_kod FROM web_ws_kosar WHERE user_kod='.siiker_store::getUser()->getKod());
		}
		else {
			$rec=$this->getDb()->fetchAll('SELECT termek_kod FROM web_ws_kosar WHERE sessid="'.Zend_Session::getId().'"');
		}
		$x=array();
		foreach($rec as $sor) {
			$x[]=$sor['termek_kod'];
		}
		if (count($x)==0) {
			$where='AND (1=0)';
		}
		else {
			$where='AND (t.kod IN ('.implode(',',$x).'))';
		}
		$tomb['lista']=$this->getTermekData(2,$where,'ORDER BY t.sorrend,t.nev','',true);
		return $tomb;
	}

	public function getTermekcsoportTermek($csoportkod,$page,$dimfilter) {
		$tcs=new siiker_termekcsoport();
		$tcskod=$tcs->getTermekCsoportKod($csoportkod);
		$pager=new law_pager($page,$this->dbparams->getParam(siiker_const::$pWEBTermekekSzama,10),
			siiker_tools::getPermalink(siiker_command::$ShowTermekLista,
				array('on'=>array('par'=>$tcs->getPermalink($tcskod),'par2'=>''),'off'=>array('par'=>$tcskod,'par2'=>'')),$this->rewriteon),
			$dimfilter);
		$limitsql=$pager->getLimitSQL();
		$d=array();
		foreach ($dimfilter as $k=>$v) {
			if ($v>0) {
				$d[]='(t.'.$k.'='.$v.')';
			}
		}
		if ($tcskod>0) {
			$d[]='(t.csoportkod='.$tcskod.')';
		}
		$s='';
		if (count($d)>0) {
			$s='AND '.implode(' AND ',$d);
		}
		$tomb=array();
		$tomb['lista']=$this->getTermekData(2,$s,'ORDER BY t.sorrend,t.nev',$limitsql,true);
		$tomb['lapozo']=$pager->getPager($this->termekdb);
		return $tomb;
	}

	public function getTermekcsoportTermekKodok($csoportkod,$dimfilter) {
		$tcs=new siiker_termekcsoport();
		$tcskod=$tcs->getTermekCsoportKod($csoportkod);
		$d=array();
		foreach ($dimfilter as $k=>$v) {
			if ($v>0) {
				$d[]='(t.'.$k.'='.$v.')';
			}
		}
		if ($tcskod>0) {
			$d[]='(t.csoportkod='.$tcskod.')';
		}
		$s='';
		if (count($d)>0) {
			$s='AND '.implode(' AND ',$d);
		}
		$tomb=array();
		$tomb['lista']=$this->getTermekData(2,$s,'ORDER BY t.sorrend,t.nev','',true);
		return $tomb;
	}

	public function getTermekKod($par) {
		if ($this->rewriteon) {
			$rec=$this->getDb()->fetchRow('SELECT kod FROM termek WHERE permalink="'.$par.'"');
			$this->termekkod=$rec['kod'];
			return $rec['kod'];
		}
		else {
			$this->termekkod=$par;
			return $par;
		}
	}

	public function getCikkszam($kod) {
		$rec=$this->getDb()->fetchRow('SELECT cikkszam FROM termek WHERE kod='.$kod);
		return $rec['cikkszam'];
	}

	public function getCsoportkod($kod) {
		$rec=$this->getDb()->fetchRow('SELECT csoportkod FROM termek WHERE kod='.$kod);
		return $rec['csoportkod'];
	}

	public function getAr($termekkod) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		if (siiker_store::getUser()->getLoggedIn()) {
			$partnerkod=siiker_store::getUser()->getKod();
		}
		else {
			$partnerkod='null';
		}
		$rec=$this->getDb()->fetchRow('SELECT sfGetAr(null,kod,'.$partnerkod.',NOW(),null) AS nettohuf,'.
			'sfGetBrutto(sfGetAr(null,kod,'.$partnerkod.',NOW(),null),afa) AS bruttohuf '.
			'FROM termek WHERE kod='.$termekkod);
		return $rec;
	}

	public function setTermekStat($termekkod,$mode) {
		if ($mode=='megtekintve') {
			$mezo='megtekintve';
			$tekintve=1;
			$kosarba=0;
		}
		else {
			$mezo='kosarbateve';
			$tekintve=0;
			$kosarba=1;
		}
		$stmt=$this->getDb()->query('UPDATE termek SET '.$mezo.'='.$mezo.'+1 WHERE kod='.$termekkod);
	}

	private function getTermekDataForToplista($pluszsql) {
		$this->readParameters(1);
		$rec=$this->getDb()->fetchAll('SELECT t.kod,t.megtekintve,t.kosarbateve,tn.nev,tf.logoext,t.permalink,tf.kod AS tfkod '.
			'FROM termek t '.
			'INNER JOIN termeknev tn ON (t.kod=tn.termek) AND (tn.nyelv="'.$this->nyelv.'") '.
			'LEFT OUTER JOIN termek_files tf ON (t.kod=tf.termek) AND (tf.tipus=1) AND (tf.publikus=1) '.
			'WHERE (t.lathato=1) '.$pluszsql);
		return $rec;
	}

	protected function getTermekData($mode,$wheresql,$ordersql,$limitsql,$altermekkell) {
		$this->bejelentkezve=siiker_store::getUser()->getLoggedIn();
		if ($this->bejelentkezve) {
			$partnerkod=siiker_store::getUser()->getKod();
		}
		else {
			$partnerkod='null';
		}
		$this->readParameters($mode);
		$result=array();

		$rec=$this->getDb()->fetchAll('SELECT SQL_CALC_FOUND_ROWS t.kod,t.csoportkod,t.cikkszam,tn.nev,tn.nev2,tn.nev3,tn.nev4,tn.nev5,tn.rovidleiras,'.
			'tf.logoext,tn.htmlleiras,tn.weboldalcim,t.arweben,t.hozzaszolas,t.kulcsszavak,t.vankosar,t.seodescription,t.seoclassification,'.
			'kj.kosarbanemrakhato,tf.publikus,t.permalink,tcs.permalink AS tcspermalink,t.me,t.gyujto,tf.kod AS tfkod,t.sorrend,tf.filenev AS tffilenev, '.
			'sfGetAr(null,t.kod,'.$partnerkod.',NOW(),null) AS nettohuf,'.
			'sfGetBrutto(sfGetAr(null,t.kod,'.$partnerkod.',NOW(),null),t.afa) AS bruttohuf '.
			'FROM termek t '.
			'INNER JOIN termeknev tn ON (t.kod=tn.termek) AND (tn.nyelv="'.$this->nyelv.'")'.
			'LEFT OUTER JOIN keszletjelolo kj ON (t.keszletjelolo=kj.kod) '.
			'LEFT OUTER JOIN termekcsoport tcs ON (t.csoportkod=tcs.kod) '.
			'LEFT OUTER JOIN termek_files tf ON (t.kod=tf.termek) AND (tf.tipus=1) AND (tf.publikus=1) '.
			'WHERE (t.lathato=1) '.$wheresql.' '.$ordersql.' '.$limitsql);
		if ($altermekkell) {
			$this->termekdb=$this->getDb()->fetchOne('SELECT FOUND_ROWS()');
		}
		foreach ($rec as $sor) {
			$fejadat=array(
				'cim'=>$sor['weboldalcim'],
				'kulcsszavak'=>$sor['kulcsszavak'],
				'seodescription'=>$sor['seodescription'],
				'seoclassification'=>$sor['seoclassification']
			);
			$showdata=array(
				'cikkszam'=>$this->cikkszamlatszik,
				'nev'=>$this->nev1latszik,
				'nev2'=>$this->nev2latszik,
				'nev3'=>$this->nev3latszik,
				'nev4'=>$this->nev4latszik,
				'nev5'=>$this->nev5latszik,
				'me'=>$this->melatszik,
				'gyujto'=>$this->gyujtolatszik,
				'rovidleiras'=>$this->rovidleiraslatszik,
				'ar'=>(($this->arakloginnelkul || $this->bejelentkezve) && ($sor['arweben']==1)),
				'valutasar'=>($this->valutasarlatszik && ($sor['arweben']==1)),
				'netto'=>($this->nettolatszik && ($sor['arweben']==1)),
				'brutto'=>($this->bruttolatszik && ($sor['arweben']==1)),
				'kosar'=>(($sor['vankosar']==1)  && ($sor['kosarbanemrakhato']==0) && ($this->vasarlasloginnelkul || $this->bejelentkezve)),
				'kedvencek'=>$this->kedvenctermeklatszik,
				'image'=>$sor['publikus']==1,
				'tulajdonsagok'=>$this->tulajdonsaglatszik && ($this->getTermekTulajdonsagCount($sor['kod'])>0),
				'kiskepek'=>$this->galerialatszik && ($this->getTermekGalleryCount($sor['kod'])>0),
				'dokumentumok'=>$this->dokumentumlatszik && ($this->getTermekDocumentsCount($sor['kod'],false)>0),
				'archivdokumentumok'=>$this->dokumentumlatszik && ($this->getTermekDocumentsCount($sor['kod'],true)>0),
				'ajanlotttermekek'=>$this->ajanlotttermeklatszik && ($this->getAjanlottTermekCount($sor['kod'])>0),
				'keszlet'=>$this->keszletlatszik,
				'hozzaszolasok'=>($sor['hozzaszolas']==1)
			);
			$tlist=array(
				'kod'=>$sor['kod'],
				'csoportkod'=>$this->rewriteon?$sor['tcspermalink']:$sor['csoportkod'],
				'nev'=>$sor['nev'],
				'cikkszam'=>$sor['cikkszam'],
				'nev2'=>$sor['nev2'],
				'nev3'=>$sor['nev3'],
				'nev4'=>$sor['nev4'],
				'nev5'=>$sor['nev5'],
				'me'=>$sor['me'],
				'gyujto'=>$sor['gyujto'],
				'nettoarhuf'=>$sor['nettohuf']*1,
				'bruttoarhuf'=>$sor['bruttohuf']*1,
				'valutanem'=>$this->alapvalutanemnev,
				'nettoar'=>0,
				'bruttoar'=>0,
				'idegenvalutanem'=>'',
				'rovidleiras'=>$sor['rovidleiras'],
				'leiras'=>$sor['htmlleiras'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTermek,array('on'=>array('par'=>$sor['permalink']),'off'=>array('par'=>$sor['kod'])),$this->rewriteon),
				'kedvencuri'=>'?com='.siiker_command::$KedvencAdd.'&par='.$sor['kod'],
				'kedvencdeluri'=>'?com='.siiker_command::$KedvencDel.'&par='.$sor['kod'],
				'kedvenconclick'=>"addToKedvencek('".'index.php?com='.siiker_command::$JAXKedvencAdd.'&par='.$sor['kod']."');",
				'kosaruri'=>'?com='.siiker_command::$KosarAdd.'&par='.$sor['kod'],
				'kosardeluri'=>'?com='.siiker_command::$KosarDel.'&par='.$sor['kod'],
				'kosaronclick'=>"addToKosar('".'index.php?com='.siiker_command::$JAXKosarAdd.'&par='.$sor['kod']."');",
				'bigimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m'.$sor['logoext'],
				'smallimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m_f'.$sor['logoext'],
				'imagealt'=>$sor['tffilenev'],
				'tulajdonsagok'=>$this->getTermekTulajdonsag($sor['kod']),
				'kiskepek'=>$this->getTermekGallery($sor['kod']),
				'dokumentumok'=>$this->getTermekDocuments($sor['kod'],false),
				'archivdokumentumok'=>$this->getTermekDocuments($sor['kod'],true),
				'ajanlotttermekek'=>$altermekkell?$this->getAjanlottTermekForTermek($sor['kod']):'',
				'keszlet'=>$this->getKeszlet($sor['kod']),
				'hozzaszolasok'=>$this->getHozzaszolasok($sor['kod'])
			);
			$result[]=array(
				'showdata'=>$showdata,
				'data'=>$tlist,
				'fejadat'=>$fejadat
			);
		}
		return $result;
	}

	protected function getHozzaszolasCount($termekkod) {
		$result=array();
		$rec=$this->getDb()->FetchRow('SELECT COUNT(*) AS db FROM web_hozzaszolas WHERE (termek_kod='.$termekkod.') AND (lathato=1)');
		return $rec['db'];
	}

	protected function getHozzaszolasok($termekkod) {
		$result=array();
		$rec=$this->getDb()->FetchAll('SELECT * FROM web_hozzaszolas WHERE (termek_kod='.$termekkod.') AND (lathato=1) ORDER BY sorsz');
		foreach ($rec as $sor) {
			$result[]=array(
				'nick'=>$sor['nick'],
				'hozzaszolas'=>$sor['hozzaszolas'],
				'datum'=>$sor['mikor']
			);
		}
		return $result;
	}

	protected function getAjanlottTermekCount($termekkod) {
		$rec=$this->getDb()->fetchRow('SELECT COUNT(*) AS db FROM termekajanlott WHERE termek='.$termekkod);
		return $rec['db'];
	}

	protected function getAjanlottTermekForTermek($termekkod) {
		$rec=$this->getDb()->fetchAll('SELECT ajanlott FROM termekajanlott WHERE termek='.$termekkod);
		$x=array();
		foreach($rec as $sor) {
			$x[]=$sor['ajanlott'];
		}
		if (count($x)==0) {
			$where='AND (1=0)';
		}
		else {
			$where='AND (t.kod IN ('.implode(',',$x).'))';
		}
		$tomb=$this->getTermekData(2,$where,'ORDER BY t.sorrend,t.nev','',false);
		return $tomb;
	}

	protected function getTermekTulajdonsagCount($termekkod) {
		$rec=$this->getDb()->FetchRow('SELECT COUNT(*) AS db '.
			'FROM tultipusnev ttn,tulerteknev ten,termektulajdonsag ttul '.
			'WHERE (ttul.termek='.$termekkod.') AND (ttn.tultipus=ttul.tultipus) AND '.
			'(ttn.nyelv="'.$this->nyelv.'") AND (ten.tulertek=ttul.tulertek) AND (ten.nyelv="'.$this->nyelv.'") ');
		return $rec['db'];
	}

	protected function getTermekTulajdonsag($termekkod) {
		$result=array();
		$rec=$this->getDb()->FetchAll('SELECT ttn.nev AS ttnev, ten.ertek AS tenev '.
			'FROM tultipusnev ttn,tulerteknev ten,termektulajdonsag ttul '.
			'WHERE (ttul.termek='.$termekkod.') AND (ttn.tultipus=ttul.tultipus) AND '.
			'(ttn.nyelv="'.$this->nyelv.'") AND (ten.tulertek=ttul.tulertek) AND (ten.nyelv="'.$this->nyelv.'") '.
			'ORDER BY ttnev,tenev');
		foreach($rec as $sor) {
			$result[]=array(
				'tipusnev'=>$sor['ttnev'],
				'erteknev'=>$sor['tenev']);
		}
		return $result;
	}

	protected function getTermekGalleryCount($termekkod) {
		$rec=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM termek_files WHERE (termek='.$termekkod.') AND (tipus=2) AND (publikus=1)');
		return $rec['db'];
	}

	protected function getTermekGallery($termekkod) {
		$result=array();
		$rec=$this->getDb()->FetchAll('SELECT kod,filenev,logoext FROM termek_files WHERE (termek='.$termekkod.') AND (tipus=2) AND (publikus=1)');
		foreach($rec as $sor) {
			$result[]=array(
				'bigimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).'_m'.$sor['logoext'],
				'smallimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).'_m_s'.$sor['logoext'],
				'leiras'=>$sor['filenev']);
		}
		return $result;
	}

	protected function getTermekDocumentsCount($termekkod,$archiv=false) {
		$sql='SELECT COUNT(kod) AS db FROM termek_files WHERE (termek='.$termekkod.') AND (tipus=3) AND (nyelv="'.$this->nyelv.'") AND (publikus=1)';
		if ($archiv) {
			$sql.=' AND (archiv=1)';
		}
		else {
			$sql.=' AND (archiv<>1)';
		}
		$rec=$this->getDb()->FetchRow($sql);
		return $rec['db'];
	}

	protected function getTermekDocuments($termekkod,$archiv=false) {
		$result=array();
		$sql='SELECT kod,filenev,logoext,archivdatum FROM termek_files WHERE (termek='.$termekkod.') AND (tipus=3) AND (nyelv="'.$this->nyelv.'") AND (publikus=1)';
		if ($archiv) {
			$sql.=' AND (archiv=1)';
		}
		else {
			$sql.=' AND (archiv<>1)';
		}
		$sql.=' ORDER BY filenev';
		$rec=$this->getDb()->FetchAll($sql);
		foreach($rec as $sor) {
			$result[]=array(
				'uri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).$sor['logoext'],
				'leiras'=>$sor['filenev'],
				'archivdatum'=>$sor['archivdatum']
				);
		}
		return $result;
	}

	protected function getKeszlet($termekkod) {
		return $this->getDb()->fetchOne('SELECT SUM(mennyiseg) FROM keszlet WHERE (termek='.$termekkod.')');
	}

	protected function getPartnerWhereSQL() {
		return siiker_store::getUser()->getWhereSQL('user_kod','sessid');
	}

	protected function readParameters($mode) {
		$this->arakloginnelkul=$this->dbparams->getParam(siiker_const::$pWEBArakLoginNelkul,0)==1;
		$this->vasarlasloginnelkul=$this->dbparams->getParam(siiker_const::$pWEBVasarlasLoginNelkul,0)==1;
		$this->alapvalutanemkod=$this->dbparams->getParam(siiker_const::$pValutanem,1);
		$rec=$this->getDb()->fetchRow('SELECT nev FROM valutanem WHERE kod='.$this->alapvalutanemkod);
		$this->alapvalutanemnev=$rec['nev'];
		$this->kedvenctermeklatszik=$this->dbparams->getParam(siiker_const::$pWEBKedvencTermek,0)==1;
		switch ($mode) {
			case 1:
				$this->nettolatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataNetto,1)==1;
				$this->bruttolatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataBrutto,1)==1;
				$this->valutasarlatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataValutasar,0)==1;
				$this->cikkszamlatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataCikkszam,0)==1;
				$this->nev1latszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataNev1,1)==1;
				$this->nev2latszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataNev2,0)==1;
				$this->nev3latszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataNev3,0)==1;
				$this->nev4latszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataNev4,0)==1;
				$this->nev5latszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataNev5,0)==1;
				$this->melatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataME,0)==1;
				$this->gyujtolatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataGyujto,0)==1;
				$this->rovidleiraslatszik=$this->dbparams->getParam(siiker_const::$pWEBToplistaShowDataRovidleiras,0)==1;
				$this->tulajdonsaglatszik=false;
				$this->galerialatszik=false;
				$this->dokumentumlatszik=false;
				$this->ajanlotttermeklatszik=false;
				$this->keszletlatszik=false;
				break;
			case 2:
				$this->nettolatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataNetto,1)==1;
				$this->bruttolatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataBrutto,1)==1;
				$this->valutasarlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataValutasar,0)==1;
				$this->cikkszamlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataCikkszam,0)==1;
				$this->nev1latszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataNev1,1)==1;
				$this->nev2latszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataNev2,0)==1;
				$this->nev3latszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataNev3,0)==1;
				$this->nev4latszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataNev4,0)==1;
				$this->nev5latszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataNev5,0)==1;
				$this->melatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataME,0)==1;
				$this->gyujtolatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataGyujto,0)==1;
				$this->rovidleiraslatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataRovidleiras,0)==1;
				$this->tulajdonsaglatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataTulajdonsag,0)==1;
				$this->galerialatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataGaleria,0)==1;
				$this->dokumentumlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataDokumentum,0)==1;
				$this->ajanlotttermeklatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataAjanlotttermek,0)==1;
				$this->keszletlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermeklistaShowDataKeszlet,1)==1;
				break;
			case 3:
				$this->nettolatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataNetto,1)==1;
				$this->bruttolatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataBrutto,1)==1;
				$this->valutasarlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataValutasar,0)==1;
				$this->cikkszamlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataCikkszam,0)==1;
				$this->nev1latszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataNev1,1)==1;
				$this->nev2latszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataNev2,0)==1;
				$this->nev3latszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataNev3,0)==1;
				$this->nev4latszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataNev4,0)==1;
				$this->nev5latszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataNev5,0)==1;
				$this->melatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataME,0)==1;
				$this->gyujtolatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataGyujto,0)==1;
				$this->rovidleiraslatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataRovidleiras,0)==1;
				$this->tulajdonsaglatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataTulajdonsag,0)==1;
				$this->galerialatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataGaleria,0)==1;
				$this->dokumentumlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataDokumentum,0)==1;
				$this->ajanlotttermeklatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataAjanlotttermek,0)==1;
				$this->keszletlatszik=$this->dbparams->getParam(siiker_const::$pWEBTermekadatlapShowDataKeszlet,1)==1;
				break;
		}
	}

	public function saveComment($termek,$nick,$szoveg,$email) {
		$isql='INSERT INTO web_hozzaszolas (termek_kod,nick,sorsz,hozzaszolas,mikor,lathato,email) VALUES '.
			'('.$termek.','.
			'"'.$nick.'",'.
			'1,'.
			'"'.$szoveg.'",'.
			'NOW(),1,'.
			'"'.$email.'")';
		$this->getDb()->query($isql);
	}
}