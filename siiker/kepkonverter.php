<?php
class siiker_kepkonverter
{
	protected $par;
	protected $files;
	protected $extensions=array("jpg","JPG","jpeg","JPEG","png","PNG");
	
	public function __construct($par)
	{
		$this->par=$par;
	}
	
	protected function loadFiles()
	{
		$konyvtar=dir(ltrim(rtrim(siiker_store::getConfig()->path->files,'/'),'/'));
		$this->files=array();
		while ($egyfile=$konyvtar->read())
		{
			$pathparts=pathinfo($egyfile);
			$kitok=in_array($pathparts['extension'],$this->extensions);
			if (($egyfile!='.')&&($egyfile!='..')&&($egyfile!='index.html')&&($kitok)) 
			{
				if (!ereg(siiker_store::getConfig()->kep->nagyutotag,$egyfile))
				{
					$this->files[]=$egyfile;
				}
			}
		}
		$konyvtar->close();
		unset($konyvtar);
	}
	
	public function kepConvert()
	{
		if (!isset($this->files))
		{
			$this->loadFiles();
		}
		foreach ($this->files as $ertek)
		{
			$t=explode(".",$ertek);
			$fn=ltrim(siiker_store::getConfig()->path->files,'/').$ertek;
			$fn1=ltrim(siiker_store::getConfig()->path->files,'/').$t[0].siiker_store::getConfig()->kep->kisutotag.".".$t[1];
			$fn2=ltrim(siiker_store::getConfig()->path->files,'/').$t[0].siiker_store::getConfig()->kep->nagyutotag.".".$t[1];
			$fn3=ltrim(siiker_store::getConfig()->path->files,'/').$t[0].siiker_store::getConfig()->kep->foutotag.".".$t[1];
			$pict=new law_pictures($fn);
			if (!file_exists(ltrim($fn1,'/')))
			{
				$pict->Resample($fn1,$this->par->getParam(siiker_const::$pKisKepMeret,64));
			}
			if (!file_exists(ltrim($fn2,'/')))
			{
				$pict->Resample($fn2,$this->par->getParam(siiker_const::$pNagyKepMeret,640));
			}
			if (!file_exists(ltrim($fn3,'/')))
			{
				$pict->Resample($fn3,$this->par->getParam(siiker_const::$pAlapKepMeret,128));
			}
		}
	}
}
?>