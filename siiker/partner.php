<?php
class siiker_partner extends siiker_dbalapclass {
	private $kod;
	private $props;
	protected $username;
	protected $password;

	public function __construct() {
		parent::__construct();
		$this->kod=siiker_store::getUserSession()->kod;
		$this->loadData();
	}

	public function __get($varname) {
		if (!is_array($this->props)) {
			return null;
		}
		if (array_key_exists($varname,$this->props)) {
			return $this->props[$varname];
		}
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $varname .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
	}

	public function __isset($varname) {
		return isset($this->props[$varname]);
	}

	public function __unset($varname) {
		unset($this->props[$varname]);
	}

	public function __set($varname,$value) {
		$this->props[$varname]=$value;
	}

	public function JAXcheckUniqueUsername($uname) {
		if ($this->getLoggedIn()) {
			$r=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM partner WHERE (webusername="'.$uname.'") AND (kod<>'.$this->getKod().')');
		}
		else {
			$r=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM partner WHERE (webusername="'.$uname.'")');
		}
		if ($r['db']==0) {
			$result='OK';
		}
		else {
			$st=siiker_store::getSiteText();
			$result=mb_convert_encoding($st->partner->marvanazonosito,'UTF-8','ISO-8859-1');
		}
		return $result;
	}

	public function JAXcheckUniqueEmail($email) {
		if ($this->getLoggedIn()) {
			$r=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM partner WHERE (email="'.$email.'") AND (kod<>'.$this->getKod().')');
		}
		else {
			$r=$this->getDb()->FetchRow('SELECT COUNT(kod) AS db FROM partner WHERE (email="'.$email.'")');
		}
		if ($r['db']==0) {
			$result='OK';
		}
		else {
			$st=siiker_store::getSiteText();
			$result=mb_convert_encoding($st->partner->marvanemail,'UTF-8','ISO-8859-1');
		}
		return $result;
	}

	public function getLoggedIn() {
		return $this->getKod()<>0;
	}

	public function getKod() {
		return $this->kod*1;
	}

	public function setLastClickTime() {
		if ($this->getLoggedIn()) {
			$this->getDb()->query('UPDATE partner SET utolsokatt=NOW() WHERE kod='.$this->getKod());
		}
	}

	public function getWhereSQL($userkodfield='user_kod',$sessidfield='sessid') {
		if ($this->getLoggedIn()) {
			return '('.$userkodfield.'='.$this->getKod().')';
		}
		else {
			return '(('.$userkodfield.'=0) OR ('.$userkodfield.' IS NULL)) AND ('.$sessidfield.'="'.Zend_Session::getId().'")';
		}
	}

	private function compileRegisterData($params) {
		$regdata=array('nev'=>$params->getParam('user_partnernev',''),
			'cegnev'=>$params->getParam('user_cegnev',''),
			'webusername'=>$params->getParam('user_username',''),
			'webpassword'=>$params->getParam('user_pwd1',''),
			'email'=>$params->getParam('user_email',''),
			'irszam'=>$params->getParam('user_irszam',''),
			'varos'=>$params->getParam('user_varos',''),
			'utca'=>$params->getParam('user_utca',''),
			'telefon'=>$params->getParam('user_telefon',''),
			'adoszam'=>$params->getParam('user_adoszam',''),
			'cjszam'=>$params->getParam('user_cjszam',''),
			'cegbankszla'=>$params->getParam('user_cegbankszla',''),
			'cegbanknev'=>$params->getParam('user_cegbanknev',''),
			'viszontelado'=>$params->getParam('user_viszontelado','')=='on');
		if ($regdata['cegnev']=='') {
			$regdata['cegnev']=$regdata['nev'];
		}
		if ($regdata['webusername']=='') {
			$regdata['webusername']=$regdata['email'];
		}
		return $regdata;
	}

	private function sendRegErtesito($pluszszoveg) {
		// Regisztráció értesítõ mail
		$ertesito=new Zend_Mail();
		$ertesito->setBodyHtml('Regisztráció érkezett.'.$pluszszoveg);
		$ertesito->setSubject('Regisztráció');
		$ertesito->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
		$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBRegisztracioErtesitesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
		foreach($cimek as $cim) {
			$ertesito->addTo($cim);
		}
		if (!siiker_store::getConfig()->developer) {
			$ertesito->send();
		}
	}

