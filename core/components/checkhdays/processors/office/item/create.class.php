<?php

/**
 * Create an Item
 */
class CheckHDaysOfficeItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'CheckHDaysItem';
	public $classKey = 'CheckHDaysItem';
	public $languageTopics = array('checkhdays');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));
		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('checkhdays_item_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
			$this->modx->error->addField('name', $this->modx->lexicon('checkhdays_item_err_ae'));
		}

		return parent::beforeSet();
	}

}

return 'CheckHDaysOfficeItemCreateProcessor';