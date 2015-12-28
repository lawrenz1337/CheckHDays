<?php

/**
 * Class CheckHDaysMainController
 */
abstract class CheckHDaysMainController extends modExtraManagerController {
	/** @var CheckHDays $CheckHDays */
	public $CheckHDays;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('checkhdays_core_path', null, $this->modx->getOption('core_path') . 'components/checkhdays/');
		require_once $corePath . 'model/checkhdays/checkhdays.class.php';

		$this->CheckHDays = new CheckHDays($this->modx);
		//$this->addCss($this->CheckHDays->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->CheckHDays->config['jsUrl'] . 'mgr/checkhdays.js');
		$this->addHtml('
		<script type="text/javascript">
			CheckHDays.config = ' . $this->modx->toJSON($this->CheckHDays->config) . ';
			CheckHDays.config.connector_url = "' . $this->CheckHDays->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('checkhdays:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends CheckHDaysMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}