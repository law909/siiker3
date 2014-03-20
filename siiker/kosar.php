<?php
class siiker_kosar extends siiker_dbalapclass {

	public function createSzallitasiKoltseg() {
		$termekkod=siiker_store::getDbParams()->getParam('WEBSzallitasiKoltsegTermek',0)*1;
		if ($termekkod>0) {
			$ingyenosszeg=siiker_store::getDbParams()->getParam('WEBSzallitasiKoltsegIngyenHatar',0)*1;
			$osszesen=$this->getOsszesenWoSzk();
			$db=$this->getDarabWoSzk();
			if ($db==0) {
				$this->getDb()->query('DELETE FROM web_ws_kosar WHERE (termek_kod='.$termekkod.') AND '.
					siiker_store::getUser()->getWhereSQL('user_kod','sessid'));
			}
			else {
				if ($ingyenosszeg>0) {
					if ($osszesen<$ingyenosszeg) {
						if (!$this->isIn($termekkod)) {
							$tc=new siiker_termekcollection();
							$arak=$tc->getAr($termekkod);
							$this->getDb()->query('INSERT INTO web_ws_kosar (user_kod,termek_kod,mennyiseg,nettoegysar,bruttoegysar,'.
								'nettoegysarhuf,bruttoegysarhuf,valutanem,sessid) VALUES '.
								'('.siiker_store::getUser()->getKod().','.$termekkod.',1,'.$arak['nettohuf'].','.$arak['bruttohuf'].','.
								$arak['nettohuf'].','.$arak['bruttohuf'].',0,"'.Zend_Session::getId().'")');
						}
						else {
							$this->getDb()->query('UPDATE web_ws_kosar SET mennyiseg=1 WHERE (termek_kod='.$termekkod.') AND '.
								siiker_store::getUser()->getWhereSQL('user_kod','sessid'));
						}
					}
					else {
						$this->getDb()->query('DELETE FROM web_ws_kosar WHERE (termek_kod='.$termekkod.') AND '.
							siiker_store::getUser()->getWhereSQL('user_kod','sessid'));
					}
				}
				else {
					if (!$this->isIn($termekkod)) {
						$tc=new siiker_termekcollection();
						$arak=$tc->getAr($termekkod);
						$this->getDb()->query('INSERT INTO web_ws_kosar (user_kod,termek_kod,mennyiseg,nettoegysar,bruttoegysar,'.
							'nettoegysarhuf,bruttoegysarhuf,valutanem,sessid) VALUES '.
							'('.siiker_store::getUser()->getKod().','.$termekkod.',1,'.$arak['nettohuf'].','.$arak['bruttohuf'].','.
							$arak['nettohuf'].','.$arak['bruttohuf'].',0,"'.Zend_Session::getId().'")');
					}
					else {
						$this->getDb()->query('UPDATE web_ws_kosar SET mennyiseg=1 WHERE (termek_kod='.$termekkod.') AND '.
							siiker_store::getUser()->getWhereSQL('user_kod','sessid'));
					}
				}
			}
		}
	}

