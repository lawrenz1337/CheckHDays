<?php
// For debug
ini_set('display_errors', 1);
ini_set('error_reporting', -1);

/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var CheckHDays $CheckHDays */
$CheckHDays = $modx->getService('checkhdays', 'CheckHDays', $modx->getOption('checkhdays_core_path', null, $modx->getOption('core_path') . 'components/checkhdays/') . 'model/checkhdays/');
$modx->lexicon->load('checkhdays:default');

// handle request
$corePath = $modx->getOption('checkhdays_core_path', null, $modx->getOption('core_path') . 'components/checkhdays/');
$path = $modx->getOption('processorsPath', $CheckHDays->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));