<?php
class siiker_dimenzio extends siiker_dbalapclass {

	protected function getDimData($kat,$selkod,$tf) {
		$dstr='';
		if ($tf!='') {
			$t=$this->getDb()->fetchAll('SELECT DISTINCT dim'.$kat.' AS d FROM termek WHERE kod IN ('.$tf.')');
			$d=array();
			foreach($t as $sor) {
				if ($sor['d']) {
					$d[]=$sor['d'];
				}
			}
			if (implode(',',$d)!='') {
				$dstr=' AND (kod IN ('.implode(',',$d).')) ';
			}
		}
		$r=$this->getDb()->fetchAll('SELECT * FROM dimenzioertek WHERE (kat='.$kat.') AND (tip="termek")'.$dstr.' ORDER BY nev');
		$result=array();
		foreach ($r as $sor) {
			$result[]=array('kod'=>$sor['kod'],'nev'=>$sor['nev'],'selected'=>$selkod==$sor['kod']);
		}
		return $result;
	}

	public function getDimNev($kat) {
		$r=$this->getDb()->fetchAll('SELECT ertek FROM parameterek WHERE par="TermekDim'.$kat.'Nev"');
		return $r[0]['ertek'];
	}

	public function getAll($filter,$termekfilter) {
		$termekszuro=implode(',', $termekfilter);
		$r=array();
		$r['caption1']=$this->getDimNev(1);
		$r['dim1']=$this->getDimData(1,$filter['dim1'],$termekszuro);
		$r['length1']=count($r['dim1']);
		$r['caption2']=$this->getDimNev(2);
		$r['dim2']=$this->getDimData(2,$filter['dim2'],$termekszuro);
		$r['length2']=count($r['dim2']);
		$r['caption3']=$this->getDimNev(3);
		$r['dim3']=$this->getDimData(3,$filter['dim3'],$termekszuro);
		$r['length3']=count($r['dim3']);
		$r['caption4']=$this->getDimNev(4);
		$r['dim4']=$this->getDimData(4,$filter['dim4'],$termekszuro);
		$r['length4']=count($r['dim4']);
		$r['caption5']=$this->getDimNev(5);
		$r['dim5']=$this->getDimData(5,$filter['dim5'],$termekszuro);
		$r['length5']=count($r['dim5']);
		return $r;
	}
}