<?php
class siiker_temakor extends siiker_dbalapclass {

	private $temakorbejegyzesdb;

	public function getData($kod) {
		$result=$this->getTemakorBejegyzesData('AND (tb.kod='.$kod.')','',false);
		return $result[0];
	}

	public function getList($temakorkod,$page) {
		$perpage=$this->dbparams->getParam(siiker_const::$pWEBTemakorBejegyzesekSzama,10);
		$pager=new law_pager($page,$perpage,
			siiker_tools::getPermalink(siiker_command::$ShowTemaLista,array('on'=>array('par'=>$temakorkod,'par2'=>''),
				'off'=>array('par'=>$temakorkod,'par2'=>'')),$this->rewriteon));
		$wheresql='AND (tb.temakor='.$temakorkod.')';
		$limitsql=$pager->getLimitSQL();
		$tomb['temakor']=$this->getTemakorData($temakorkod);
		$tomb['lista']=$this->getTemakorBejegyzesData($wheresql,$limitsql,true);
		$tomb['lapozo']=$pager->getPager($this->temakorbejegyzesdb);
		return $tomb;
	}

	protected function getTemakorData($temakorkod) {
		return $this->getDb()->fetchRow('SELECT t.kod AS kod,tn.cim,t.permalink AS permalink,tn.htmlleiras '.
			'FROM temakornev tn,temakor t '.
			'WHERE (t.kod=tn.temakor) AND (tn.nyelv="'.$this->nyelv.'") AND (t.kod='.$temakorkod.')');
	}

	protected function getTemakorBejegyzesData($wheresql,$limitsql,$lista) {
		$rec=$this->getDb()->fetchAll('SELECT SQL_CALC_FOUND_ROWS tb.kod,tbn.cim,tbn.htmlszoveg,tbn.lead,tb.datum,tb.szerzo,tb.permalink,tf.filenev AS tffilenev,'.
			'tf.kod AS tfkod,tf.logoext '.
			'FROM temakorbejegyzes tb '.
			'INNER JOIN temakorbejegyzesnev tbn ON (tb.kod=tbn.temakorbejegyzes) AND (tbn.nyelv="'.$this->nyelv.'")'.
			'LEFT OUTER JOIN temakorbejegyzes_files tf ON (tb.kod=tf.temakorbejegyzes) AND (tf.tipus=1) AND (tf.publikus=1) '.
			'WHERE (tb.lathato=1) '.$wheresql.' ORDER BY tb.sorrend,tb.kod '.$limitsql);
		$this->temakorbejegyzesdb=$this->getDb()->fetchOne('SELECT FOUND_ROWS()');
		$result=array();
		foreach($rec as $sor) {
			$result[]=array('caption'=>$sor['cim'],
				'lead'=>$sor['lead'],
				'datum'=>$sor['datum'],
				'szoveg'=>$sor['htmlszoveg'],
				'szerzo'=>$sor['szerzo'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTema,array('on'=>array('par'=>$sor['permalink']),'off'=>array('par'=>$sor['kod'])),$this->rewriteon),
				'bigimageuri'=>siiker_store::getConfig()->path->files.'temakorbejegyzes_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m'.$sor['logoext'],
				'smallimageuri'=>siiker_store::getConfig()->path->files.'temakorbejegyzes_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m_f'.$sor['logoext'],
				'imagealt'=>$sor['tffilenev'],
				'kiskepek'=>($lista?'':$this->getTemakorGallery($sor['kod'])),
				'dokumentumok'=>($lista?'':$this->getTemakorDocuments($sor['kod'])));
		}
		return $result;
	}

	protected function getTemakorGalleryCount($kod) {
		$rec=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM temakorbejegyzes_files WHERE (temakorbejegyzes='.$kod.') AND (tipus=2) AND (publikus=1)');
		return $rec['db'];
	}

	protected function getTemakorGallery($kod) {
		$result=array();
		$rec=$this->getDb()->FetchAll('SELECT kod,filenev,logoext FROM temakorbejegyzes_files WHERE (temakorbejegyzes='.$kod.') AND (tipus=2) AND (publikus=1)');
		foreach($rec as $sor) {
			$result[]=array(
				'bigimageuri'=>siiker_store::getConfig()->path->files.'temakorbejegyzes_files'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).'_m'.$sor['logoext'],
				'smallimageuri'=>siiker_store::getConfig()->path->files.'temakorbejegyzes_files'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).'_m_s'.$sor['logoext'],
				'leiras'=>$sor['filenev']);
		}
		return $result;
	}

	protected function getTemakorDocumentsCount($kod) {
		$rec=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM temakorbejegyzes_files WHERE (temakorbejegyzes='.$kod.') AND (tipus=3) AND (nyelv="'.$this->nyelv.'") AND (publikus=1)');
		return $rec['db'];
	}

	protected function getTemakorDocuments($kod) {
		$result=array();
		$rec=$this->getDb()->FetchAll('SELECT kod,filenev,logoext FROM temakorbejegyzes_files WHERE (temakorbejegyzes='.$kod.') AND (tipus=3) AND (nyelv="'.$this->nyelv.'") AND (publikus=1)');
		foreach($rec as $sor) {
			$result[]=array(
				'uri'=>siiker_store::getConfig()->path->files.'temakorbejegyzes_files'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).$sor['logoext'],
				'leiras'=>$sor['filenev']);
		}
		return $result;
	}
}
?>