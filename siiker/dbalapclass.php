<?php
class siiker_dbalapclass {

	protected $nyelv;
	protected $dbparams;
	protected $sessi;
	protected $params;
	protected $rewriteon;

	public function __construct()
	{
		$this->dbparams=siiker_store::getDbParams();
		$this->params=siiker_store::getParams();
		$this->sessi=siiker_store::getMainSession();
		$this->nyelv=siiker_store::getLanguageHandler()->getLanguage();
		$this->rewriteon=false; //$this->dbparams->getParam(siiker_const::$pWEBApacheRewriter,0);
	}

	/**
	 *
	 * @return Zend_Db_Adapter_Abstract
	 */
	public function getDb() {
		return siiker_store::getDb();
	}

	public function writeLog($text)
	{
		$handle=fopen('sqllog.txt','a');
		$log='';
		$separator=' :: ';
		$log.=date('Y.m.d. H:i:s').$separator;
		$log.=$text;
		$log.="\n";
		fwrite($handle,$log);
		fclose($handle);
	}
}
?>