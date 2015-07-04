<?php
namespace application\libraries\Dbase;
use \application\models\Dbf_movger_entity AS Dbf_movger_entity;

Class Dbase_movger extends Dbase {

	public function __construct($_file = NULL, $_mode = 0)
	{
		parent::__construct($_file, $_mode);
	}

	public function getCollection()
	{
		$_collection = array();

		for($a = 1; $a <= $this->_numRecords; $a++) {
			$tempEntity = (object) $this->getRecordWithNames($a);
			$entity = new Dbf_movger_entity;
			$entity->setRegisterIndex($a);
			$entity->hydrate($tempEntity);
			$_collection[$a] = $entity;
			unset($entity);
		}

		return $_collection;
	}
}