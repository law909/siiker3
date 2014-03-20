<?php
class siiker_toplista extends siiker_modul {
	
	protected $elemcount;
	
	protected function compileData($rec)
	{
		$result=array();
		$result['show']=$this->getShow();
		foreach ($rec as $sor) {
			$tlist=array(
				'kod'=>$sor['kod'],
				'nev'=>$sor['nev'],
				'uri'=>siiker_tools::getPermalink(siiker_command::$ShowTermek,array('on'=>array('par'=>$sor['permalink']),'off'=>array('par'=>$sor['kod'])),$this->rewriteon),
				'smallimageuri'=>siiker_store::getConfig()->path->files.'termek_files'.str_pad($sor['tfkod'],10,'0',STR_PAD_LEFT).'_m_f'.$sor['logoext']);
			$result['termeklista'][]=array(
				'data'=>$tlist);
		}
		$result['elemcount']=$this->elemcount;
		return $result;
	}
}
?>