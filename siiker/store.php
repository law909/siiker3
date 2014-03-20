<?php
class siiker_store
{
	private static $db;
	private static $dbparams;
	private static $config;
	private static $setup;
	private static $sitetext;
	private static $specsitetext;
	private static $mainsession;
	private static $usersession;
	private static $themehandler;
	private static $languagehandler;
	private static $layouthandler;
	private static $templateloader;
	private static $user;
	private static $statwriter;

public static function writelog($text) {
 $handle=fopen("log.txt","a");
 $log="";
 $separator=" ## ";
 $log.=date('Y.m.d. H:i:s').$separator;
 $log.=$text;
 $log.="\n";
 fwrite($handle,$log);
 fclose($handle);
}
	/**
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	public static function getDb() {
		if (!isset(self::$db)) {
			self::$db=Zend_Db::factory('Pdo_Mysql',array('host'=>self::getConfig()->db->host,
				'port'=>self::getConfig()->db->port,
				'username'=>self::getConfig()->db->username,
				'password'=>self::getConfig()->db->password,
				'dbname'=>self::getConfig()->db->dbname,
//				'charset'=>'latin1',
				'profiler'=>false));
			self::$db->setFetchMode(Zend_Db::FETCH_ASSOC);
		}
		return self::$db;
	}

	/**
	 *
	 * @return law_dbparameters
	 */
	public static function getDbParams() {
		if (!isset(self::$dbparams)) {
			self::$dbparams=new law_dbparameters(self::getDb());
		}
		return self::$dbparams;
	}

	/**
	 *
	 * @return law_parameters
	 */
	public static function getParams() {
		return law_parameters::singleton();
	}

	/**
	 *
	 * @return Zend_Config_Ini
	 */
	public static function getConfig() {
		if (!isset(self::$config)) {
			self::$config=new Zend_Config_Ini('./config.ini','config');
		}
		return self::$config;
	}

	/**
	 *
	 * @return Zend_Config_Ini
	 */
	public static function getSetup() {
		if (!isset(self::$setup)) {
			self::$setup=new Zend_Config_Ini('./config.ini','setup');
		}
		return self::$setup;
	}

	/**
	 *
	 * @return Zend_Config_Ini
	 */
	public static function getSiteText() {
		if (!isset(self::$sitetext)) {
			self::$sitetext=new Zend_Config_Ini('./'.strtolower(self::getLanguageHandler()->getLanguage()).'.ini','text');
		}
		return self::$sitetext;
	}

	/**
	 *
	 * @return Zend_Config_Ini
	 */
	public static function getSpecSiteText() {
		if (!isset(self::$specsitetext)) {
			self::$specsitetext=new Zend_Config_Ini('./'.strtolower(self::getLanguageHandler()->getLanguage()).'.spec.ini','text');
		}
		return self::$specsitetext;
	}

	/**
	 *
	 * @return Zend_Session_Namespace
	 */
	public static function getMainSession() {
		if (!isset(self::$mainsession)) {
			self::$mainsession=new Zend_Session_Namespace();
		}
		return self::$mainsession;
	}

	/**
	 *
	 * @return Zend_Session_Namespace
	 */
	public static function getUserSession() {
		return self::getMainSession();
/*		if (!isset(self::$usersession)) {
			self::$usersession=new Zend_Session_Namespace('part');
		}
		return self::$usersession;
 */
	}

	/**
	 *
	 * @return law_themehandler
	 */
	public static function getThemeHandler() {
		if (!isset(self::$themehandler)) {
			self::$themehandler=new law_themehandler(self::getMainSession(),self::getConfig()->theme->name);
		}
		return self::$themehandler;
	}

	/**
	 *
	 * @return law_languagehandler
	 */
	public static function getLanguageHandler() {
		if (!isset(self::$languagehandler)) {
			self::$languagehandler=new law_languagehandler(self::getMainSession(),self::getDbParams()->getParam('WEB_DefaNyelv','hu'));
		}
		return self::$languagehandler;
	}

	/**
	 *
	 * @param $tplfilename
	 * @return siiker_templatehandler
	 */
	public static function makeTemplateHandler($tplfilename) {
		return new siiker_templatehandler(self::getConfig()->path->template_c,$tplfilename);
	}

	/**
	 *
	 * @return siiker_templatehandler
	 */
	public static function getLayoutHandler() {
		if (!isset(self::$layouthandler)) {
			self::$layouthandler=self::makeTemplateHandler(self::getConfig()->path->template.'layout.tpl');
		}
		return self::$layouthandler;
	}

	/**
	 *
	 * @return law_templateloader
	 */
	public static function getTemplateLoader() {
		if (!isset(self::$templateloader)) {
			self::$templateloader=new law_templateloader('./templateconfig.ini','setup');
		}
		return self::$templateloader;
	}

	/**
	 *
	 * @return siiker_partner
	 */
	public static function getUser() {
		if (!isset(self::$user)) {
			self::$user=new siiker_partner();
		}
		return self::$user;
	}

	/**
	 *
	 * @param $sessid
	 * @return law_statwriter
	 */
	public static function getStatWriter($sessid) {
		if (!isset(self::$statwriter)) {
			self::$statwriter=new law_statwriter(self::getDb(),$sessid,self::getLanguageHandler()->getLanguage());
		}
		return self::$statwriter;
	}

	public static function milyennap($nap) {
		$milyennapok = array( 'vasarnap/vasárnap', 'hetfo/hétfõ', 'kedd', 'szerda', 'csutortok/csütörtök', 'pentek/péntek', 'szombat' );
		$varazsszavak=array('fergeteges','remek','rettenetes','vacak');
		if (function_exists('current_time')) {
			$napszam=date('w',current_time('timestamp'));
		}
		else {
			$napszam=date('w');
		}
		$elv='/';
		$napnev=trim($nap);
		$milyennap = $elv . $milyennapok[ $napszam ] . $elv;
		if ( function_exists( 'mb_detect_encoding' ) && function_exists( 'mb_strtolower' ) && function_exists( 'mb_convert_encoding' ) && function_exists( 'mb_strpos' ) ) {
			$encoding = mb_detect_encoding( $milyennap );
			$milyennap = mb_strtolower( $milyennap, $encoding );
			$napnev = mb_convert_encoding( $napnev, $encoding, mb_detect_encoding( $napnev ) );
			$napnev = $elv . mb_strtolower( $napnev, $encoding ) . $elv;
			$jo_e = mb_strpos( $milyennap, $napnev, 0, $encoding ) !== false;
		}
		else {
			$napnev = $elv . $napnev . $elv;
			$jo_e = strpos( strtolower( $milyennap ), $napnev ) !== false;
		}
		$jo_e=$jo_e||in_array($napnev,$varazsszavak);
		return $jo_e;
	}
}