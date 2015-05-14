<?php
use application\libraries\Dbase\Dbase;

Class DBF_depart extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
	}

	public function fetchAll($formated = FALSE)
	{
		$arquivo = realpath($this->BIConfig->diretorio_arquivos_dbf."DEPART.DBF");
		$dbase = new Dbase();
		$dbase->setFile($arquivo);
		$dbase->open();
		$collection = $dbase->getCollection();
		array_shift($collection);

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