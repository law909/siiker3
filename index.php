<?php
require_once('Zend/Loader/Autoloader.php');
//Zend_Loader::registerAutoload();
$zendloader=Zend_Loader_Autoloader::getInstance();
$zendloader->registerNamespace('law_');
$zendloader->registerNamespace('siiker_');
$dwoopath=siiker_store::getConfig()->path->dwoo;
require_once($dwoopath.'dwooAutoload.php');
if (siiker_store::getConfig()->developer) {
	include_once('fb.php');
//	fb('ez a firebug consolera megy');
}
$config=siiker_store::getConfig();
$params=siiker_store::getParams();
$dbparams=siiker_store::getDbParams();
$mainsession=siiker_store::getMainSession();
$themehandler=siiker_store::getThemeHandler();
$tplloader=siiker_store::getTemplateLoader();
$layouthandler=siiker_store::getLayoutHandler();
$user=siiker_store::getUser();

$command=$params->getParam('com','');
if ($command=='') {
	$command=$params->getParam('c',siiker_command::$Home);
}

$kep=$params->getParam('kep','nincsis');
if ($kep<>'nincsis') {
	$command=siiker_command::$KepConvert;
}

$print_output=true;

if (($config->nagykorucheck)&&(!siiker_store::getUserSession()->nagykoru)&&($command!==siiker_command::$SetNagykoru)) {
	$command=siiker_command::$NagykoruCheck;
}
if ($dbparams->getParam(siiker_const::$pWEBKikapcsolva,0)==1) {
	$command=siiker_command::$Off;
}
$user->AutoLogout();
$user->setLastClickTime();
siiker_store::getStatWriter(Zend_Session::getId())->beir();

