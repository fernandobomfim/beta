<?php
namespace application\libraries\Dbase;
use \application\models\Dbf_codfix_entity AS Dbf_codfix_entity;

Class Dbase_Codfix extends Dbase {

	public function __construct($_file = NULL, $_mode = 0)
	{
		parent::__construct($_file, $_mode);
	}

	public function getCollection()
	{
		$_collection = array();

		for($a = 1; $a <= $this->_numRecords; $a++) {
			$tempEntity = (object) $this->getRecordWithNames($a);
			$entity = new Dbf_Codfix_Entity;
			$entity->setRegisterIndex($a);
			$entity->hydrate($tempEntity);
			$collection[$a] = $entity;
			unset($entity);
		}

		return $collection;
	}
}