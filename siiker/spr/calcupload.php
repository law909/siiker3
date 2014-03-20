<?php
class siiker_spr_calcupload extends siiker_dbalapclass {
	public function __construct() {
		parent::__construct();
	}

	public function LoadData($data) {
		$result=true;
		$this->getDb()->query('TRUNCATE TABLE spr_kalkulacio');
		$sorok=preg_split('/[\n\r]+/',$data);
		foreach ($sorok as $sor) {
			if ($sor<>'') {
				$ertekek=implode(',',explode(';',$sor));
				$ertekek='"'.str_replace(',','","',$ertekek).'"';
				$sql='INSERT INTO spr_kalkulacio (kod,valuta,arfolyam,futamido,ertekvaluta,ertek,indulovaluta,indulo,szerzkotdij,'.
					'maradvanyertek,havidijvaluta,havidij) VALUES ('.$ertekek.')';
				$this->getDb()->query($sql);
			}
		}
		return $result;
	}
}
?>