switch ($command) {
	case siiker_command::$SPRCalcUpload:
		$spruploader=new siiker_spr_calcupload();
		$print_output=false;
		if ($spruploader->LoadData($params->getParam('adat',''))) {
			echo 'OK';
		}
		else {
			echo 'ERROR';
		}
		break;
	case siiker_command::$DownloadFile:
		if ($user->getLoggedIn()) {
			$print_output=false;
			$down=new siiker_downloader($params->getParam('par',''),$params->getParam('par2',''));
			$file=$down->getFileName();
			if (file_exists($config->path->files.$file['realfilenev'])) {
				header('Content-Type: '.$file['mimetype']);
				header('Content-Disposition: attachment; filename='.$file['filenev']);
				header('Cache-Control: public');
				header('Expires: 0');
				header('Content-transfer-encoding: Binary');
//				header("Content-length: " .(int)($site_db->data["filesize"]));
				readfile($config->path->files.$file['realfilenev']);
			}
			$homemail=new Zend_Mail();
			$homemail->setBodyHtml($file['filenev'].' ('.$file['realfilenev'].')');
			$homemail->setSubject($user->nev.' - '.$user->cegnev.' - dokumentumot t?lt?tt le');
			$homemail->setFrom(siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'info'));
			$cimek=explode(',',siiker_store::getDbParams()->getParam(siiker_const::$pWEBLoginErtesitesEmail,siiker_store::getDbParams()->getParam(siiker_const::$pWEBinfoemail,'')));
			foreach($cimek as $cim) {
				$homemail->addTo($cim);
			}
			if (!siiker_store::getConfig()->developer) {
				$homemail->send();
			}
		}
		break;
	case siiker_command::$JAXCheckUniqueUsername:
		$print_output=false;
		echo $user->JAXcheckUniqueUsername($params->getParam('username',''));
		break;
	case siiker_command::$JAXCheckUniqueEmail:
		$print_output=false;
		echo $user->JAXcheckUniqueEmail($params->getParam('email',''));
		break;
	case siiker_command::$JAXGetVasfeltMsg:
		$print_output=false;
		echo mb_convert_encoding(siiker_store::getSiteText()->partner->vasfelthianyzik,'UTF-8','ISO-8859-1');
		break;
	case siiker_command::$Off:
		$print_output=false;
		Header('Location: off.html');
		break;
	case siiker_command::$ChangeLanguage:
		$print_output=false;
		siiker_store::getLanguageHandler()->setLanguage(
			$params->getParam('par',$dbparams->getParam(siiker_const::$pWEBDefaNyelv,'hu')));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$Accessibility:
		$print_output=false;
		$themehandler->setTheme(siiker_command::$Accessibility);
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$ChangeTheme:
		$print_output=false;
		$themehandler->setTheme($params->getParam('par',''));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$JAXLogin:
		$print_output=false;
		if ($user->Login($params->getParam('user_login_nev',''),$params->getParam('user_login_jelszo',''))) {
			$res=array('loggedin'=>true,
				'showmessage'=>$dbparams->getParam(siiker_const::$pWEBLoginOKMsgShow,0)<>0,
				'message'=>mb_convert_encoding(siiker_store::getSiteText()->partner->loginokmsg,'UTF-8','ISO-8859-1'));
			$user->sendLoginMail();
			$user->setLastClickTime();
		}
		else {
			$res=array('loggedin'=>false,
				'showmessage'=>true,
				'message'=>mb_convert_encoding(siiker_store::getSiteText()->partner->loginerrormsg,'UTF-8','ISO-8859-1'));
		}
		$json=Zend_Json::encode($res);
		Header('Content-Type: application/json');
		echo $json;
		break;
	case siiker_command::$Login:
		$print_output=false;
		if ($user->Login($params->getParam('user_login_nev',''),$params->getParam('user_login_jelszo',''))) {
			$user->sendLoginMail();
		}
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$Logout:
		$print_output=false;
		$user->Logout();
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$JAXKedvencAdd:
		$print_output=false;
		$kedvenc=new siiker_kedvencek();
		$kedvenc->addTo($params->getParam('par',0));
		Header('Content-Type: application/json');
		echo Zend_Json::encode(array('message'=>mb_convert_encoding(siiker_store::getSiteText()->kedvencek->addmsg,'UTF-8','ISO-8859-1')));
		break;
	case siiker_command::$KedvencAdd:
		$print_output=false;
		$kedvenc=new siiker_kedvencek();
		$kedvenc->addTo($params->getParam('par',0));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$KedvencDel:
		$print_output=false;
		$kedvenc=new siiker_kedvencek();
		$kedvenc->removeFrom($params->getParam('par',0));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$Kosar:
		$kosarhandler=new siiker_kosarhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($kosarhandler->getKosarTermekLista());
		break;
	case siiker_command::$KosarChange:
		$print_output=false;
		$kosar=new siiker_kosar();
		$kosar->changeQty($params->getParam('par',0),$params->getParam('mennyiseg',1));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$KosarAdatBe:
		$kosarhandler=new siiker_kosarhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($kosarhandler->getKosarAdatBekero());
		break;
	case siiker_command::$KosarSubmit:
		if ($params->getParam('elfogadva',false)=='on') {
			$kosar=new siiker_kosar();
			$megrkod=$kosar->submitCart($params);
			$kosaremail=new siiker_kosarhandler('email_vasarlas.tpl');
			$kosaremail->sendSubmitEmail($megrkod);
			$kosar->clear();
			if ($params->getParam('fizmod',-1)==$dbparams->getParam(siiker_const::$pWEBEInkasszoFizmod)) {
				$kosarhnd=new siiker_kosarhandler('spr_kosarinkasszoend.tpl');
				$layouthandler->assignMaindata($kosarhnd->getSPRKosarInkasszoRequest($megrkod));
			}
			else {
				$kosarhnd=new siiker_kosarhandler($tplloader->getTemplateName($command));
				$layouthandler->assignMaindata($kosarhnd->getKosarEnd());
			}
		}
		break;
	case siiker_command::$KosarSubmitSzerz:
		$kosar=new siiker_kosar();
		$megrkod=$kosar->submitCart($params);
		$kosaremail=new siiker_kosarhandler('email_vasarlas.tpl');
		$kosaremail->sendSubmitEmail($megrkod);
		$kosar->clear();
		$kosarhnd=new siiker_kosarhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($kosarhnd->getKosarEndSzerz($megrkod));
		break;
	case siiker_command::$KosarSzerzodesLetolt:
		$print_output=false;
		$szerz=new siiker_szerzodes();
		$tomb=$szerz->getData($params->getParam('par',0));
		Dwoo_Compiler::compilerFactory()->setDelimiters('[',']');
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		foreach ($tomb as $kulcs=>$ertek) {
			$oldalkozep->assignData($kulcs,$ertek);
		}
		echo $oldalkozep->getTemplateResult();
		break;
	case siiker_command::$JAXKosarAdd:
		$print_output=false;
		$kosar=new siiker_kosar();
		$kosar->addTo($params->getParam('par',0));
		Header('Content-Type: application/json');
		echo Zend_Json::encode(array('message'=>mb_convert_encoding(siiker_store::getSiteText()->kosar->addmsg,'UTF-8','ISO-8859-1')));
		break;
	case siiker_command::$KosarAdd:
		$print_output=false;
		$kosar=new siiker_kosar();
		$kosar->addTo($params->getParam('par',0));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$KosarDel:
		$print_output=false;
		$kosar=new siiker_kosar();
		$kosar->removeFrom($params->getParam('par',0));
		Header('Location: '.$mainsession->prevuri);
		break;
	case siiker_command::$JAXCreditCardCheck:
		$print_output=false;
		$set=siiker_store::getSetup();
		if ($set->kellbankkartya) {
			if ($params->getParam('par2','')==$dbparams->getParam(siiker_const::$pWEBKartyasFizmod,'3')) {
				$ccheck=new law_creditcard($params->getParam('par',''));
				$ok=$ccheck->checkValidity();
			}
			else {
				$ok=true;
			}
		}
		else {
			$ok=true;
		}
		Header('Content-Type: application/json');
		if ($ok) {
			$kosar=new siiker_kosar();
			echo Zend_Json::encode(array('ok'=>true,'fizmodtipus'=>$kosar->getFizmodType($params->getParam('par2',''))));
		}
		else {
			echo Zend_Json::encode(array('ok'=>false,'message'=>mb_convert_encoding(siiker_store::getSiteText()->kosar->creditcardinvalid,'UTF-8','ISO-8859-1')));
		}
		break;
	case siiker_command::$PartnerMod:
	case siiker_command::$PartnerReg:
		$tomb=$user->getData();
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		$oldalkozep->assignData('partner_adatlap',$tomb);
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$PartnerModOK:
	case siiker_command::$PartnerRegOK:
        $sikerult = 'OK';
		if (siiker_store::milyennap(siiker_store::getParams()->getParam('milyennap',''))) {
			$sikerult=$user->Register($params);
		}
        else {
            $sikerult = 'Nem ilyen nap van.';
        }
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
        if ($sikerult!=='OK') {
            $oldalkozep->assignData('szoveg', $sikerult);
        }
        else {
            $oldalkozep->assignData('szoveg', false);
        }
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$PartnerRegAct:
		$user->Validate($params->getParam('par',''));
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$KepConvert:
		$print_output=false;
		$kepkonverter=new siiker_kepkonverter($dbparams);
		$kepkonverter->kepConvert();
		echo 'Pictures converted.';
		break;
	case siiker_command::$Home:
		$hirminilista=new siiker_hir();
		$fotartalom=new siiker_fooldal();
		$termekajanlo=new siiker_termekajanlo();
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		$oldalkozep->assignData('hirek',$hirminilista->getMiniListData());
		$oldalkozep->assignData('fooldalszoveg',$fotartalom->getData());
		$oldalkozep->assignData('termekek',$termekajanlo->getData());
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$ShowLinktar:
		$linktar=new siiker_linktar();
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		$oldalkozep->assignData('linkcsoportlista',$linktar->getData());
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$ShowMenupont:
		$menuhandler=new siiker_menuhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($menuhandler->getProcessedMenu($params->getParam('par',0)));
		break;
	case siiker_command::$ShowHir:
		$hirhandler=new siiker_hirhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($hirhandler->getProcessedHir($params->getParam('par',0)));
		break;
	case siiker_command::$ShowHirLista:
		$hirhandler=new siiker_hirhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($hirhandler->getProcessedHirLista($params->getParam('par',1)));
		break;
	case siiker_command::$ShowTermek:
		$termekhandler=new siiker_termekhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($termekhandler->getProcessedTermeklap($params->getParam('par',0)));
		$layouthandler->assignData('fejadat',$termekhandler->getFejadat());
		break;
	case siiker_command::$ShowTermekLista:
		$termekhandler=new siiker_termekhandler($tplloader->getTemplateName($command));
		$d=array();
		$d['dim1']=$params->getParam('dim1',0);
		$d['dim2']=$params->getParam('dim2',0);
		$d['dim3']=$params->getParam('dim3',0);
		$d['dim4']=$params->getParam('dim4',0);
		$d['dim5']=$params->getParam('dim5',0);
		$layouthandler->assignMaindata($termekhandler->getProcessedTermekLista($params->getParam('par',0),$params->getParam('par2',1),$d));
		break;
	case siiker_command::$ShowTema:
		$temakorhandler=new siiker_temakorhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMainData($temakorhandler->getProcessedTemakorBejegyzes($params->getParam('par',0)));
		break;
	case siiker_command::$ShowTemaLista:
		$temakorhandler=new siiker_temakorhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMainData($temakorhandler->getProcessedTemakorBejegyzesLista($params->getParam('par',0),$params->getParam('par2',1)));
		break;
	case siiker_command::$Kedvencek:
		$termekhandler=new siiker_termekhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($termekhandler->getProcessedKedvencTermekLista($params->getParam('par',1)));
		break;
	case siiker_command::$QuickSearch:
		$termekhandler=new siiker_termekhandler($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($termekhandler->getProcessedKeresettLista($params->getParam('par',''),$params->getParam('par2',1)));
		break;
	case siiker_command::$ShowTema:
		break;
	case siiker_command::$ShowTemaLista:
		break;
	case siiker_command::$SPRCalculate:
		$termekhandler=new siiker_termekhandler($tplloader->getTemplateName($command));
		$calcdata=array('kod'=>$params->getParam('par',''),
			'ertek'=>$params->getParam('spr_kalkulacio_ertek',''),
			'arfolyam'=>$params->getParam('spr_kalkulacio_arfolyam','1'));
		$layouthandler->assignMaindata($termekhandler->getProcessedSPRKalk($params->getParam('par',0),$calcdata));
		break;
	case siiker_command::$SPRDokumentumok:
		$userdocs=new siiker_partnerdocuments($user);
		$tomb=$userdocs->getDocuments();
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		$oldalkozep->assignData('partner_dokumentum',$tomb);
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$SPRSzerzodesKivonat:
		$print_output=false;
		$sprcalc=new siiker_spr_calculator();
		$tomb=$sprcalc->getSzerzodesKivonatData($params->getParam('par',0));
		Dwoo_Compiler::compilerFactory()->setDelimiters('[',']');
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		foreach ($tomb as $kulcs=>$ertek) {
			$oldalkozep->assignData($kulcs,$ertek);
		}
		echo $oldalkozep->getTemplateResult();
		break;
	case siiker_command::$SPRAjanlatKeres:
		$sprcalc=new siiker_spr_calculator();
		$sprcalc->sendAjanlatKeres($params->getParam('par',0));
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($oldalkozep->getTemplateResult());
		break;
	case siiker_command::$SPRKosarInkasszo:
		$print_output=false;
		$kosar=new siiker_kosar();
		$tomb=$kosar->getSPREInkasszo($params->getParam('par',0));
		Dwoo_Compiler::compilerFactory()->setDelimiters('[',']');
		$oldalkozep=new siiker_funkcio($tplloader->getTemplateName($command));
		foreach ($tomb as $kulcs=>$ertek) {
			$oldalkozep->assignData($kulcs,$ertek);
		}
		echo $oldalkozep->getTemplateResult();
		break;
	case siiker_command::$HozzaszolasSave:
		$termekhandler=new siiker_termekhandler($tplloader->getTemplateName(siiker_command::$ShowTermek));
		if (siiker_store::milyennap($params->getParam('milyennap',''))) {
			$termekhandler->saveComment($params->getParam('termek',0),$params->getParam('nick',''),$params->getParam('szoveg',''),$params->getParam('email',''));
		}
		$layouthandler->assignMaindata($termekhandler->getProcessedTermeklap($params->getParam('termek',0)));
		break;
	case siiker_command::$NagykoruCheck:
//		$kosarhnd=new siiker_kosarhandler($tplloader->getTemplateName($command));
		$tplhandler=siiker_store::makeTemplateHandler(siiker_store::getConfig()->path->template.$tplloader->getTemplateName($command));
		$layouthandler->assignMaindata($tplhandler->getTemplateResult());
		break;
	case siiker_command::$SetNagykoru:
		$print_output=false;
		siiker_store::getUserSession()->nagykoru=true;
		Header('Location: /');
		break;
}
if ($print_output) {

	$nevt=array();
	if (($handle = fopen("nevnap.txt", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if ($data[0]==date('m.d')) {
				$nevt[]=$data[1];
			}
		}
    }
    fclose($handle);

	$layouthandler->assignData('nevnap',implode(', ',$nevt));
	$layouthandler->assignData('datum',date('Y.m.d'));
	$layouthandler->assignData('setup',siiker_store::getSetup());
	$layouthandler->assignData('spectext',siiker_store::getSpecSiteText());
	$layouthandler->assignData('text',siiker_store::getSiteText());
	$layouthandler->assignData('theme',$themehandler->getTheme());
	$layouthandler->assignData('nyelv',siiker_store::getLanguageHandler()->getLanguage());
	$layouthandler->assignData('googleanalytics',$dbparams->getParamBlob(siiker_const::$pWEBGoogleAnalytics));

	$layouthandler->assignData('gyorskeresocmd',siiker_command::$QuickSearch);

	$layouthandler->assignData('login',$user->getLoginData());
	$layouthandler->assignData('loggedin',$user->getLoggedIn());

	$t=new siiker_legujabbtermek();
	$layouthandler->assignData('legujabbtermekek',$t->getData());

	$t=new siiker_legnezettebbtermek();
	$layouthandler->assignData('legnezettebbtermekek',$t->getData());

	$t=new siiker_legtobbszorrendelttermek();
	$layouthandler->assignData('legtobbszorrendelttermekek',$t->getData());

	$t=new siiker_leggyakoribbkeresoszo();
	$layouthandler->assignData('leggyakoribbkeresoszo',$t->getData());

	$t=new siiker_menu();
	$layouthandler->assignData('menu1pontok',$t->getMenu1());
	$layouthandler->assignData('menu2pontok',$t->getMenu2());
	$layouthandler->assignData('menu3pontok',$t->getMenu3());
	$layouthandler->assignData('menu4pontok',$t->getMenu4());

	$t=new siiker_referencia();
	$layouthandler->assignData('referenciak',$t->getData());

	$t=new siiker_reklam();
	$layouthandler->assignData('reklamok',$t->getData());

	$t=new siiker_nyelvvalaszto();
	$layouthandler->assignData('nyelvek',$t->getData());

	$t=new siiker_lablec();
	$layouthandler->assignData('lablec',$t->getData());

	$t=new siiker_statdoboz();
	$layouthandler->assignData('statdoboz',$t->getData());

	$t=new siiker_hir();
	$layouthandler->assignData('hirdoboz',$t->getBoxListData());

	$t=new siiker_mnbarfolyam();
	$layouthandler->assignData('arfolyamdoboz',$t->getData());

	if (isset($config->imageroller->path)&&($config->imageroller->path)) {
		$t=new law_imageroller($config->imageroller->path);
		$layouthandler->assignData('imageroller',$t->getImageURIs());
	}

	$mainsession->prevuri=$_SERVER['REQUEST_URI'];

	Header('Content-Type: text/html; charset=iso-8859-2');
	$layouthandler->printTemplateResult();


//	$profiler=siiker_store::getDb()->getProfiler();
//	foreach ($profiler->getQueryProfiles() as $query) {
//		if ($query->getElapsedSecs()>0.000005) {
//			echo $query->getElapsedSecs().'sec<br>';
//			echo $query->getQuery().'<br>';
//			echo '-----------------------------------------------------<br>';
//		}
//	}
}
?>