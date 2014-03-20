<?php
/**
 * @package SIIKer3
 * @subpackage Modul
 */
class siiker_leggyakoribbkeresoszo extends siiker_modul
{
	private $elemcount;
	
	public function __construct()
	{
		parent::__construct(siiker_const::$pWEBToplistaKereses);
		$this->elemcount=$this->dbparams->getParam(siiker_const::$pWEBToplistaKeresesLimit,5);
	}
	
	public function	getData()
	{
		$result=array();
		$result['show']=$this->getShow();
		if ($result['show']==true)
		{
			$rec=$this->getDb()->fetchAll('SELECT szo FROM web_szavak WHERE nyelv="'.$this->nyelv.'" ORDER BY db DESC, szo ASC LIMIT '.$this->elemcount);
			$tlist=array();
			foreach ($rec as $sor)
			{
				$szo=$sor['szo'];
				$i=1;
				while ((mb_detect_encoding($szo,'UTF-8, ISO-8859-1, ISO-8859-2')=='UTF-8')&&($i<10))
				{
					$szo=mb_convert_encoding($szo,'ISO-8859-2');
					$i++;
				}
				$tlist[]=array(
					'caption'=>$szo,
					'uri'=>'/index.php?com='.siiker_command::$SearchTermek.'&par='.$szo);
			}	
			$result['szolist']=$tlist;
			$result['elemcount']=$this->elemcount;
		}
		return $result;
	}
}
?>