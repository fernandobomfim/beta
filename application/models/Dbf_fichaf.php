<?php
use application\libraries\Dbase\Dbase;

Class DBF_fichaf extends CI_Model {

	protected $file;

	public function __construct()
	{
		parent::__construct();

		if (realpath($this->betaconfig->orgBasepath."FICHAF.DBF")) {
			$this->file = realpath($this->betaconfig->orgBasepath."FICHAF.DBF");
		} else {
			$this->file = realpath($this->betaconfig->orgBasepath."FICHAF.dbf");
		}
	}

	public function fetchAll($formated = FALSE)
	{
		$dbase = new Dbase();
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
				$formated[$value->A_FUNCIONA][$value->A_RENDIMEN] = $value;
			}
		}
		return $formated;
	}
}
