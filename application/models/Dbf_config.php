<?php
use application\libraries\Dbase\Dbase;

Class DBF_Config extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->orgao = $this->session->userdata('orgao');
	}

	public function fetchAll($formated = FALSE)
	{
		$arquivo = realpath($this->BIConfig->orgao->org_basepath."CONFIG.DBF");
		$dbase = new Dbase();
		$dbase->setFile($arquivo);
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
				$formated[$value->O_FUNCIONA] = $value;
			}
		}
		return $formated;
	}
}
