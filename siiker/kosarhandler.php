<?php
class siiker_kosarhandler extends siiker_funkcio {

	public function __construct($tplfilename) {
		parent::__construct($tplfilename);
	}

	public function getKosarEnd() {
		return $this->getTemplateResult();
	}

	public function getKosarEndSzerz($megrendeleskod) {
		$this->assignData('szerzodesuri','index.php?com='.siiker_command::$KosarSzerzodesLetolt.'&par='.$megrendeleskod);
		return $this->getTemplateResult();
	}

	public function getKosarAdatBekero() {
		$kosar=new siiker_kosar();
		$rec=array('data'=>$kosar->getCartAdatBekero(),
			'sum'=>$kosar->getOsszesen(),
			'submitcommand'=>siiker_command::$KosarSubmit,
			'submitszerzcommand'=>siiker_command::$KosarSubmitSzerz,
			'loggedin'=>siiker_store::getUser()->getLoggedIn());
		$this->assignData('kosarlista',$rec);
		return $this->getTemplateResult();
	}

	public function getSPRKosarInkasszoRequest($megrkod) {
		$this->assignData('spr_kosarinkasszouri','index.php?com='.siiker_command::$SPRKosarInkasszo.'&par='.$megrkod);
		return $this->getTemplateResult();
	}

	public function sendSubmitEmail($megrendeleskod) {
		$mail=new Zend_Mail();
//		$mail->setBodyHtml($this->getKosarTermekLista());
		$mail->setBodyHtml($this->getMegrendelesTermekLista($megrendeleskod));
		$mail->setSubject('Megrendelés');
		$mail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
		$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBMegrendelesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
		foreach($cimek as $cim) {
			$mail->addTo($cim);
		}
		if (!siiker_store::getConfig()->developer) {
			$mail->send();
		}

		$pmail=new Zend_Mail();
//		$pmail->setBodyHtml($this->getKosarTermekLista());
		$pmail->setBodyHtml($this->getMegrendelesTermekLista($megrendeleskod));
		$pmail->setSubject('Megrendelés');
		$pmail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
		$pmail->addTo(siiker_store::getUser()->email);
		if (!siiker_store::getConfig()->developer) {
			$pmail->send();
		}

		$ertesito=new Zend_Mail();
		$ertesito->setBodyHtml('Megrendelés érkezett.');
		$ertesito->setSubject('Megrendelés');
		$ertesito->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
		$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBMegrendelesErtesitesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
		foreach($cimek as $cim) {
			$ertesito->addTo($cim);
		}
		if (!siiker_store::getConfig()->developer) {
			$ertesito->send();
		}
	}

	public function getMegrendelesTermekLista($megrendeleskod) {
		$tlist=array();
		$sumnetto=0;
		$sumbrutto=0;
		$megr=new siiker_megrendeles();
		$rec=$megr->getData($megrendeleskod);
		foreach ($rec as $sor) {
			$sumnetto=$sumnetto+$sor['nettoertek'];
			$sumbrutto=$sumbrutto+$sor['bruttoertek'];
			$tlist[]=array(
				'nev'=>$sor['nev'].' '.$sor['nev2'],
				'cikkszam'=>$sor['cikkszam'],
				'me'=>$sor['me'],
				'mennyiseg'=>$sor['mennyiseg'],
				'nettoarhuf'=>$sor['nettoar'],
				'bruttoarhuf'=>$sor['bruttoar'],
				'nettoertekhuf'=>$sor['nettoertek'],
				'bruttoertekhuf'=>$sor['bruttoertek'],
				'valutanem'=>'HUF');
		}
        $fej = $megr->getFejData($megrendeleskod);
		$result=array(
			'kod'=>$megrendeleskod,
			'partnernev'=>siiker_store::getUser()->nev,
			'partnerirszam'=>siiker_store::getUser()->irszam,
			'partnervaros'=>siiker_store::getUser()->varos,
			'partnerutca'=>siiker_store::getUser()->utca,
            'telefon'=>siiker_store::getUser()->telefon,
            'szamlanev'=>$fej['szam_cegnev'],
            'szamlairszam'=>$fej['szam_irszam'],
            'szamlavaros'=>$fej['szam_varos'],
            'szamlautca'=>$fej['szam_utca'],
            'szamlaadoszam'=>$fej['szam_adoszam'],
            'szallnev'=>$fej['szall_cegnev'],
            'szallirszam'=>$fej['szall_irszam'],
            'szallvaros'=>$fej['szall_varos'],
            'szallutca'=>$fej['szall_utca'],
			'sum'=>array('nettoahuf'=>$sumnetto,'bruttoarhuf'=>$sumbrutto),
			'data'=>$tlist);
		$this->assignData('kosarlista',$result);
		return $this->getTemplateResult();
	}