	public function Register($param) {
		$adat=$this->compileRegisterData($param);
		$uzenet=$this->JAXcheckUniqueUsername($adat['webusername']);
		if ($uzenet<>'OK') {
			$this->sendRegErtesito(' Van már ilyen felhasználó: '.$adat['webusername']);
			return $uzenet;
		}
		else {
			$uzenet=$this->JAXcheckUniqueEmail($adat['email']);
			if ($uzenet<>'OK') {
				$mail=new Zend_Mail();
				$mail->setBodyHtml('Oldalunkon az Ön címével regisztrációs kísérlet történt. Ha Ön próbálkozott, kérjük vegye fel a kapcsolatot ügyfélszolgálatunkkal.');
				$mail->setSubject('Regisztráció');
				$mail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
				$mail->addTo($adat['email']);
				if (!siiker_store::getConfig()->developer) {
					$mail->send();
				}
				$this->sendRegErtesito(' Van már ilyen email: '.$adat['email']);
				return $uzenet;
			}
			else {
				if ($this->getLoggedIn()) {
					$r=$this->getDb()->FetchRow('SELECT syncstatus FROM partner WHERE kod='.$this->getKod());
					if ($r['syncstatus']==0) {
						$syncstatus=2;
					}
					else {
						$syncstatus=$r['syncstatus'];
					}
					$updatesql='UPDATE partner SET ';
					foreach ($adat as $mezonev=>$ertek) {
						if ($mezonev=='webpassword') {
							$updatesql.=$mezonev.'=SHA1(MD5("'.$ertek.'")),';
						}
						else {
							$updatesql.=$mezonev.'="'.$ertek.'",';
						}
					}
					$updatesql.='syncstatus='.$syncstatus.' WHERE kod='.$this->getKod();
					$this->getDb()->query($updatesql);
				}
				else {
					$insertsql='INSERT INTO partner ';
					$insertfields='(';
					$insertvalues='(';
					foreach ($adat as $mezonev=>$ertek) {
						$insertfields.=$mezonev.',';
						if ($mezonev=='webpassword') {
							$insertvalues.='SHA1(MD5("'.$ertek.'")),';
						}
						else {
							$insertvalues.='"'.$ertek.'",';
						}
					}
					$insertfields.='sessid,vtipus,partnertipus,syncstatus,valid,sync_id)';
					$insertvalues.='"'.Zend_Session::getId().'",1,1,1,0,UUID())';
					$this->getDb()->query($insertsql.$insertfields.' VALUES '.$insertvalues);
					$rec=$this->getDb()->fetchRow('SELECT LAST_INSERT_ID() AS db');

					$aktivaltpl=siiker_store::makeTemplateHandler(siiker_store::getConfig()->path->template.'email_partner_aktivalas.tpl');
					$aktivaltpl->assignData('nev',$adat['nev']);
					$aktivaltpl->assignData('uri',$_SERVER['SCRIPT_URI'].'?com='.siiker_command::$PartnerRegAct.'&par='.$rec['db']);
					// Aktiváló mail
					if ($this->dbparams->getParam(siiker_const::$pWEBEmailesAktivalas,0)<>0) {
						$mail=new Zend_Mail();
						$mail->setBodyHtml($aktivaltpl->getTemplateResult());
						$mail->setSubject('Regisztráció aktiválás');
						$mail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
						$mail->addTo($adat['email']);
						if (!siiker_store::getConfig()->developer) {
							$mail->send();
						}
					}
					// Regisztráció adatküldõ mail
					$ujpartner=$this->getDb()->fetchRow('SELECT nev,cegnev,webusername,email,irszam,varos,utca,'.
						'telefon,adoszam,cjszam,cegbankszla,cegbanknev '.
						'FROM partner WHERE kod='.$rec['db']);
					$hometpl=siiker_store::makeTemplateHandler(siiker_store::getConfig()->path->template.'email_partner_adatlap.tpl');
					foreach($ujpartner as $mezo=>$ertek) {
						$hometpl->assignData($mezo,$ertek);
					}
					$homemail=new Zend_Mail();
					$homemail->setBodyHtml($hometpl->getTemplateResult());
					$homemail->setSubject('Regisztráció');
					$homemail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
					$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBRegisztracioEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
					foreach($cimek as $cim) {
						$homemail->addTo($cim);
					}
					if (!siiker_store::getConfig()->developer) {
						$homemail->send();
					}
					$this->sendRegErtesito('');
				}
				return 'OK';
			}
		}
	}

