<?php
class siiker_reklam extends siiker_modul {

	public function __construct() {
		parent::__construct(siiker_const::$pWEBBannerLatszik);
	}

	public function getData() {
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$rec=$this->getDb()->fetchAll('SELECT kod,nev,link,alt,logoext '.
				'FROM web_banners '.
				'WHERE (deleted=0) AND (datumtol<=NOW()) AND (datumig>=NOW())'.
				'ORDER BY RAND()');
			$lista=array();
			foreach($rec as $sor)
			{
				$filenev=siiker_store::getConfig()->path->files.'banner'.str_pad($sor['kod'],10,'0',STR_PAD_LEFT).$sor['logoext'];
				$lista[]=array(
					'caption'=>$sor['nev'],
					'imageuri'=>$filenev,
					'linkuri'=>substr($sor['link'],0,7)=='http://'?$sor['link']:'http://'.$sor['link'],
					'alt'=>$sor['alt'],
					'tag'=>law_mime::getMimeTag($sor['logoext']));
			}
			$result['reklamlist']=$lista;
		}
		return $result;
	}
}
?>