	public function getKosarTermekLista() {
		$tlist=array();
		$kosar=new siiker_kosar();
		$rec=$kosar->getTermekLista();
		foreach ($rec as $sor) {
			$tlist[]=array(
				'kod'=>$sor['kod'],
				'nev'=>$sor['nev'],
				'cikkszam'=>$sor['cikkszam'],
				'nev2'=>$sor['nev2'],
				'nev3'=>$sor['nev3'],
				'nev4'=>$sor['nev4'],
				'nev5'=>$sor['nev5'],
				'mennyiseg'=>$sor['mennyiseg'],
				'me'=>$sor['me'],
				'gyujto'=>$sor['gyujto'],
				'nettoarhuf'=>$sor['nettoegysarhuf']*1,
				'bruttoarhuf'=>$sor['bruttoegysarhuf']*1,
				'nettoertekhuf'=>$sor['nettohuf']*1,
				'bruttoertekhuf'=>$sor['bruttohuf']*1,
				'valutanem'=>'HUF',
				'nettoar'=>0,
				'bruttoar'=>0,
				'idegenvalutanem'=>'',
				'removeuri'=>'index.php?com='.siiker_command::$KosarDel.'&par='.$sor['kod'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTermek,array('on'=>array('par'=>$sor['permalink']),'off'=>array('par'=>$sor['kod'])),$this->rewriteon),
				'bigimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m'.$sor['logoext'],
				'smallimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m_f'.$sor['logoext'],
				'imagealt'=>$sor['tffilenev']);
		}
		$result=array(
			'data'=>$tlist,
			'sum'=>$kosar->getOsszesen(),
			'submitcommand'=>siiker_command::$KosarSubmit,
			'okcommand'=>siiker_command::$KosarChange,
			'adatbekerouri'=>'index.php?com='.siiker_command::$KosarAdatBe,
			'loggedin'=>siiker_store::getUser()->getLoggedIn(),
			'partnernev'=>siiker_store::getUser()->nev,
			'partnerirszam'=>siiker_store::getUser()->irszam,
			'partnervaros'=>siiker_store::getUser()->varos,
			'partnerutca'=>siiker_store::getUser()->utca);
		$this->assignData('kosarlista',$result);
		return $this->getTemplateResult();
	}

	public function getKisKosar() {
		$tlist=array();
		$kosar=new siiker_kosar();
		$show=siiker_store::getDbParams(siiker_const::$pWEBIntelligensKosar,0);
		if ($show) {
			$rec=$kosar->getTermekLista();
			foreach ($rec as $sor) {
				$tlist[]=array(
					'kod'=>$sor['kod'],
					'nev'=>$sor['nev'],
					'cikkszam'=>$sor['cikkszam'],
					'nev2'=>$sor['nev2'],
					'nev3'=>$sor['nev3'],
					'nev4'=>$sor['nev4'],
					'nev5'=>$sor['nev5'],
					'me'=>$sor['me'],
					'gyujto'=>$sor['gyujto'],
					'nettoarhuf'=>$sor['nettoegysarhuf']*1,
					'bruttoarhuf'=>$sor['bruttoegysarhuf']*1,
					'nettoertekhuf'=>$sor['nettohuf']*1,
					'bruttoertekhuf'=>$sor['bruttohuf']*1,
					'valutanem'=>$this->alapvalutanemnev,
					'nettoar'=>0,
					'bruttoar'=>0,
					'idegenvalutanem'=>'',
					'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTermek,array('on'=>array('par'=>$sor['permalink']),'off'=>array('par'=>$sor['kod'])),$this->rewriteon));
			}
		}
		$result=array(
			'show'=>$show,
			'data'=>$tlist,
			'sum'=>$kosar->getOsszesen(),
			'kosaruri'=>'index.php?com='.siiker_command::$Kosar);
		$this->assignData('kosarlista',$result);
		return $this->getTemplateResult();
	}
}
?>