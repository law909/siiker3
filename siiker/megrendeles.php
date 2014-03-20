<?php
class siiker_megrendeles extends siiker_dbalapclass {

    public function getFejData($kod) {
        $rec = $this->getDb()->fetchOne('SELECT * FROM web_ws_megrendeles WHERE kod=' . $kod);
        return $rec;
    }

	public function getData($kod) {
		$rec=$this->getDb()->fetchAll('SELECT t.cikkszam,t.nev,t.nev2,t.me,m.mennyiseg,m.nettoar,m.ar AS bruttoar,'.
			'm.nettosorosszeg AS nettoertek,m.sorosszeg AS bruttoertek '.
			'FROM web_ws_megrendeltek m,termek t '.
			'WHERE (m.megrendeles_kod='.$kod.') AND (m.termek_kod=t.kod)');
		return $rec;
	}

	public function getSum($kod) {
		return $this->getDb()->fetchRow('SELECT SUM(nettosorosszeg) AS netto,SUM(sorosszeg) AS brutto FROM web_ws_megrendeltek WHERE megrendeles_kod='.$kod);
	}
}
?>