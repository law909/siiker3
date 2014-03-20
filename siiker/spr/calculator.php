<?php
class siiker_spr_calculator extends siiker_dbalapclass {

	public function __construct() {
		parent::__construct();
	}

	public function getData($termekkod) {
		$result=array();
		if (siiker_store::getUser()->getLoggedIn()) {
			$rec=$this->getDb()->fetchRow('SELECT cikkszam FROM termek WHERE kod='.$termekkod);
			$cikkszam=$rec['cikkszam'];
			$rec=$this->getDb()->fetchRow('SELECT * FROM spr_kalkulacio WHERE kod="'.$cikkszam.'"');
			if ($rec) {
				$result['show']=true;
				$result['valuta']=$rec['valuta'];
				$result['arfolyam']=$rec['arfolyam'];
				$result['futamido']=$rec['futamido'];
				$result['actionuri']='index.php';
				$result['okcommand']=siiker_command::$SPRCalculate;
				$result['arfolyamedit']=$rec['arfolyam']!=1;
			}
			else {
				$result['show']=false;
			}
		}
		else {
			$result['show']=false;
		}
		return $result;
	}

	public function getCalculatedData($calcadat) {
		$rec=$this->getDb()->fetchRow('SELECT cikkszam FROM termek WHERE kod='.$calcadat['kod']);
		$cikkszam=$rec['cikkszam'];
		$rec=$this->getDb()->fetchRow('SELECT * FROM spr_kalkulacio WHERE kod="'.$cikkszam.'"');
		$arany=($calcadat['ertek']/$rec['ertekvaluta']);
		$arfolyamarany=($calcadat['arfolyam']/$rec['arfolyam']);
		$result=array(
			'show'=>true,
			'szerzodesertek'=>$calcadat['ertek'],
			'arfolyam'=>$calcadat['arfolyam'],    //$rec['arfolyam'],
			'indulovaluta'=>$rec['indulovaluta']*$arany,
			'indulo'=>$rec['indulovaluta']*$arany*$calcadat['arfolyam'],
			'szerzkotdij'=>$rec['szerzkotdij']*$arany,
			'maradvanyertek'=>$rec['maradvanyertek']*$arany,
			'havidijvaluta'=>$rec['havidijvaluta']*$arany,
			'havidij'=>$rec['havidijvaluta']*$arany*$calcadat['arfolyam'],
			'valuta'=>$rec['valuta'],
			'futamido'=>$rec['futamido']);
		$this->getDb()->query('INSERT INTO spr_kalkulacio_save (partner,termek,valuta,ertek,arfolyam,futamido,indulovaluta,indulo,'.
			'szerzkotdij,maradvanyertek,havidijvaluta,havidij) VALUES ('.siiker_store::getUser()->getKod().','.$calcadat['kod'].
			',"'.$result['valuta'].'",'.$result['szerzodesertek'].','.$result['arfolyam'].','.$result['futamido'].','.
			$result['indulovaluta'].','.$result['indulo'].','.$result['szerzkotdij'].','.$result['maradvanyertek'].','.
			$result['havidijvaluta'].','.$result['havidij'].')');
		$rec=$this->getDb()->fetchRow('SELECT LAST_INSERT_ID() AS ujkod');
		$result['szerzkivonaturi']='index.php?com='.siiker_command::$SPRSzerzodesKivonat.'&par='.$rec['ujkod'];
		$result['ajanlatkeresuri']='index.php?com='.siiker_command::$SPRAjanlatKeres.'&par='.$rec['ujkod'];

		$szerz=$this->getSzerzodesKivonatData($rec['ujkod']);

		$dwoo=new Dwoo(siiker_store::getConfig()->path->template_c);
		$tpl=new Dwoo_Template_File(siiker_store::getConfig()->path->template.'email_spr_kalk.tpl');
		$adat=new Dwoo_Data();

		foreach($szerz as $valt=>$ertek) {
			$adat->assign($valt,$ertek);
		}

		$mail=new Zend_Mail();
		$mail->setBodyHtml($dwoo->get($tpl,$adat));
		$mail->setSubject('Ajánlatkérés');
		$mail->setFrom('siiker@sprinter-lizing.hu','SIIKer');
		$mail->addTo('arajanlat@sprinter-lizing.hu');
		if (!siiker_store::getConfig()->developer) {
			$mail->send();
		}
		return $result;
	}

