<?php
$templates = array();

$tmp = array(
    'ajaxcheckhdays' => array(
        'file' => 'ajaxcheckhdays',
        'description' => 'Technical template for checking holidays',
    ),
);

// Save chunks for setup options

foreach ($tmp as $k => $v) {
    $template = $modx->newObject('modTemplate');
    $template->fromArray(array(
        'id' => 0,
        'templatename' => $k,
        'description' => @$v['description'],
        'content' => '[[*content]]',
        'static' => false,
        'source' => 1,
        'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/templates/'.$v['file'].'.tpl',
    ),'',true,true);
    $templates[] = $template;
}
unset($tmp);
return $templates;