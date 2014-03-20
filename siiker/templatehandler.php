<?php
class siiker_templatehandler extends law_templatehandler {

	public function assignMainData($data) {
		$this->assignData('maindata',$data);
	}

	public function assignSystemData() {
		$this->assignData('text',siiker_store::getSiteText());
		$this->assignData('spectext',siiker_store::getSpecSiteText());
		$this->assignData('setup',siiker_store::getSetup());
		$this->assignData('lang',siiker_store::getLanguageHandler()->getLanguage());
		$this->assignData('theme',siiker_store::getThemeHandler()->getTheme());
	}
}
?>