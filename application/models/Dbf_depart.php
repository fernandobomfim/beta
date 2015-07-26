<?php
use application\libraries\Dbase\Dbase;
use application\libraries\Dbase\Dbase_depart;
use application\models\Dbf_depart_entity;

Class DBF_depart extends CI_Model {

	protected $file;

	public function __construct()
	{
		parent::__construct();

		if (realpath($this->betaconfig->orgBasepath."DEPART.DBF")) {
			$this->file = realpath($this->betaconfig->orgBasepath."DEPART.DBF");
		} else {
			$this->file = realpath($this->betaconfig->orgBasepath."DEPART.dbf");
		}
	}

	public function fetchAll($formated = FALSE)
	{
		$dbase = new Dbase_depart();
		$dbase->setFile($this->file);
		$dbase->open();
		$collection = $dbase->getCollection();

		if ($formated) {
			return $this->fetchAllFormated($collection);
		} else {
			return $collection;
		}
	}

	public function fetchAllFormated($collection)
	{
		$formated = array();
		if ($collection && count($collection)) {
			foreach ($collection as $key => $value) {
				$formated[trim($value->D_CODIGO)] = $value;
			}
		}
		return $formated;
	}
}
