<?php
use application\libraries\Dbase\Dbase;
use application\libraries\File\FileMoviment as FileMoviment;

Class DBF_Codfix extends CI_Model {

	public $dbfFile = 'CODFIX.dbf';
	public $dbfRealPath = '';
	public $dbfRealPathFile = '';

	private $F_MATRIC = null;
	private $F_COD01 = null;
	private $F_VAL01 = null;
	private $F_PRA01 = null;
	private $F_QTD01 = null;
	private $F_SIT01 = null;
	private $F_COD02 = null;
	private $F_VAL02 = null;
	private $F_PRA02 = null;
	private $F_QTD02 = null;
	private $F_SIT02 = null;
	private $F_COD03 = null;
	private $F_VAL03 = null;
	private $F_PRA03 = null;
	private $F_QTD03 = null;
	private $F_SIT03 = null;
	private $F_COD04 = null;
	private $F_VAL04 = null;
	private $F_PRA04 = null;
	private $F_QTD04 = null;
	private $F_SIT04 = null;
	private $F_COD05 = null;
	private $F_VAL05 = null;
	private $F_PRA05 = null;
	private $F_QTD05 = null;
	private $F_SIT05 = null;
	private $F_COD06 = null;
	private $F_VAL06 = null;
	private $F_PRA06 = null;
	private $F_QTD06 = null;
	private $F_SIT06 = null;
	private $F_COD07 = null;
	private $F_VAL07 = null;
	private $F_PRA07 = null;
	private $F_QTD07 = null;
	private $F_SIT07 = null;
	private $F_COD08 = null;
	private $F_VAL08 = null;
	private $F_PRA08 = null;
	private $F_QTD08 = null;
	private $F_SIT08 = null;
	private $F_COD09 = null;
	private $F_VAL09 = null;
	private $F_PRA09 = null;
	private $F_QTD09 = null;
	private $F_SIT09 = null;
	private $F_COD10 = null;
	private $F_VAL10 = null;
	private $F_PRA10 = null;
	private $F_QTD10 = null;
	private $F_SIT10 = null;
	private $F_COD11 = null;
	private $F_VAL11 = null;
	private $F_PRA11 = null;
	private $F_QTD11 = null;
	private $F_SIT11 = null;
	private $F_COD12 = null;
	private $F_VAL12 = null;
	private $F_PRA12 = null;
	private $F_QTD12 = null;
	private $F_SIT12 = null;
	private $F_COD13 = null;
	private $F_VAL13 = null;
	private $F_PRA13 = null;
	private $F_QTD13 = null;
	private $F_SIT13 = null;
	private $F_COD14 = null;
	private $F_VAL14 = null;
	private $F_PRA14 = null;
	private $F_QTD14 = null;
	private $F_SIT14 = null;
	private $F_COD15 = null;
	private $F_VAL15 = null;
	private $F_PRA15 = null;
	private $F_QTD15 = null;
	private $F_SIT15 = null;
	private $F_COD16 = null;
	private $F_VAL16 = null;
	private $F_PRA16 = null;
	private $F_QTD16 = null;
	private $F_SIT16 = null;
	private $F_COD17 = null;
	private $F_VAL17 = null;
	private $F_PRA17 = null;
	private $F_QTD17 = null;
	private $F_SIT17 = null;
	private $F_COD18 = null;
	private $F_VAL18 = null;
	private $F_PRA18 = null;
	private $F_QTD18 = null;
	private $F_SIT18 = null;
	private $F_COD19 = null;
	private $F_VAL19 = null;
	private $F_PRA19 = null;
	private $F_QTD19 = null;
	private $F_SIT19 = null;
	private $F_MES01 = null;
	private $F_MES02 = null;
	private $F_MES03 = null;
	private $F_MES04 = null;
	private $F_MES05 = null;
	private $F_MES06 = null;
	private $F_MES07 = null;
	private $F_MES08 = null;
	private $F_MES09 = null;
	private $F_MES10 = null;
	private $DATAALT = null;
	private $HORAALT = null;
	private $USUARIO = null;
	private $F_TOT01 = null;
	private $F_TOT02 = null;
	private $F_TOT03 = null;
	private $F_TOT04 = null;
	private $F_TOT05 = null;
	private $F_TOT06 = null;
	private $F_TOT07 = null;
	private $F_TOT08 = null;
	private $F_TOT09 = null;
	private $F_TOT10 = null;

	private $registerIndex = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->orgao = $this->session->userdata('orgao');

		$this->dbfRealPath = realpath($this->BIConfig->orgao->org_basepath);
		$this->dbfRealPathFile = realpath($this->BIConfig->orgao->org_basepath.$this->dbfFile);
	}

	public function hydrate($data)
	{
		if (!empty($data)) {
			$data = (is_array($data)) ? (object)$data : $data;
			$this->F_MATRIC = (isset($data->F_MATRIC)) ? (int)$data->F_MATRIC : null;
			$this->F_COD01 = (isset($data->F_COD01)) ? (int)$data->F_COD01 : null;
			$this->F_VAL01 = (isset($data->F_VAL01)) ? $data->F_VAL01 : null;
			$this->F_PRA01 = (isset($data->F_PRA01)) ? (int)$data->F_PRA01 : null;
			$this->F_QTD01 = (isset($data->F_QTD01)) ? (int)$data->F_QTD01 : null;
			$this->F_SIT01 = (isset($data->F_SIT01)) ? $data->F_SIT01 : null;
			$this->F_COD02 = (isset($data->F_COD02)) ? (int)$data->F_COD02 : null;
			$this->F_VAL02 = (isset($data->F_VAL02)) ? $data->F_VAL02 : null;
			$this->F_PRA02 = (isset($data->F_PRA02)) ? (int)$data->F_PRA02 : null;
			$this->F_QTD02 = (isset($data->F_QTD02)) ? (int)$data->F_QTD02 : null;
			$this->F_SIT02 = (isset($data->F_SIT02)) ? $data->F_SIT02 : null;
			$this->F_COD03 = (isset($data->F_COD03)) ? (int)$data->F_COD03 : null;
			$this->F_VAL03 = (isset($data->F_VAL03)) ? $data->F_VAL03 : null;
			$this->F_PRA03 = (isset($data->F_PRA03)) ? (int)$data->F_PRA03 : null;
			$this->F_QTD03 = (isset($data->F_QTD03)) ? (int)$data->F_QTD03 : null;
			$this->F_SIT03 = (isset($data->F_SIT03)) ? $data->F_SIT03 : null;
			$this->F_COD04 = (isset($data->F_COD04)) ? (int)$data->F_COD04 : null;
			$this->F_VAL04 = (isset($data->F_VAL04)) ? $data->F_VAL04 : null;
			$this->F_PRA04 = (isset($data->F_PRA04)) ? (int)$data->F_PRA04 : null;
			$this->F_QTD04 = (isset($data->F_QTD04)) ? (int)$data->F_QTD04 : null;
			$this->F_SIT04 = (isset($data->F_SIT04)) ? $data->F_SIT04 : null;
			$this->F_COD05 = (isset($data->F_COD05)) ? (int)$data->F_COD05 : null;
			$this->F_VAL05 = (isset($data->F_VAL05)) ? $data->F_VAL05 : null;
			$this->F_PRA05 = (isset($data->F_PRA05)) ? (int)$data->F_PRA05 : null;
			$this->F_QTD05 = (isset($data->F_QTD05)) ? (int)$data->F_QTD05 : null;
			$this->F_SIT05 = (isset($data->F_SIT05)) ? $data->F_SIT05 : null;
			$this->F_COD06 = (isset($data->F_COD06)) ? (int)$data->F_COD06 : null;
			$this->F_VAL06 = (isset($data->F_VAL06)) ? $data->F_VAL06 : null;
			$this->F_PRA06 = (isset($data->F_PRA06)) ? (int)$data->F_PRA06 : null;
			$this->F_QTD06 = (isset($data->F_QTD06)) ? (int)$data->F_QTD06 : null;
			$this->F_SIT06 = (isset($data->F_SIT06)) ? $data->F_SIT06 : null;
			$this->F_COD07 = (isset($data->F_COD07)) ? (int)$data->F_COD07 : null;
			$this->F_VAL07 = (isset($data->F_VAL07)) ? $data->F_VAL07 : null;
			$this->F_PRA07 = (isset($data->F_PRA07)) ? (int)$data->F_PRA07 : null;
			$this->F_QTD07 = (isset($data->F_QTD07)) ? (int)$data->F_QTD07 : null;
			$this->F_SIT07 = (isset($data->F_SIT07)) ? $data->F_SIT07 : null;
			$this->F_COD08 = (isset($data->F_COD08)) ? (int)$data->F_COD08 : null;
			$this->F_VAL08 = (isset($data->F_VAL08)) ? $data->F_VAL08 : null;
			$this->F_PRA08 = (isset($data->F_PRA08)) ? (int)$data->F_PRA08 : null;
			$this->F_QTD08 = (isset($data->F_QTD08)) ? (int)$data->F_QTD08 : null;
			$this->F_SIT08 = (isset($data->F_SIT08)) ? $data->F_SIT08 : null;
			$this->F_COD09 = (isset($data->F_COD09)) ? (int)$data->F_COD09 : null;
			$this->F_VAL09 = (isset($data->F_VAL09)) ? $data->F_VAL09 : null;
			$this->F_PRA09 = (isset($data->F_PRA09)) ? (int)$data->F_PRA09 : null;
			$this->F_QTD09 = (isset($data->F_QTD09)) ? (int)$data->F_QTD09 : null;
			$this->F_SIT09 = (isset($data->F_SIT09)) ? $data->F_SIT09 : null;
			$this->F_COD10 = (isset($data->F_COD10)) ? (int)$data->F_COD10 : null;
			$this->F_VAL10 = (isset($data->F_VAL10)) ? $data->F_VAL10 : null;
			$this->F_PRA10 = (isset($data->F_PRA10)) ? (int)$data->F_PRA10 : null;
			$this->F_QTD10 = (isset($data->F_QTD10)) ? (int)$data->F_QTD10 : null;
			$this->F_SIT10 = (isset($data->F_SIT10)) ? $data->F_SIT10 : null;
			$this->F_COD11 = (isset($data->F_COD11)) ? (int)$data->F_COD11 : null;
			$this->F_VAL11 = (isset($data->F_VAL11)) ? $data->F_VAL11 : null;
			$this->F_PRA11 = (isset($data->F_PRA11)) ? (int)$data->F_PRA11 : null;
			$this->F_QTD11 = (isset($data->F_QTD11)) ? (int)$data->F_QTD11 : null;
			$this->F_SIT11 = (isset($data->F_SIT11)) ? $data->F_SIT11 : null;
			$this->F_COD12 = (isset($data->F_COD12)) ? (int)$data->F_COD12 : null;
			$this->F_VAL12 = (isset($data->F_VAL12)) ? $data->F_VAL12 : null;
			$this->F_PRA12 = (isset($data->F_PRA12)) ? (int)$data->F_PRA12 : null;
			$this->F_QTD12 = (isset($data->F_QTD12)) ? (int)$data->F_QTD12 : null;
			$this->F_SIT12 = (isset($data->F_SIT12)) ? $data->F_SIT12 : null;
			$this->F_COD13 = (isset($data->F_COD12)) ? (int)$data->F_COD12 : null;
			$this->F_VAL13 = (isset($data->F_VAL13)) ? $data->F_VAL13 : null;
			$this->F_PRA13 = (isset($data->F_PRA13)) ? (int)$data->F_PRA13 : null;
			$this->F_QTD13 = (isset($data->F_QTD13)) ? (int)$data->F_QTD13 : null;
			$this->F_SIT13 = (isset($data->F_SIT13)) ? $data->F_SIT13 : null;
			$this->F_COD14 = (isset($data->F_COD14)) ? (int)$data->F_COD14 : null;
			$this->F_VAL14 = (isset($data->F_VAL14)) ? $data->F_VAL14 : null;
			$this->F_PRA14 = (isset($data->F_PRA14)) ? (int)$data->F_PRA14 : null;
			$this->F_QTD14 = (isset($data->F_QTD14)) ? (int)$data->F_QTD14 : null;
			$this->F_SIT14 = (isset($data->F_SIT14)) ? $data->F_SIT14 : null;
			$this->F_COD15 = (isset($data->F_COD15)) ? (int)$data->F_COD15 : null;
			$this->F_VAL15 = (isset($data->F_VAL15)) ? $data->F_VAL15 : null;
			$this->F_PRA15 = (isset($data->F_PRA15)) ? (int)$data->F_PRA15 : null;
			$this->F_QTD15 = (isset($data->F_QTD15)) ? (int)$data->F_QTD15 : null;
			$this->F_SIT15 = (isset($data->F_SIT15)) ? $data->F_SIT15 : null;
			$this->F_COD16 = (isset($data->F_COD16)) ? (int)$data->F_COD16 : null;
			$this->F_VAL16 = (isset($data->F_VAL16)) ? $data->F_VAL16 : null;
			$this->F_PRA16 = (isset($data->F_PRA16)) ? (int)$data->F_PRA16 : null;
			$this->F_QTD16 = (isset($data->F_QTD16)) ? (int)$data->F_QTD16 : null;
			$this->F_SIT16 = (isset($data->F_SIT16)) ? $data->F_SIT16 : null;
			$this->F_COD17 = (isset($data->F_COD17)) ? (int)$data->F_COD17 : null;
			$this->F_VAL17 = (isset($data->F_VAL17)) ? $data->F_VAL17 : null;
			$this->F_PRA17 = (isset($data->F_PRA17)) ? (int)$data->F_PRA17 : null;
			$this->F_QTD17 = (isset($data->F_QTD17)) ? (int)$data->F_QTD17 : null;
			$this->F_SIT17 = (isset($data->F_SIT17)) ? $data->F_SIT17 : null;
			$this->F_COD18 = (isset($data->F_COD18)) ? (int)$data->F_COD18 : null;
			$this->F_VAL18 = (isset($data->F_VAL18)) ? (int)$data->F_VAL18 : null;
			$this->F_PRA18 = (isset($data->F_PRA18)) ? $data->F_PRA18 : null;
			$this->F_QTD18 = (isset($data->F_QTD18)) ? (int)$data->F_QTD18 : null;
			$this->F_SIT18 = (isset($data->F_SIT18)) ? $data->F_SIT18 : null;
			$this->F_COD19 = (isset($data->F_COD19)) ? (int)$data->F_COD19 : null;
			$this->F_VAL19 = (isset($data->F_VAL19)) ? $data->F_VAL19 : null;
			$this->F_PRA19 = (isset($data->F_PRA19)) ? (int)$data->F_PRA19 : null;
			$this->F_QTD19 = (isset($data->F_QTD19)) ? (int)$data->F_QTD19 : null;
			$this->F_SIT19 = (isset($data->F_SIT19)) ? $data->F_SIT19 : null;
			$this->F_MES01 = (isset($data->F_MES01)) ? $data->F_MES01 : null;
			$this->F_MES02 = (isset($data->F_MES02)) ? $data->F_MES02 : null;
			$this->F_MES03 = (isset($data->F_MES03)) ? $data->F_MES03 : null;
			$this->F_MES04 = (isset($data->F_MES04)) ? $data->F_MES04 : null;
			$this->F_MES05 = (isset($data->F_MES05)) ? $data->F_MES05 : null;
			$this->F_MES06 = (isset($data->F_MES06)) ? $data->F_MES06 : null;
			$this->F_MES07 = (isset($data->F_MES07)) ? $data->F_MES07 : null;
			$this->F_MES08 = (isset($data->F_MES08)) ? $data->F_MES08 : null;
			$this->F_MES09 = (isset($data->F_MES09)) ? $data->F_MES09 : null;
			$this->F_MES10 = (isset($data->F_MES10)) ? $data->F_MES10 : null;
			$this->DATAALT = (isset($data->DATAALT)) ? $data->DATAALT : null;
			$this->HORAALT = (isset($data->HORAALT)) ? $data->HORAALT : null;
			$this->USUARIO = (isset($data->USUARIO)) ? $data->USUARIO : null;
			$this->F_TOT01 = (isset($data->F_TOT01)) ? $data->F_TOT01 : null;
			$this->F_TOT02 = (isset($data->F_TOT02)) ? $data->F_TOT02 : null;
			$this->F_TOT03 = (isset($data->F_TOT03)) ? $data->F_TOT03 : null;
			$this->F_TOT04 = (isset($data->F_TOT04)) ? $data->F_TOT04 : null;
			$this->F_TOT05 = (isset($data->F_TOT05)) ? $data->F_TOT05 : null;
			$this->F_TOT06 = (isset($data->F_TOT06)) ? $data->F_TOT06 : null;
			$this->F_TOT07 = (isset($data->F_TOT07)) ? $data->F_TOT07 : null;
			$this->F_TOT08 = (isset($data->F_TOT08)) ? $data->F_TOT08 : null;
			$this->F_TOT09 = (isset($data->F_TOT09)) ? $data->F_TOT09 : null;
			$this->F_TOT10 = (isset($data->F_TOT10)) ? $data->F_TOT10 : null;
		}
	}

	public function getArray($obj = FALSE)
	{
		return array(
			'F_MATRIC' => $this->F_MATRIC,
			'F_COD01' => $this->F_COD01, 
			'F_VAL01' => $this->F_VAL01, 
			'F_PRA01' => $this->F_PRA01, 
			'F_QTD01' => $this->F_QTD01, 
			'F_SIT01' => $this->F_SIT01, 
			'F_COD02' => $this->F_COD02, 
			'F_VAL02' => $this->F_VAL02, 
			'F_PRA02' => $this->F_PRA02, 
			'F_QTD02' => $this->F_QTD02, 
			'F_SIT02' => $this->F_SIT02, 
			'F_COD03' => $this->F_COD03, 
			'F_VAL03' => $this->F_VAL03, 
			'F_PRA03' => $this->F_PRA03, 
			'F_QTD03' => $this->F_QTD03, 
			'F_SIT03' => $this->F_SIT03, 
			'F_COD04' => $this->F_COD04, 
			'F_VAL04' => $this->F_VAL04, 
			'F_PRA04' => $this->F_PRA04, 
			'F_QTD04' => $this->F_QTD04, 
			'F_SIT04' => $this->F_SIT04, 
			'F_COD05' => $this->F_COD05, 
			'F_VAL05' => $this->F_VAL05, 
			'F_PRA05' => $this->F_PRA05, 
			'F_QTD05' => $this->F_QTD05, 
			'F_SIT05' => $this->F_SIT05, 
			'F_COD06' => $this->F_COD06, 
			'F_VAL06' => $this->F_VAL06, 
			'F_PRA06' => $this->F_PRA06, 
			'F_QTD06' => $this->F_QTD06, 
			'F_SIT06' => $this->F_SIT06, 
			'F_COD07' => $this->F_COD07, 
			'F_VAL07' => $this->F_VAL07, 
			'F_PRA07' => $this->F_PRA07, 
			'F_QTD07' => $this->F_QTD07, 
			'F_SIT07' => $this->F_SIT07, 
			'F_COD08' => $this->F_COD08, 
			'F_VAL08' => $this->F_VAL08, 
			'F_PRA08' => $this->F_PRA08, 
			'F_QTD08' => $this->F_QTD08, 
			'F_SIT08' => $this->F_SIT08, 
			'F_COD09' => $this->F_COD09, 
			'F_VAL09' => $this->F_VAL09, 
			'F_PRA09' => $this->F_PRA09, 
			'F_QTD09' => $this->F_QTD09, 
			'F_SIT09' => $this->F_SIT09, 
			'F_COD10' => $this->F_COD10, 
			'F_VAL10' => $this->F_VAL10, 
			'F_PRA10' => $this->F_PRA10, 
			'F_QTD10' => $this->F_QTD10, 
			'F_SIT10' => $this->F_SIT10, 
			'F_COD11' => $this->F_COD11, 
			'F_VAL11' => $this->F_VAL11, 
			'F_PRA11' => $this->F_PRA11, 
			'F_QTD11' => $this->F_QTD11, 
			'F_SIT11' => $this->F_SIT11, 
			'F_COD12' => $this->F_COD12, 
			'F_VAL12' => $this->F_VAL12, 
			'F_PRA12' => $this->F_PRA12, 
			'F_QTD12' => $this->F_QTD12, 
			'F_SIT12' => $this->F_SIT12, 
			'F_COD13' => $this->F_COD13, 
			'F_VAL13' => $this->F_VAL13, 
			'F_PRA13' => $this->F_PRA13, 
			'F_QTD13' => $this->F_QTD13, 
			'F_SIT13' => $this->F_SIT13, 
			'F_COD14' => $this->F_COD14, 
			'F_VAL14' => $this->F_VAL14, 
			'F_PRA14' => $this->F_PRA14, 
			'F_QTD14' => $this->F_QTD14, 
			'F_SIT14' => $this->F_SIT14, 
			'F_COD15' => $this->F_COD15, 
			'F_VAL15' => $this->F_VAL15, 
			'F_PRA15' => $this->F_PRA15, 
			'F_QTD15' => $this->F_QTD15, 
			'F_SIT15' => $this->F_SIT15, 
			'F_COD16' => $this->F_COD16, 
			'F_VAL16' => $this->F_VAL16, 
			'F_PRA16' => $this->F_PRA16, 
			'F_QTD16' => $this->F_QTD16, 
			'F_SIT16' => $this->F_SIT16, 
			'F_COD17' => $this->F_COD17, 
			'F_VAL17' => $this->F_VAL17, 
			'F_PRA17' => $this->F_PRA17, 
			'F_QTD17' => $this->F_QTD17, 
			'F_SIT17' => $this->F_SIT17, 
			'F_COD18' => $this->F_COD18, 
			'F_VAL18' => $this->F_VAL18, 
			'F_PRA18' => $this->F_PRA18, 
			'F_QTD18' => $this->F_QTD18, 
			'F_SIT18' => $this->F_SIT18, 
			'F_COD19' => $this->F_COD19, 
			'F_VAL19' => $this->F_VAL19, 
			'F_PRA19' => $this->F_PRA19, 
			'F_QTD19' => $this->F_QTD19, 
			'F_SIT19' => $this->F_SIT19, 
			'F_MES01' => $this->F_MES01, 
			'F_MES02' => $this->F_MES02, 
			'F_MES03' => $this->F_MES03, 
			'F_MES04' => $this->F_MES04, 
			'F_MES05' => $this->F_MES05, 
			'F_MES06' => $this->F_MES06, 
			'F_MES07' => $this->F_MES07, 
			'F_MES08' => $this->F_MES08, 
			'F_MES09' => $this->F_MES09, 
			'F_MES10' => $this->F_MES10, 
			'DATAALT' => $this->DATAALT, 
			'HORAALT' => $this->HORAALT, 
			'USUARIO' => $this->USUARIO, 
			'F_TOT01' => $this->F_TOT01, 
			'F_TOT02' => $this->F_TOT02, 
			'F_TOT03' => $this->F_TOT03, 
			'F_TOT04' => $this->F_TOT04, 
			'F_TOT05' => $this->F_TOT05, 
			'F_TOT06' => $this->F_TOT06, 
			'F_TOT07' => $this->F_TOT07, 
			'F_TOT08' => $this->F_TOT08, 
			'F_TOT09' => $this->F_TOT09, 
			'F_TOT10' => $this->F_TOT10
		);
	}

	public function fetchAll($formated = FALSE)
	{
		$dbase = new Dbase();
		$dbase->setFile($this->dbfRealPathFile);
		$dbase->open();
		$collection = $dbase->getCollection();
		array_shift($collection);
		
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
				$formated[$value->O_FUNCIONA] = $value;
			}
		}
		return $formated;
	}

	public function fetchOne($matricula = FALSE)
	{
		if ($matricula) {
			$dbase = new Dbase();
			$dbase->setFile($this->dbfRealPathFile);
			$dbase->open();
			$collection = $dbase->getCollection();
			array_shift($collection);
			foreach ($collection as $index => $register) {
				if ( (int)trim($register->F_MATRIC) === $matricula ) {
					// Seta índice do registro;
					$this->registerIndex = $index;
					$this->hydrate($register);
					return $this;
				}
			}
		}
		return FALSE;
	}

	public function updateCodfixRegister(DBF_Codfix $registerData, FileMoviment $movimentData)
	{
		if ($registerData && $movimentData) {

			// Identifica coluna disponível
			$column = $this->Codfix->getAvailableColumnByMovimentRegisterObject($registerData, $movimentData);
			
			if ( $column != FALSE && is_string($column) ) {
				// ATUALIZA o Registro de uma coluna EXISTENTE no arquivo CODFIX.DBF
			} else {
				// SALVA o Registro de uma coluna DISPONÍVEL no arquivo CODFIX.DBF
			}


			// $registerData = (array)$registerData;
			// $registerDataOld = (array)$registerData;

			// $F_COD = 'F_COD'.$firstEmptyColumnIndex;
			// $F_VAL = 'F_VAL'.$firstEmptyColumnIndex;
			// $F_PRA = 'F_PRA'.$firstEmptyColumnIndex;
			// $F_QTD = 'F_QTD'.$firstEmptyColumnIndex;
			// $F_SIT = 'F_SIT'.$firstEmptyColumnIndex;

			// $codigoDesconto = (int)trim($movimentData['codigoDesconto']);
			// $valorDesconto = (float)trim($movimentData['valorDesconto']);
			// $prazoTotal = (int)trim($movimentData['prazoTotal']);
			// $qtdParcelasPagas = trim($movimentData['numeroParcelasPagas']);

			// $registerData[$F_COD] = str_pad($codigoDesconto, 4, '0', STR_PAD_LEFT);
			// $registerData[$F_VAL] = str_pad(number_format($valorDesconto, 2, '.',''), 2, '0', STR_PAD_LEFT);
			// $registerData[$F_PRA] = (int)$prazoTotal;
			// $registerData[$F_QTD] = (int)$qtdParcelasPagas;
			// $registerData[$F_SIT] = "07";

			// $dbase = new Dbase();
			// $dbase->setFile($this->dbfRealPathFile);
			// $dbase->setMode(2);
			// $dbase->open();
			// return $dbase->setRegister($registerIndex, $registerData);
		}
		return FALSE;
	}

	public function createCodfixRegister($FileMoviment) {

	}

	public function getAvailableColumnByMovimentRegisterObject(Dbf_codfix $registerObj, FileMoviment $movimentObj)
	{
		var_dump($registerObj->F_MATRIC);

		if (isset($movimentObj->codigoDesconto)) {

			$start = 1;
			$end = 19;
			$livre = array();
			$existe = FALSE;

			for($a=$start; $a<=$end; $a++) {
				// Coluna corrente
				$numberFormated = str_pad($a, 2, '0', STR_PAD_LEFT);
				$F_COD = "F_COD".$numberFormated;				
				
				var_dump($registerObj->$F_COD); continue;

				if (!empty($registerObj->$F_COD) && $registerObj->$F_COD == $codDesconto) {
					return $numberFormated;
				} elseif (empty($registerObj->$F_COD)) {
					$livre[] = $numberFormated;
				}
			}

			if (count($livre) > 0) {
				return $livre[0];
			}

			/**
			 * Retorna false caso o FOR não identifique nenhuma coluna existente
			 * com o código de desconto e também não encontre nenhuma coluna livre.
			 */
			return FALSE;

		} else {
			throw new Exception('Problema em algum dos parâmetros recebidos no método Dbf_codfix::getAvailableColumnByMovimentRegisterObject(). Provavelmeente o $codigoDesconto está vazio.');
			exit();
		}
	}
}
