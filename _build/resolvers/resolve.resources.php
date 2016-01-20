<?php
/*
* Create documents
*/
function createDocs(&$modx, $context_key, $node, $doc = null)
{
    $base_params = array(
        'update' => true,
    );

    /**
     * TODO: убрать апдайт чилд, оставить только апдайт и проверять на существование и апдацт, если существует и стоит запрет на обновление то не обновлять
     */
    if (isset($node['childs'])) {
        $menuIndex = 0;
        foreach ($node['childs'] as $resource => $options) {
            $classKey = 'modResource';
            $keyInName = explode(':', $resource);
            if (isset($keyInName[1])) {
                $classKey = $keyInName[1];
            }

            $menuIndex++;
            $pid = ($doc ? $doc->id : 0);
            $params = array_merge($base_params, $options);
            $params['parent'] = $pid;
            if (!$doc__ = $modx->getObject($classKey,
                $params['parentCheck'] ?
                    array(
                        'context_key' => $context_key,
                        'alias' => $params['alias'],
                    )
                    :
                    array(
                        'context_key' => $context_key,
                        'parent' => $pid,
                        'alias' => $params['alias'],
                    )
            )
            ) {
                $params['menuindex'] = $menuIndex;
                $doc__ = $modx->newObject($classKey);
                $doc__->fromArray($params, '', true, true);
                $doc__->cleanAlias($params['alias']);
                if (!$doc__->save()) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Can not save {$params['pagetitle']} document");
                } else {
                    $modx->log(modX::LOG_LEVEL_INFO, 'Create resource ' . $params['pagetitle'] . '.');
                }
            } else if ($params['update'] === true) {
                $doc__->fromArray($params);
                if (!$doc__->save()) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Can not update {$params['pagetitle']} document");
                } else {
                    $modx->log(modX::LOG_LEVEL_INFO, 'Update resource ' . $params['pagetitle'] . '.');
                }
            }
            if (isset($params['group']) && !empty($params['group'])) {
                $doc__->joinGroup($params['group']);
                $modx->log(modX::LOG_LEVEL_INFO, 'Join resource ' . $params['pagetitle'] . ' to group ' . $params['group'] . '.');
            }

            if (isset($params['tvs']) && !empty($params['tvs']) && $params['update'] === true) {
                foreach ($params['tvs'] as $tvName => $value) {
                    $tv = $modx->getObject('modTemplateVar', array('name' => $tvName));
                    if (empty($tv)) {
                        $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not find TV: ' . $tvName . ' to associate to Templates.');
                        continue;
                    }

                    $templateVarResource = $modx->getObject('modTemplateVarResource', array(
                        'tmplvarid' => $tv->get('id'),
                        'contentid' => $doc__->get('id'),
                    ));
                    if (!$templateVarResource) {
                        $templateVarResource = $modx->newObject('modTemplateVarResource');
                        $templateVarResource->fromArray(array(
                            'tmplvarid' => $tv->get('id'),
                            'contentid' => $doc__->get('id'),
                            'value' => $value,
                        ), '', true, true);

                        if ($templateVarResource->save() == false) {
                            $modx->log(xPDO::LOG_LEVEL_ERROR, 'An unknown error occurred while trying to associate the TV ' . $tvName . ' to the Resource ' . $doc__->get('id'));
                        }
                    }
                }
            }

            createDocs($modx, $context_key, $options, $doc__);
        }
    }
}

/*
 * Content
 */

function getIntro($content)
{
    $intro = substr(strip_tags($content), 0, 200);
    return $intro;
}
//var_dump($object);
if ($object && $object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            /*
             * search templates
             */
            $templateNames = array(
                'ajaxcheckhdays',
            );
            $templateVarPrefix = 'tpl_';
            foreach ($templateNames as $templateName) {
                $varName = $templateVarPrefix . $templateName;
                if (!$$varName = $modx->getObject('modTemplate', array('templatename' => $templateName))) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Could not get Template with name '{$templateName}'");
                    return false;
                }
            }


            /* Content*/


            /*  */
            $resources = array(
                'childs' => array(
                    'ajaxcheckhdays' => array(
                        'template' => $tpl_ajaxcheckhdays->get('id'),
                        'pagetitle' => 'ajaxcheckhdays',
                        'alias' => 'ajaxcheckhdays',
                        'uri' => 'ajaxcheckhdays',
                        'hidemenu' => true,
                        'content' => '[[AjaxCheck]]',
                        'update' => true,
                        'published' => true,
                    ),
                )
            );
            createDocs($modx, 'web', $resources, null);
            $modx->reloadContext('web');
            break;
        case xPDOTransport::ACTION_UPGRADE:
            $modx =& $object->xpdo;
            /*
             * search templates
             */
            $templateNames = array(
                'ajaxcheckhdays',
            );
            $templateVarPrefix = 'tpl_';
            foreach ($templateNames as $templateName) {
                $varName = $templateVarPrefix . $templateName;
                if (!$$varName = $modx->getObject('modTemplate', array('templatename' => $templateName))) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR, "Could not get Template with name '{$templateName}'");
                    return false;
                }
            }


            /* Content*/


            /*  */
            $resources = array(
                'childs' => array(
                    'ajaxcheckhdays' => array(
                        'template' => $tpl_ajaxcheckhdays->get('id'),
                        'pagetitle' => 'ajaxcheckhdays',
                        'alias' => 'ajaxcheckhdays',
                        'uri' => 'ajaxcheckhdays',
                        'hidemenu' => true,
                        'content' => '[[AjaxCheck]]',
                        'update' => true,
                        'published' => true,
                    ),
                )
            );
            createDocs($modx, 'web', $resources, null);
            $modx->reloadContext('web');
            break;
    }
}
return true;