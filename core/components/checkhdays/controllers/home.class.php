<?php

/**
 * The home manager controller for CheckHDays.
 *
 */
class CheckHDaysHomeManagerController extends CheckHDaysMainController {
	/* @var CheckHDays $CheckHDays */
	public $CheckHDays;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('checkhdays');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->CheckHDays->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->CheckHDays->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->CheckHDays->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->CheckHDays->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->CheckHDays->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->CheckHDays->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->CheckHDays->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "checkhdays-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->CheckHDays->config['templatesPath'] . 'home.tpl';
	}
}