	public function addTo($termekkod) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		if (!$this->isIn($termekkod)) {
			$termek=new siiker_termekcollection();
			$arak=$termek->getAr($termekkod);
			$this->getDb()->query('INSERT INTO web_ws_kosar (user_kod,termek_kod,mennyiseg,nettoegysar,bruttoegysar,'.
				'nettoegysarhuf,bruttoegysarhuf,valutanem,sessid) VALUES '.
				'('.siiker_store::getUser()->getKod().','.$termekkod.',1,'.$arak['nettohuf'].','.$arak['bruttohuf'].','.
				$arak['nettohuf'].','.$arak['bruttohuf'].',0,"'.Zend_Session::getId().'")');
		}
		else {
			$this->getDb()->query('UPDATE web_ws_kosar SET mennyiseg=mennyiseg+1 WHERE (termek_kod='.$termekkod.') AND '.
				siiker_store::getUser()->getWhereSQL('user_kod','sessid'));
		}
		$this->createSzallitasiKoltseg();
	}

	public function removeFrom($termekkod) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		$this->getDb()->query('DELETE FROM web_ws_kosar WHERE '.$where.' AND (termek_kod='.$termekkod.')');
		$this->createSzallitasiKoltseg();
	}

	public function changeQty($termekkod,$mennyiseg) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		if (!is_numeric($mennyiseg)) {
			return null;
		}
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		$rec=$this->getDb()->query('UPDATE web_ws_kosar SET mennyiseg='.$mennyiseg.' WHERE '.$where.' AND (termek_kod='.$termekkod.')');
		$this->createSzallitasiKoltseg();
	}

	private function getFizmodok() {
		return $this->getDb()->fetchAll('SELECT kod,nev FROM fizmod WHERE webes=1 ORDER BY nev');
	}

	public function getSPREInkasszo($megrkod) {
		$rec=$this->getDb()->fetchRow('SELECT p.cegnev,p.cegbanknev,p.cegbankszla,m.cegbanktelepules '.
			'FROM web_ws_megrendeles m '.
			'INNER JOIN partner p ON (m.user_kod=p.kod) '.
			'WHERE (m.kod='.$megrkod.')');
		$result=array('cegbanknev'=>$rec['cegnev'],
			'cegbanktelepules'=>$rec['cegbanktelepules'],
			'cegbanknev'=>$rec['cegbanknev'],
			'cegnev'=>$rec['cegnev'],
			'bankszamlaszam'=>$rec['cegbankszla'],
			'aktdatum'=>date('Y.m.d'),
			'aktev'=>date('Y'));
		return $result;
	}

	public function getCartAdatBekero() {
		$user=siiker_store::getUser();
		$result=array('szam_nev'=>($user->cegnev?$user->cegnev:$user->nev),
			'szam_irszam'=>$user->irszam,
			'szam_varos'=>$user->varos,
			'szam_utca'=>$user->utca,
            'szam_adoszam'=>$user->adoszam,
			'szal_nev'=>($user->cegnev?$user->cegnev:$user->nev),
			'szal_irszam'=>$user->irszam,
			'szal_varos'=>$user->varos,
			'szal_utca'=>$user->utca,
			'fizmodok'=>$this->getFizmodok());
		return $result;
	}

	public function submitCart($params) {
		$megrkod=0;
		$user=siiker_store::getUser();
		$termek=new siiker_termekcollection();
		if ($user->getLoggedIn()) {
			$where='(user_kod='.$user->getKod().')';
			siiker_store::getDb()->query('INSERT INTO web_ws_megrendeles ('.
				'user_kod,'.
				'mikor,'.
				'szam_irszam,'.
				'szam_varos,'.
				'szam_utca,'.
				'szal_irszam,'.
				'szal_varos,'.
				'szal_utca,'.
				'valid,'.
				'szal_cegnev,'.
				'szam_cegnev,'.
                'szam_adoszam,'.
				'statuskod,'.
				'lemondva,'.
				'valuta_kod,'.
				'igenyelt_hatarido,'.
				'fizmod_kod,'.
				'idegenvaluta_kod,'.
				'bankkartyaszam,'.
				'bankkartyabiztkod,'.
				'cegbanktelepules) VALUES ('.
				$user->getKod().
				',NOW(),'.
				'"'.$params->getParam('szam_irszam','').'",'.
				'"'.$params->getParam('szam_varos','').'",'.
				'"'.$params->getParam('szam_utca','').'",'.
				'"'.$params->getParam('szal_irszam','').'",'.
				'"'.$params->getParam('szal_varos','').'",'.
				'"'.$params->getParam('szal_utca','').'",'.
				'1,'.
				'"'.$params->getParam('szal_nev','').'",'.
				'"'.$params->getParam('szam_nev','').'",'.
                '"'.$params->getParam('szam_adoszam','').'",'.
				'1,'.
				'0,'.
				'NULL,'.
				'NULL,'.
				($params->getParam('fizmod','')?$params->getParam('fizmod',''):1).','.
				'NULL,'.
				'"'.$params->getParam('kartyaszam1','').$params->getParam('kartyaszam2','').$params->getParam('kartyaszam3','').$params->getParam('kartyaszam4','').'",'.
				'"'.$params->getParam('kartyabiztkod','').'",'.
				'"'.$params->getParam('banktelepules','').'")');
			$rec=siiker_store::getDb()->fetchRow('SELECT LAST_INSERT_ID() AS db');
			$megrkod=$rec['db'];
			$rec=siiker_store::getDb()->fetchAll('SELECT * FROM web_ws_kosar WHERE '.$where);
			foreach ($rec as $sor) {
				siiker_store::getDb()->query('INSERT INTO web_ws_megrendeltek ('.
	   				'megrendeles_kod,'.
					'termek_kod,'.
					'mennyiseg,'.
					'ar,'.//bruttoegysarhuf
					'megjegyzes,'.
					'sorosszeg,'.//bruttohuf
					'me,'.
					'lemondva,'.
					'statuskod,'.
					'valuta_kod,'.
					'nettoar,'.//nettoegysarhuf
					'v_ar,'.//bruttoegysar
					'v_nettoar,'.//nettoegysar
					'idegenvaluta_kod,'.
					'nettosorosszeg,'.//nettohuf
					'v_sorosszeg,'.//brutto
					'v_nettosorosszeg) VALUES ('.//netto
					$megrkod.','.
					$sor['termek_kod'].','.
					($sor['mennyiseg']*1).','.
					($sor['bruttoegysarhuf']*1).','.
					'"",'.
					($sor['mennyiseg']*$sor['bruttoegysarhuf']*1).','.
					'"'.$sor['me'].'",'.
					'0,'.
					'1,'.
					'1,'.//valuta
					($sor['nettoegysarhuf']*1).','.
					($sor['bruttoegysar']*1).','.
					($sor['nettoegysar']*1).','.
					'0,'.
					($sor['mennyiseg']*$sor['nettoegysarhuf']*1).','.
					($sor['mennyiseg']*$sor['bruttoegysar']*1).','.
					($sor['mennyiseg']*$sor['nettoegysar']*1).')');
				$termek->setTermekStat($sor['termek_kod'],'kosarbateve');
			}
		}
		return $megrkod;
	}

	public function clear() {
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
			siiker_store::getDb()->query('DELETE FROM web_ws_kosar WHERE '.$where);
		}
	}
	public function getTermekLista() {
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(k.user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(k.sessid="'.Zend_Session::getId().'")';
		}
		$rec=$this->getDb()->fetchAll('SELECT t.kod,t.cikkszam,tn.nev,tn.nev2,tn.nev3,tn.nev4,tn.nev5, '.
			'tf.logoext,tf.publikus,t.permalink,t.me,t.gyujto,tf.kod AS tfkod,tf.filenev AS tffilenev, '.
			'k.mennyiseg,k.nettoegysar,k.bruttoegysar,k.nettoegysarhuf,k.bruttoegysarhuf, '.
			'k.mennyiseg*k.nettoegysarhuf AS nettohuf,'.
			'k.mennyiseg*k.bruttoegysarhuf AS bruttohuf,'.
			'k.mennyiseg*k.nettoegysar AS netto,'.
			'k.mennyiseg*k.bruttoegysar AS brutto '.
			'FROM web_ws_kosar k '.
			'INNER JOIN termek t ON (k.termek_kod=t.kod) '.
			'INNER JOIN termeknev tn ON (k.termek_kod=tn.termek) AND (tn.nyelv="'.$this->nyelv.'") '.
			'LEFT OUTER JOIN keszletjelolo kj ON (t.keszletjelolo=kj.kod) '.
			'LEFT OUTER JOIN termek_files tf ON (k.termek_kod=tf.termek) AND (tf.tipus=1) AND (tf.publikus=1)'.
			'WHERE '.$where);
		return $rec;
	}

	public function getOsszesen() {
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		$rec=$this->getDb()->fetchRow('SELECT SUM(mennyiseg*nettoegysar) AS nettoar,SUM(mennyiseg*bruttoegysar) AS bruttoar,'.
			'SUM(mennyiseg*nettoegysarhuf) AS nettoarhuf,SUM(mennyiseg*bruttoegysarhuf) AS bruttoarhuf '.
			'FROM web_ws_kosar '.
			'WHERE '.$where);
		return $rec;
	}

	private function getOsszesenWoSzk() {
		$szall=siiker_store::getDbParams()->getParam('WEBSzallitasiKoltsegTermek',0)*1;
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		if ($szall!=0) {
			$where.=' AND (termek_kod<>'.$szall.')';
		}
		$rec=$this->getDb()->fetchRow('SELECT SUM(mennyiseg*bruttoegysarhuf) AS bruttoarhuf '.
			'FROM web_ws_kosar '.
			'WHERE '.$where);
		return $rec['bruttoarhuf'];
	}

	private function getDarabWoSzk() {
		$szall=siiker_store::getDbParams()->getParam('WEBSzallitasiKoltsegTermek',0)*1;
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		if ($szall!=0) {
			$where.=' AND (termek_kod<>'.$szall.')';
		}
		$rec=$this->getDb()->fetchRow('SELECT COUNT(*) AS db '.
			'FROM web_ws_kosar '.
			'WHERE '.$where);
		return $rec['db'];
	}

	private function isIn($termekkod) {
		if (!is_numeric($termekkod)) {
			return null;
		}
		if (siiker_store::getUser()->getLoggedIn()) {
			$where='(user_kod='.siiker_store::getUser()->getKod().')';
		}
		else {
			$where='(sessid="'.Zend_Session::getId().'")';
		}
		$rec=$this->getDb()->fetchRow('SELECT COUNT(*) AS db FROM web_ws_kosar WHERE '.$where.' AND (termek_kod='.$termekkod.')');
		return $rec['db']>0;
	}

	public function getFizmodType($fm) {
		$rec=$this->getDb()->fetchRow('SELECT kod,tipus FROM fizmod WHERE kod='.$fm);
		if ($rec) {
			return $rec['tipus'];
		}
		return false;
	}
}
?>