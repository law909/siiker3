<?php
class siiker_mnbarfolyam extends siiker_modul {

	protected $mnbsoap;

	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBNapiArfolyamLatszik);
	}

	public function getData()
	{
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$result['arfolyamlista']=$this->download();
		}
		return $result;
	}

	public function download() {
		$ma=date('Y.m.d');
		$defavaluta=$this->dbparams->getParam(siiker_const::$pValutanem,1);
		$rec=$this->getDb()->fetchAll('SELECT v.kod,v.nev FROM valutanem v '.
			'LEFT OUTER JOIN arfolyam a ON (v.kod=a.valutanem) AND (a.datum="'.$ma.'") '.
			'WHERE (a.kod IS NULL) AND (v.kod<>'.$defavaluta.')');
		if (count($rec)>0) {
			$valutak=array();
			$searchvalutak=array();
			foreach($rec as $sor) {
				$valutak[$sor['kod']]=$sor['nev'];
				$searchvalutak[$sor['nev']]=$sor['kod'];
			}
			$this->mnbsoap=new law_mnbarfolyam();
			$rates=$this->mnbsoap->getExchangeRates($ma,$ma,implode(',',$valutak));
			foreach($rates as $rate) {
				$this->getDb()->query('INSERT INTO arfolyam (valutanem,datum,ertek) VALUES (?,?,?)',
					array($searchvalutak[(string)$rate['valutanem']],$rate['datum'],str_replace(',','.',$rate['arfolyam'])));
			}
		}
		$rates=$this->getDb()->fetchAll('SELECT datum,v.nev AS valutanem,ertek AS arfolyam '.
			'FROM arfolyam a,valutanem v '.
			'WHERE (a.valutanem=v.kod) AND (a.datum="'.$ma.'")');
		return $rates;
	}
}
?>