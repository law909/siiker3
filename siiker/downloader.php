<?php
class siiker_downloader extends siiker_dbalapclass {

	protected $tabla;
	protected $realelotag;
	protected $kod;

	public function __construct($mit,$kod) {
		parent::__construct();
		switch ($mit) {
			case 'partnerfiles':
				$this->tabla='partnerfiles';
				$this->realelotag='partner_files';
				break;
		}
		$this->kod=$kod;
	}

	public function getFileName() {
		$rec=$this->getDb()->fetchRow('SELECT * FROM '.$this->tabla.' WHERE kod='.$this->kod);
		return array('filenev'=>$rec['filenev'],
			'realfilenev'=>$this->realelotag.str_pad($this->kod,10,'0',STR_PAD_LEFT).$rec['logoext'],
			'mimetype'=>law_mime::getType($rec['logoext']));
	}
}
?>