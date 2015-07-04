<?php
use application\libraries\Dbase\Dbase;
use application\libraries\Dbase\Dbase_codfix;
use application\libraries\File\FileMoviment as FileMoviment;
use application\models\Dbf_codfix_entity;

Class Dbf_Codfix extends CI_Model {

	public $dbfFile = 'CODFIX.dbf';
	public $dbfRealPath = '';
	public $dbfRealPathFile = '';
	private $numValColumns = 19;

	public function __construct()
	{
		parent::__construct();

		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->orgao = $this->session->userdata('orgao');

		$this->dbfRealPath = realpath($this->BIConfig->orgao->org_basepath);
		$this->dbfRealPathFile = realpath($this->BIConfig->orgao->org_basepath.$this->dbfFile);
	}

	public function fetchAll($formated = FALSE)
	{
		$codfix = new Dbase_Codfix();
		$codfix->setFile($this->dbfRealPathFile);
		$codfix->open();
		$collection = $codfix->getCollection();
		
		if ($formated) {
			return $this->fetchAllFormated($collection);
		} else {
			return $collection;
		}
	}

	private function fetchAllFormated($collection)
	{
		$formated = array();
		if ($collection && count($collection)) {
			foreach ($collection as $key => $value) {
				$formated[$value->F_MATRIC] = $value;
			}
		}
		return $formated;
	}

	public function fetchOne($matricula = FALSE)
	{
		$matricula = (int)$matricula; 
		
		if ($matricula > 0) {
			$codfix = new Dbase_Codfix();
			$codfix->setFile($this->dbfRealPathFile);
			$codfix->open();
			$collection = $codfix->getCollection();
			
			foreach ($collection as $register) {
				if ( $register->getFMATRIC() == $matricula ) {
					return $register;
				}
			}
		}
		return FALSE;
	}

	public function updateCodfixRecordFromMoviment(Dbf_Codfix_Entity $registerData, FileMoviment $movimentData)
	{
		if ($registerData && $movimentData) {
			// Identifica coluna disponível
			$availableColumn = $this->getAvailableColumnToUpdate($registerData, $movimentData);
			
			if ( $availableColumn !== FALSE && is_string($availableColumn) && strlen($availableColumn) == 2 ) {
				// ATUALIZA o Registro de uma coluna no arquivo CODFIX.DBF

				$F_COD = 'F_COD'.$availableColumn;
				$F_VAL = 'F_VAL'.$availableColumn;
				$F_PRA = 'F_PRA'.$availableColumn;
				$F_QTD = 'F_QTD'.$availableColumn;
				$F_SIT = 'F_SIT'.$availableColumn;

				$registerData->$F_COD = str_pad($movimentData->codigoDesconto, 4, '0', STR_PAD_LEFT);
				$registerData->$F_VAL = $movimentData->valorDesconto;
				$registerData->$F_PRA = (int)$movimentData->prazoTotal;
				$registerData->$F_QTD = (int)$movimentData->numeroParcelasPagas;
				$registerData->$F_SIT = "07";
				$registerData->DATAALT = date('dmY');
				$registerData->HORAALT = date('H:i:s');

				$dbase = new Dbase();
				$dbase->setFile($this->dbfRealPathFile);
				$dbase->setMode(2);
				$dbase->open();
				return $dbase->updateRecord($registerData->getArray(), $registerData->getRegisterIndex());

			} else {
				throw new Exception("Não existem colunas disponíveis para inserir o registro da Matrícula: ".$registerData->F_MATRIC);
			}
		}

		return FALSE;
	}

	public function createCodfixRecordFromMoviment(FileMoviment $movimentData)
	{
		if ($movimentData) {
			$record = new Dbf_Codfix_Entity;
			$record->F_MATRIC = $movimentData->matricula;
			$record->F_COD01 = str_pad($movimentData->codigoDesconto, 4, '0', STR_PAD_LEFT);
			$record->F_VAL01 = $movimentData->valorDesconto;
			$record->F_PRA01 = (int)$movimentData->prazoTotal;
			$record->F_QTD01 = (int)$movimentData->numeroParcelasPagas;
			$record->F_SIT01 = "07";
			$record->DATAALT = date('Ymd');
			$record->HORAALT = date('H:i:s');

			$dbase = new Dbase();
			$dbase->setFile($this->dbfRealPathFile);
			$dbase->setMode(2);
			$dbase->open();
			return $dbase->createRecord($record->getArray());
		}

	}

	public function updateCodfixRecord(Dbf_Codfix_Entity $codfixObj)
	{
		if ($codfixObj) {
			$dbase = new Dbase();
			$dbase->setFile($this->dbfRealPathFile);
			$dbase->setMode(2);
			$dbase->open();
			return $dbase->updateRecord($codfixObj->getArray(), $codfixObj->getRegisterIndex());
		}

		return FALSE;
	}

	public function getAvailableColumnToUpdate(Dbf_Codfix_Entity $registerObj, FileMoviment $movimentObj)
	{
		if (isset($movimentObj->codigoDesconto)) {			
			$livre = array();

			for($a=1; $a<=$this->numValColumns; $a++) {
				// Coluna corrente
				$numberFormated = str_pad($a, 2, '0', STR_PAD_LEFT);
				$F_COD = "F_COD".$numberFormated;

				if (!empty($registerObj->$F_COD) && $registerObj->$F_COD == $movimentObj->codigoDesconto) {
					return $numberFormated;
				} elseif (empty($registerObj->$F_COD)) {
					$livre[] = $numberFormated;
				}
			}

			if (count($livre) > 0) {
				return $livre[0];
			}

			/**
			 * Retorna false caso o FOR() não identifique nenhuma coluna existente
			 * com o código de desconto e também não encontre nenhuma coluna livre.
			 */
			return FALSE;

		} else {
			throw new Exception('Problema em algum dos parâmetros recebidos no método Dbf_codfix::getAvailableColumnByMovimentRegisterObject(). Provavelmeente o $codigoDesconto está vazio.');
			exit();
		}
	}

	public function getColumnsNumberWithContent(Dbf_Codfix_Entity $registerObj)
	{
		$columnsWithContent = array();	
		for($a=1; $a<=$this->numValColumns; $a++) {
			$numberFormated = str_pad($a, 2, '0', STR_PAD_LEFT);
			$F_COD = "F_COD".$numberFormated;
			$F_VAL = "F_VAL".$numberFormated;
			$F_PRA = "F_PRA".$numberFormated;
			$F_QTD = "F_QTD".$numberFormated;
			$F_SIT = "F_SIT".$numberFormated;

			if (!empty($registerObj->$F_COD)) {
				$columnsWithContent[$a] = array(
					'columnNumber' => $numberFormated,
					$F_COD => $registerObj->$F_COD,
					$F_VAL => $registerObj->$F_VAL,
					$F_PRA => $registerObj->$F_PRA,
					$F_QTD => $registerObj->$F_QTD,
					$F_SIT => $registerObj->$F_SIT,
				);
			}
		}
		return $columnsWithContent;
	}
}