	public function getData() {
		$result=array();
		if ($this->getLoggedIn()) {
			$result['data']=array('actionuri'=>'index.php',
				'nev'=>$this->nev,
				'cegnev'=>$this->cegnev,
				'webusername'=>$this->webusername,
				'email'=>$this->email,
				'telefon'=>$this->telefon,
				'irszam'=>$this->irszam,
				'varos'=>$this->varos,
				'utca'=>$this->utca,
				'adoszam'=>$this->adoszam,
				'cjszam'=>$this->cjszam,
				'cegbankszla'=>$this->cegbankszla,
				'cegbanknev'=>$this->cegbanknev,
				'viszontelado'=>$this->viszontelado,
				'okcommand'=>siiker_command::$PartnerModOK);
		}
		else {
			$result['data']=array('actionuri'=>'index.php',
				'nev'=>'',
				'cegnev'=>'',
				'webusername'=>'',
				'email'=>'',
				'telefon'=>'',
				'irszam'=>'',
				'varos'=>'',
				'utca'=>'',
				'adoszam'=>'',
				'cjszam'=>'',
				'cegbankszla'=>'',
				'cegbanknev'=>'',
				'viszontelado'=>'',
				'okcommand'=>siiker_command::$PartnerRegOK);
		}
		$result['showdata']=$this->getShowData();
		$result['reqdata']=$this->getReqData();
		$result['reqshowdata']=$this->getShowReqData();
		return $result;
	}

	public function getLoginData() {
		if ($this->getLoggedIn()) {
			return array('actionuri'=>'index.php',
			'modificationuri'=>'index.php?com='.siiker_command::$PartnerMod,
			'command'=>siiker_command::$Logout,
			'jaxcommand'=>siiker_command::$Logout,
			'nev'=>$this->nev);
		}
		else {
			return array('actionuri'=>'index.php',
			'registrationuri'=>'index.php?com='.siiker_command::$PartnerReg,
			'command'=>siiker_command::$Login,
			'jaxcommand'=>siiker_command::$JAXLogin);
		}
	}

	protected function loadData() {
		$p=$this->getDb()->fetchRow('SELECT nev,cegnev,webusername,email,irszam,varos,utca,'.
			'telefon,adoszam,cjszam,cegbankszla,cegbanknev,viszontelado '.
			'FROM partner WHERE kod='.$this->getKod());
		if ($p) {
			foreach ($p as $mezo=>$ertek) {
				$this->$mezo=$ertek;
			}
		}
	}

	private function initLoginData($pkod,$uname,$upass) {
		$this->kod=$pkod;
		$this->username=$uname;
		$this->password=$upass;
		$this->loadData();
		$this->getDb()->query('UPDATE web_ws_kedvenctermek SET user_kod='.$this->getKod().' WHERE sessid="'.Zend_Session::getId().'"');
		$this->getDb()->query('UPDATE web_ws_kosar SET user_kod='.$this->getKod().' WHERE sessid="'.Zend_Session::getId().'"');
		siiker_store::getUserSession()->kod=$this->getKod();
		$this->setLastClickTime();
	}

	public function sendLoginMail() {
		$hometpl=siiker_store::makeTemplateHandler(siiker_store::getConfig()->path->template.'email_partner_adatlap.tpl');
		foreach($this->props as $mezo=>$ertek) {
			$hometpl->assignData($mezo,$ertek);
		}
		$homemail=new Zend_Mail();
		$homemail->setBodyHtml($hometpl->getTemplateResult());
		$homemail->setSubject($this->nev.' - '.$this->cegnev.' - bejelentkezett');
		$homemail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
		$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBLoginErtesitesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
		foreach($cimek as $cim) {
			$homemail->addTo($cim);
		}
		if (!siiker_store::getConfig()->developer) {
			$homemail->send();
		}
	}

