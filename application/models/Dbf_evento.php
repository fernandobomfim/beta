<?php
use application\libraries\Dbase\Dbase;
use application\libraries\File\FileAbstract;

Class Dbf_evento extends CI_Model {

	protected $file = '';

	public function __construct()
	{
		parent::__construct();

		if (realpath($this->betaconfig->orgBasepath."EVENTO.DBF")) {
			$this->file = realpath($this->betaconfig->orgBasepath."EVENTO.DBF");
		} else {
			$this->file = realpath($this->betaconfig->orgBasepath."EVENTO.dbf");
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
				$formated[$value->R_CODIGO] = $value;
			}
		}
		return $formated;
	}

	public function fetchAllForSelectInput()
	{
		$array = array();
		$eventos = $this->fetchAll(TRUE);
		foreach ($eventos as $key => $value) {
			$array[$key] = iconv("Windows-1252", "UTF-8", $value->R_CODIGO.' - '.trim($value->R_NOME));
		}
		ksort($array);
		return $array;
	}
}
