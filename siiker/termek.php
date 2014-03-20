<?php
class siiker_termek extends siiker_dbalapclass {

	private $kod;
	
	public function __construct($kod) {
		parent::__construct();
		$this->kod=$kod;	
	}
}
?>