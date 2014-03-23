<?php
/**
 * @package SIIKer3
 * @subpackage Funkci?
 */
class siiker_termekhandler extends siiker_funkcio {
	private $termek;
	private $fejadat;

	public function __construct($tplfilename) {
        siiker_store::writelog($tplfilename);
		parent::__construct($tplfilename);
	}

	public function getFejadat() {
		return $this->fejadat;
	}

    public function getGyorsvasarlasLista() {
		$tk=new siiker_termekcollection();
        $er=$tk->getGyorsvasarlasTermek();
        $this->assignData('termekek', $er);
        return $this->getTemplateResult();
    }

	public function getProcessedTermekLista($csoportkod,$page,$dimfilter) {
		$tcsop=new siiker_termekcsoport();
		$this->assignData('navigator',$tcsop->getNavigator($csoportkod));
		$this->assignData('csoportlista',$tcsop->getAlCsoportok($csoportkod,$dimfilter));
		$tomb=$tcsop->getTermekCsoport($csoportkod);
		$this->assignData('csoport',$tomb[0]);

		$tk=new siiker_termekcollection();
		$er=$tk->getTermekcsoportTermekKodok($csoportkod,$dimfilter);
		$termekkodok=array();
		foreach($er['lista'] AS $x) {
			$termekkodok[]=$x['data']['kod'];
		}
		$dim=new siiker_dimenzio();
		$tomb=$dim->getAll($dimfilter,$termekkodok);
		$this->assignData('szuro',$tomb);

		$termekek=new siiker_termekcollection();
		$eredmeny=$termekek->getTermekcsoportTermek($csoportkod,$page,$dimfilter);

		$tomb=array('termeklista'=>$eredmeny['lista']);
		$this->assignData('termekek',$tomb);
		$this->assignData('lapozo',$eredmeny['lapozo']);
		return $this->getTemplateResult();
	}

	public function getProcessedKeresettLista($keresendo,$page) {
		$termekek=new siiker_termekcollection();
		$eredmeny=$termekek->getKeresettTermek($keresendo,$page);
		$tomb=array('termeklista'=>$eredmeny['lista']);
		$this->assignData('termekek',$tomb);
		$this->assignData('lapozo',$eredmeny['lapozo']);
		$this->assignData('keresettkif',$keresendo);
		return $this->getTemplateResult();
	}

	public function getProcessedKedvencTermekLista($page) {
		$termekek=new siiker_termekcollection();
		$eredmeny=$termekek->getKedvencTermek($page);
		$tomb=array('termeklista'=>$eredmeny['lista']);
		$this->assignData('termekek',$tomb);
		$this->assignData('lapozo',$eredmeny['lapozo']);
		return $this->getTemplateResult();
	}

	public function getProcessedKosarTermekLista() {
		$termekek=new siiker_termekcollection();
		$eredmeny=$termekek->getKosarTermek();
		$tomb=array('termeklista'=>$eredmeny['lista']);
		$this->assignData('termekek',$tomb);
		return $this->getTemplateResult();
	}

	public function getProcessedSPRKalk($termekkod,$calcdata) {
		$this->assignTermekData($termekkod);
		$this->assignNavigator($this->termek->getCsoportKod($termekkod));
		$this->assignSPR_KalkEredmeny($calcdata);
		return $this->getTemplateResult();
	}

	public function getProcessedTermeklap($termekkod) {
		$this->assignTermekData($termekkod);
		$this->assignNavigator($this->termek->getCsoportKod($termekkod));
		$this->assignSPR_Kalk($termekkod);
		$this->termek->setTermekStat($termekkod,'megtekintve');
		return $this->getTemplateResult();
	}

	protected function assignTermekData($termekkod) {
		$this->termek=new siiker_termekcollection();
		$adat=$this->termek->getTermek($termekkod);
		$this->assignData('showdata',$adat[0]['showdata']);
		$this->assignData('data',$adat[0]['data']);
		$this->fejadat=$adat[0]['fejadat'];
	}

	protected function assignNavigator($csoportkod) {
		$navi=new siiker_termekcsoport();
		$this->assignData('navigator',$navi->getNavigator($csoportkod));
	}

	protected function assignSPR_Kalk($termekkod) {
		$spr_kalk=new siiker_spr_calculator();
		$this->assignData('spr_kalk',$spr_kalk->getData($termekkod));
	}

	protected function assignSPR_KalkEredmeny($calcdata) {
		$sprcalc=new siiker_spr_calculator();
		$calced=$sprcalc->getCalculatedData($calcdata);
		$this->assignData('spr_kalk_eredmeny',$calced);
	}

	public function saveComment($termek,$nick,$szoveg,$email) {
		$termekek=new siiker_termekcollection();
		$termekek->saveComment($termek,$nick,$szoveg,$email);
	}
}
?>