	public function getSzerzodesKivonatData($kalkkod) {
		$rec=$this->getDb()->fetchRow('SELECT p.nev AS partnernev,p.cegnev,p.irszam,p.varos,p.utca,p.adoszam,p.cjszam,'.
			'p.cegbanknev,p.cegbankszla,p.telefon,t.nev AS termeknev,spr.* FROM spr_kalkulacio_save spr '.
			'INNER JOIN termek t ON (spr.termek=t.kod) '.
			'LEFT OUTER JOIN partner p ON (spr.partner=p.kod) '.
			'WHERE (spr.kod='.$kalkkod.')');
		$result=array(
			'cegnev'=>$rec['cegnev'],
			'cegcime'=>$rec['irszam'].' '.$rec['varos'].', '.$rec['utca'],
			'szemelyneve'=>$rec['partnernev'],
			'adoszam'=>$rec['adoszam'],
			'cegjegyzekszam'=>$rec['cjszam'],
			'telefonszam'=>$rec['telefon'],
			'bankneve'=>$rec['cegbanknev'],
			'bankszamlaszam'=>$rec['cegbankszla'],
			'termeknev'=>$rec['termeknev'],
			'honap'=>$rec['futamido'],
			'deviza'=>$rec['valuta'],
			'arfolyam'=>$rec['arfolyam'],
			'eszkertdev'=>$rec['ertek'],
			'eszkerthuf'=>$rec['ertek']*$rec['arfolyam'],
			'indreszldev'=>$rec['indulovaluta'],
			'indreszlhuf'=>$rec['indulo'],
			'szerzkotdij'=>$rec['szerzkotdij'],
			'maradvanyerthuf'=>$rec['maradvanyertek'],
			'havilizingdev'=>$rec['havidijvaluta'],
			'havilizinghuf'=>$rec['havidij']);
		return $result;
	}

	public function sendAjanlatKeres($kalkkod) {
		$rec=$this->getDb()->fetchRow('SELECT p.nev AS partnernev,p.cegnev,p.irszam,p.varos,p.utca,p.adoszam,p.cjszam,'.
			'p.cegbanknev,p.cegbankszla,p.telefon,t.nev AS termeknev,spr.* FROM spr_kalkulacio_save spr '.
			'INNER JOIN termek t ON (spr.termek=t.kod) '.
			'LEFT OUTER JOIN partner p ON (spr.partner=p.kod) '.
			'WHERE (spr.kod='.$kalkkod.')');
		$result=array(
			'cegnev'=>$rec['cegnev'],
			'cegcime'=>$rec['irszam'].' '.$rec['varos'].', '.$rec['utca'],
			'szemelyneve'=>$rec['partnernev'],
			'adoszam'=>$rec['adoszam'],
			'cegjegyzekszam'=>$rec['cjszam'],
			'telefonszam'=>$rec['telefon'],
			'bankneve'=>$rec['cegbanknev'],
			'bankszamlaszam'=>$rec['cegbankszla'],
			'termeknev'=>$rec['termeknev'],
			'honap'=>$rec['futamido'],
			'deviza'=>$rec['valuta'],
			'arfolyam'=>$rec['arfolyam'],
			'eszkertdev'=>$rec['ertek'],
			'eszkerthuf'=>$rec['ertek']*$rec['arfolyam'],
			'indreszldev'=>$rec['indulovaluta'],
			'indreszlhuf'=>$rec['indulo'],
			'szerzkotdij'=>$rec['szerzkotdij'],
			'maradvanyerthuf'=>$rec['maradvanyertek'],
			'havilizingdev'=>$rec['havidijvaluta'],
			'havilizinghuf'=>$rec['havidij']);
		$dwoo=new Dwoo(siiker_store::getConfig()->path->template_c);
		$tpl=new Dwoo_Template_File(siiker_store::getConfig()->path->template.'email_spr_ajanlatkero.tpl');
		$adat=new Dwoo_Data();

		foreach($result as $valt=>$ertek) {
			$adat->assign($valt,$ertek);
		}

		$mail=new Zend_Mail();
		$mail->setBodyHtml($dwoo->get($tpl,$adat));
		$mail->setSubject('Kalkuláció');
		$mail->setFrom('siiker@sprinter-lizing.hu','SIIKer');
		$mail->addTo(siiker_store::getDbParams()->getParam(siiker_const::$pWEBMegrendelesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
		if (!siiker_store::getConfig()->developer) {
			$mail->send();
		}
		return $result;
	}
}
?>
