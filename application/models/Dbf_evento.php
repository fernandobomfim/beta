<?php
use application\libraries\Dbase\Dbase;
use application\libraries\File\FileAbstract;

Class Dbf_evento extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->orgao = $this->session->userdata('orgao');
	}

	public function fetchAll($formated = FALSE)
	{
		$arquivo = realpath($this->BIConfig->orgao->org_basepath."EVENTO.DBF");
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
				$formated[$value->R_CODIGO] = $value;
			}
		}
		return $formated;
	}

	public function fetchAllForSelectInput()
	{
		$array = array('' => '-- Selecione um evento --');
		$eventos = $this->fetchAll(TRUE);
		foreach ($eventos as $key => $value) {
			$array[$key] = iconv("Windows-1252", "UTF-8", $value->R_CODIGO.' - '.trim($value->R_NOME));
		}
		ksort($array);
		return $array;
	}
}