	public function Login($uname,$upass) {
		$p=$this->getDb()->fetchRow('SELECT kod FROM partner WHERE (webusername="'.$uname.'") AND (webpassword="'.sha1(md5($upass)).'") AND (valid=1)');
		if ($p) {
			$this->initLoginData($p['kod'],$uname,$upass);
			return true;
		}
		else {
			$p=$this->getDb()->fetchRow('SELECT kod FROM partner WHERE (webusername="'.$uname.'")');
			if ($p) {
				$adminpass=$this->dbparams->getParam(siiker_const::$pWEBAdminPassword,'');
				if ($adminpass<>'') {
					if (sha1(md5($upass))===$adminpass) {
						$this->initLoginData($p['kod'],$uname,$upass);
						return true;
					}
				}
			}
			return false;
		}
	}

	public function AutoLogout() {
		if ($this->getLoggedIn()) {
			$rec=$this->getDb()->fetchRow('SELECT DATE_FORMAT(DATE_ADD(utolsokatt,INTERVAL '.
				$this->dbparams->getParam(siiker_const::$pWEBAutoLogout,30).' minute),"%Y%m%d%H%i%s") AS datum FROM partner WHERE kod='.$this->getKod());
			if ($rec) {
				$d=date('YmdHis');
				if ($rec['datum']<$d) {
					$this->Logout();
				}
			}
		}
	}

	public function Logout() {
		Zend_Session::namespaceUnset('part');
		$this->kod=0;
		unset($this->username);
		unset($this->password);
	}

	public function Validate($partnerkod) {
		if (!is_numeric($partnerkod)) {
			return null;
		}
		$this->getDb()->query('UPDATE partner SET valid=1 WHERE kod='.$partnerkod);
	}

	public function getShowData() {
		return array('nev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegNevLatszik,1)==1,
		'webpassword'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegJelszoLatszik,1)==1,
		'cegnev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegnevLatszik,1)==1,
		'webusername'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegAzonositoLatszik,1)==1,
		'email'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegEmailLatszik,1)==1,
		'irszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimLatszik,1)==1,
		'varos'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimLatszik,1)==1,
		'utca'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimLatszik,1)==1,
		'telefon'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegTelefonLatszik,1)==1,
		'adoszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegadoszamLatszik,0)==1,
		'cjszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegcjszamLatszik,0)==1,
		'cegbankszla'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegbankszlaLatszik,0)==1,
		'cegbanknev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegbanknevLatszik,0)==1,
		'viszontelado'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerReqViszonteladoLatszik,0)==1);
	}

	public function getReqData() {
		return array('nev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegNevKot,1)==1?' { required:true }':'',
		'webpassword'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegJelszoKot,1)==1?' { required:true }':'',
		'webpassword2'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegJelszoKot,1)==1?" { required:true, equalTo: '#PartnerPassword1Edit' }":"{ equalTo: '#PartnerPassword1Edit' }",
		'cegnev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegnevKot,1)==1?' {required:true }':'',
		'webusername'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegAzonositoKot,1)==1?' { required:true }':'',
		'email'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegEmailKot,1)==1?' { required:true, email:true }':' { email:true }',
		'irszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimKot,1)==1?' { required:true }':'',
		'varos'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimKot,1)==1?' { required:true }':'',
		'utca'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimKot,1)==1?' { required:true }':'',
		'telefon'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegTelefonKot,1)==1?' { required:true }':'',
		'adoszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegadoszamKot,0)==1?' { required:true }':'',
		'cjszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegcjszamKot,0)==1?' { required:true }':'',
		'cegbankszla'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegbankszlaKot,0)==1?' { required:true }':'',
		'cegbanknev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegbanknevKot,0)==1?' { required:true }':'',
		'viszontelado'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegViszonteladoKot,0)==1?' { required:true }':'',);
	}

	public function getShowReqData() {
		return array('nev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegNevKot,1)==1,
		'webpassword'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegJelszoKot,1)==1,
		'webpassword2'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegJelszoKot,1)==1,
		'cegnev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegnevKot,1)==1,
		'webusername'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegAzonositoKot,1)==1,
		'email'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegEmailKot,1)==1,
		'irszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimKot,1)==1,
		'varos'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimKot,1)==1,
		'utca'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCimKot,1)==1,
		'telefon'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegTelefonKot,1)==1,
		'adoszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegadoszamKot,0)==1,
		'cjszam'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegcjszamKot,0)==1,
		'cegbankszla'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegbankszlaKot,0)==1,
		'cegbanknev'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegCegbanknevKot,0)==1,
		'viszontelado'=>$this->dbparams->getParam(siiker_const::$pWEBPartnerRegViszonteladoKot,0)==1);
	}
}
?>