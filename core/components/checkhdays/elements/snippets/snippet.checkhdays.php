<?php
/** @var array $scriptProperties */
/** @var CheckHDays $CheckHDays */
if (!$CheckHDays = $modx->getService('checkhdays', 'CheckHDays', $modx->getOption('checkhdays_core_path', null, $modx->getOption('core_path') . 'components/checkhdays/') . 'model/checkhdays/', $scriptProperties)) {
    return 'Could not load CheckHDays class!';
}
$modx->regClientScript('https://code.jquery.com/jquery-2.1.4.min.js');
$modx->regClientScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
$modx->regClientCSS('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
$modx->regClientCSS('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/css/bootstrap-datepicker.css');
$modx->regClientScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js');
$modx->regClientScript('https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js');

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'Item');

// Output
$date = date("Y-m-d");
$extension = '';
if ($object = $modx->getObject('modContentType',array('name'=>'HTML'))){
    $extension = $object->get('file_extensions');
}
$output = $modx->getChunk($tpl, array('Date' => $date, 'Content_type' => $extension));
// By default just return output
return $output;