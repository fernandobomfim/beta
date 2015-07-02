<?php
use application\libraries\Dbase\Dbase;
use application\libraries\Dbase\Dbase_movger;
use application\libraries\Dbase\Dbase_codfix;
use application\models\Dbf_movger_entity;

Class DBF_movger extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
	
		$this->BIConfig->orgao = $this->session->userdata('orgao');
	}

	public function fetchAll($formated = FALSE)
	{
		$arquivo = realpath($this->BIConfig->orgao->org_basepath."MOVGER.dbf");
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

	public function fetchAllTyped($formated = FALSE)
	{
		$arquivo = realpath($this->BIConfig->orgao->org_basepath."MOVGER.dbf");
		$movger = new Dbase_movger;
		$movger->setFile($arquivo);
		$movger->open();
		$collection = $movger->getCollection();
		
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

	public function checkRegisterIntoMovger($movgerCollection, $matricula = 0, $codigoDesconto = 0, $valorPrevisto = 0)
	{
		$matricula = (int)$matricula;
		$codigoDesconto = (int)$codigoDesconto;
		$valorPrevisto = (float)$valorPrevisto;

		foreach ($movgerCollection as $mov) {
			if($mov->O_FUNCIONA == $matricula && $mov->O_RENDIMEN == $codigoDesconto) {
				return array(
					'matricula' => $matricula,
					'codigoDesconto' => $mov->O_RENDIMEN,
					'valorDescontado' => $mov->O_VALOR
				);
			}
		}

		return FALSE;
	}
}
