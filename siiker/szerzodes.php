<?php
class siiker_szerzodes extends siiker_dbalapclass {

	public function getData($megrkod) {
		$m=new siiker_megrendeles();
		$t=$m->getSum($megrkod);
		$partner=siiker_store::getUser();
		return array(
			'ceg_neve'=>$partner->cegnev,
			'ceg_cime'=>$partner->irszam.' '.$partner->varos.' '.$partner->utca,
			'szemely_neve'=>$partner->nev,
			'kiszamitott_ertek'=>$t['brutto'],
			'akt_datum'=>date('Y.m.d'));
	}
}