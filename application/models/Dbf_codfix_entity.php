<?php
namespace application\models;

Class Dbf_Codfix_Entity implements Dbf_entity_interface {

	public $F_MATRIC = 0;
	public $F_COD01 = '';
	public $F_VAL01 = 0;
	public $F_PRA01 = 0;
	public $F_QTD01 = 0;
	public $F_SIT01 = '';
	public $F_COD02 = '';
	public $F_VAL02 = 0;
	public $F_PRA02 = 0;
	public $F_QTD02 = 0;
	public $F_SIT02 = '';
	public $F_COD03 = '';
	public $F_VAL03 = 0;
	public $F_PRA03 = 0;
	public $F_QTD03 = 0;
	public $F_SIT03 = '';
	public $F_COD04 = '';
	public $F_VAL04 = 0;
	public $F_PRA04 = 0;
	public $F_QTD04 = 0;
	public $F_SIT04 = '';
	public $F_COD05 = '';
	public $F_VAL05 = 0;
	public $F_PRA05 = 0;
	public $F_QTD05 = 0;
	public $F_SIT05 = '';
	public $F_COD06 = '';
	public $F_VAL06 = 0;
	public $F_PRA06 = 0;
	public $F_QTD06 = 0;
	public $F_SIT06 = '';
	public $F_COD07 = '';
	public $F_VAL07 = 0;
	public $F_PRA07 = 0;
	public $F_QTD07 = 0;
	public $F_SIT07 = '';
	public $F_COD08 = '';
	public $F_VAL08 = 0;
	public $F_PRA08 = 0;
	public $F_QTD08 = 0;
	public $F_SIT08 = '';
	public $F_COD09 = '';
	public $F_VAL09 = 0;
	public $F_PRA09 = 0;
	public $F_QTD09 = 0;
	public $F_SIT09 = '';
	public $F_COD10 = '';
	public $F_VAL10 = 0;
	public $F_PRA10 = 0;
	public $F_QTD10 = 0;
	public $F_SIT10 = '';
	public $F_MES01 = 0;
	public $F_MES02 = 0;
	public $F_MES03 = 0;
	public $F_MES04 = 0;
	public $F_MES05 = 0;
	public $F_MES06 = 0;
	public $F_MES07 = 0;
	public $F_MES08 = 0;
	public $F_MES09 = 0;
	public $F_MES10 = 0;
	public $F_MES11 = 0;
	public $F_MES12 = 0;
	public $F_MES13 = 0;
	public $F_MES14 = 0;
	public $F_MES15 = 0;
	public $F_MES16 = 0;
	public $F_MES17 = 0;
	public $F_MES18 = 0;
	public $F_MES19 = 0;
	public $DATAALT = '';
	public $HORAALT = '';
	public $USUARIO = '';
	public $F_TOT01 = 0;
	public $F_TOT02 = 0;
	public $F_TOT03 = 0;
	public $F_TOT04 = 0;
	public $F_TOT05 = 0;
	public $F_TOT06 = 0;
	public $F_TOT07 = 0;
	public $F_TOT08 = 0;
	public $F_TOT09 = 0;
	public $F_TOT10 = 0;
	public $F_TOT11 = 0;
	public $F_TOT12 = 0;
	public $F_TOT13 = 0;
	public $F_TOT14 = 0;
	public $F_TOT15 = 0;
	public $F_TOT16 = 0;
	public $F_TOT17 = 0;
	public $F_TOT18 = 0;
	public $F_TOT19 = 0;
	public $F_COD11 = '';
	public $F_VAL11 = 0;
	public $F_PRA11 = 0;
	public $F_QTD11 = 0;
	public $F_SIT11 = '';
	public $F_COD12 = '';
	public $F_VAL12 = 0;
	public $F_PRA12 = 0;
	public $F_QTD12 = 0;
	public $F_SIT12 = '';
	public $F_COD13 = '';
	public $F_VAL13 = 0;
	public $F_PRA13 = 0;
	public $F_QTD13 = 0;
	public $F_SIT13 = '';
	public $F_COD14 = '';
	public $F_VAL14 = 0;
	public $F_PRA14 = 0;
	public $F_QTD14 = 0;
	public $F_SIT14 = '';
	public $F_COD15 = '';
	public $F_VAL15 = 0;
	public $F_PRA15 = 0;
	public $F_QTD15 = 0;
	public $F_SIT15 = '';
	public $F_COD16 = '';
	public $F_VAL16 = 0;
	public $F_PRA16 = 0;
	public $F_QTD16 = 0;
	public $F_SIT16 = '';
	public $F_COD17 = '';
	public $F_VAL17 = 0;
	public $F_PRA17 = 0;
	public $F_QTD17 = 0;
	public $F_SIT17 = '';
	public $F_COD18 = '';
	public $F_VAL18 = 0;
	public $F_PRA18 = 0;
	public $F_QTD18 = 0;
	public $F_SIT18 = '';
	public $F_COD19 = '';
	public $F_VAL19 = 0;
	public $F_PRA19 = 0;
	public $F_QTD19 = 0;
	public $F_SIT19 = '';

	public $registerIndex = null;

	public function hydrate($data)
	{
		if (!empty($data)) {
			$data = (is_array($data)) ? (object)$data : $data;
			$this->F_MATRIC = (isset($data->F_MATRIC)) ? (int)$data->F_MATRIC : '';
			$this->F_COD01 = (isset($data->F_COD01)) ? (int)$data->F_COD01 : '';
			$this->F_VAL01 = (isset($data->F_VAL01)) ? (float)$data->F_VAL01 : null;
			$this->F_PRA01 = (isset($data->F_PRA01)) ? (int)$data->F_PRA01 : 0;
			$this->F_QTD01 = (isset($data->F_QTD01)) ? (int)$data->F_QTD01 : 0;
			$this->F_SIT01 = (isset($data->F_SIT01)) ? trim($data->F_SIT01) : '';
			$this->F_COD02 = (isset($data->F_COD02)) ? (int)$data->F_COD02 : 0;
			$this->F_VAL02 = (isset($data->F_VAL02)) ? (float)$data->F_VAL02 : 0;
			$this->F_PRA02 = (isset($data->F_PRA02)) ? (int)$data->F_PRA02 : null;
			$this->F_QTD02 = (isset($data->F_QTD02)) ? (int)$data->F_QTD02 : null;
			$this->F_SIT02 = (isset($data->F_SIT02)) ? trim($data->F_SIT02) : '';
			$this->F_COD03 = (isset($data->F_COD03)) ? (int)$data->F_COD03 : '';
			$this->F_VAL03 = (isset($data->F_VAL03)) ? (float)$data->F_VAL03 : null;
			$this->F_PRA03 = (isset($data->F_PRA03)) ? (int)$data->F_PRA03 : null;
			$this->F_QTD03 = (isset($data->F_QTD03)) ? (int)$data->F_QTD03 : null;
			$this->F_SIT03 = (isset($data->F_SIT03)) ? trim($data->F_SIT03) : '';
			$this->F_COD04 = (isset($data->F_COD04)) ? (int)$data->F_COD04 : '';
			$this->F_VAL04 = (isset($data->F_VAL04)) ? (float)$data->F_VAL04 : null;
			$this->F_PRA04 = (isset($data->F_PRA04)) ? (int)$data->F_PRA04 : null;
			$this->F_QTD04 = (isset($data->F_QTD04)) ? (int)$data->F_QTD04 : null;
			$this->F_SIT04 = (isset($data->F_SIT04)) ? trim($data->F_SIT04) : '';
			$this->F_COD05 = (isset($data->F_COD05)) ? (int)$data->F_COD05 : '';
			$this->F_VAL05 = (isset($data->F_VAL05)) ? (float)$data->F_VAL05 : null;
			$this->F_PRA05 = (isset($data->F_PRA05)) ? (int)$data->F_PRA05 : null;
			$this->F_QTD05 = (isset($data->F_QTD05)) ? (int)$data->F_QTD05 : null;
			$this->F_SIT05 = (isset($data->F_SIT05)) ? trim($data->F_SIT05) : '';
			$this->F_COD06 = (isset($data->F_COD06)) ? (int)$data->F_COD06 : '';
			$this->F_VAL06 = (isset($data->F_VAL06)) ? (float)$data->F_VAL06 : null;
			$this->F_PRA06 = (isset($data->F_PRA06)) ? (int)$data->F_PRA06 : null;
			$this->F_QTD06 = (isset($data->F_QTD06)) ? (int)$data->F_QTD06 : null;
			$this->F_SIT06 = (isset($data->F_SIT06)) ? trim($data->F_SIT06) : '';
			$this->F_COD07 = (isset($data->F_COD07)) ? (int)$data->F_COD07 : '';
			$this->F_VAL07 = (isset($data->F_VAL07)) ? (float)$data->F_VAL07 : null;
			$this->F_PRA07 = (isset($data->F_PRA07)) ? (int)$data->F_PRA07 : null;
			$this->F_QTD07 = (isset($data->F_QTD07)) ? (int)$data->F_QTD07 : null;
			$this->F_SIT07 = (isset($data->F_SIT07)) ? trim($data->F_SIT07) : '';
			$this->F_COD08 = (isset($data->F_COD08)) ? (int)$data->F_COD08 : '';
			$this->F_VAL08 = (isset($data->F_VAL08)) ? (float)$data->F_VAL08 : null;
			$this->F_PRA08 = (isset($data->F_PRA08)) ? (int)$data->F_PRA08 : null;
			$this->F_QTD08 = (isset($data->F_QTD08)) ? (int)$data->F_QTD08 : null;
			$this->F_SIT08 = (isset($data->F_SIT08)) ? trim($data->F_SIT08) : '';
			$this->F_COD09 = (isset($data->F_COD09)) ? (int)$data->F_COD09 : '';
			$this->F_VAL09 = (isset($data->F_VAL09)) ? (float)$data->F_VAL09 : null;
			$this->F_PRA09 = (isset($data->F_PRA09)) ? (int)$data->F_PRA09 : null;
			$this->F_QTD09 = (isset($data->F_QTD09)) ? (int)$data->F_QTD09 : null;
			$this->F_SIT09 = (isset($data->F_SIT09)) ? trim($data->F_SIT09) : '';
			$this->F_COD10 = (isset($data->F_COD10)) ? (int)$data->F_COD10 : '';
			$this->F_VAL10 = (isset($data->F_VAL10)) ? (float)$data->F_VAL10 : null;
			$this->F_PRA10 = (isset($data->F_PRA10)) ? (int)$data->F_PRA10 : null;
			$this->F_QTD10 = (isset($data->F_QTD10)) ? (int)$data->F_QTD10 : null;
			$this->F_SIT10 = (isset($data->F_SIT10)) ? trim($data->F_SIT10) : '';
			$this->F_MES01 = (isset($data->F_MES01)) ? (int)$data->F_MES01 : 0;
			$this->F_MES02 = (isset($data->F_MES02)) ? (int)$data->F_MES02 : 0;
			$this->F_MES03 = (isset($data->F_MES03)) ? (int)$data->F_MES03 : 0;
			$this->F_MES04 = (isset($data->F_MES04)) ? (int)$data->F_MES04 : 0;
			$this->F_MES05 = (isset($data->F_MES05)) ? (int)$data->F_MES05 : 0;
			$this->F_MES06 = (isset($data->F_MES06)) ? (int)$data->F_MES06 : 0;
			$this->F_MES07 = (isset($data->F_MES07)) ? (int)$data->F_MES07 : 0;
			$this->F_MES08 = (isset($data->F_MES08)) ? (int)$data->F_MES08 : 0;
			$this->F_MES09 = (isset($data->F_MES09)) ? (int)$data->F_MES09 : 0;
			$this->F_MES10 = (isset($data->F_MES10)) ? (int)$data->F_MES10 : 0;
			$this->F_MES11 = (isset($data->F_MES11)) ? (int)$data->F_MES11 : 0;
			$this->F_MES12 = (isset($data->F_MES12)) ? (int)$data->F_MES12 : 0;
			$this->F_MES13 = (isset($data->F_MES13)) ? (int)$data->F_MES13 : 0;
			$this->F_MES14 = (isset($data->F_MES14)) ? (int)$data->F_MES14 : 0;
			$this->F_MES15 = (isset($data->F_MES15)) ? (int)$data->F_MES15 : 0;
			$this->F_MES16 = (isset($data->F_MES16)) ? (int)$data->F_MES16 : 0;
			$this->F_MES17 = (isset($data->F_MES17)) ? (int)$data->F_MES17 : 0;
			$this->F_MES18 = (isset($data->F_MES18)) ? (int)$data->F_MES18 : 0;
			$this->F_MES19 = (isset($data->F_MES19)) ? (int)$data->F_MES19 : 0;
			$this->DATAALT = (isset($data->DATAALT)) ? trim($data->DATAALT) : '';
			$this->HORAALT = (isset($data->HORAALT)) ? trim($data->HORAALT) : '';
			$this->USUARIO = (isset($data->USUARIO)) ? trim($data->USUARIO) : '';
			$this->F_TOT01 = (isset($data->F_TOT01)) ? (int)$data->F_TOT01 : 0;
			$this->F_TOT02 = (isset($data->F_TOT02)) ? (int)$data->F_TOT02 : 0;
			$this->F_TOT03 = (isset($data->F_TOT03)) ? (int)$data->F_TOT03 : 0;
			$this->F_TOT04 = (isset($data->F_TOT04)) ? (int)$data->F_TOT04 : 0;
			$this->F_TOT05 = (isset($data->F_TOT05)) ? (int)$data->F_TOT05 : 0;
			$this->F_TOT06 = (isset($data->F_TOT06)) ? (int)$data->F_TOT06 : 0;
			$this->F_TOT07 = (isset($data->F_TOT07)) ? (int)$data->F_TOT07 : 0;
			$this->F_TOT08 = (isset($data->F_TOT08)) ? (int)$data->F_TOT08 : 0;
			$this->F_TOT09 = (isset($data->F_TOT09)) ? (int)$data->F_TOT09 : 0;
			$this->F_TOT10 = (isset($data->F_TOT10)) ? (int)$data->F_TOT10 : 0;
			$this->F_TOT11 = (isset($data->F_TOT11)) ? (int)$data->F_TOT11 : 0;
			$this->F_TOT12 = (isset($data->F_TOT12)) ? (int)$data->F_TOT12 : 0;
			$this->F_TOT13 = (isset($data->F_TOT13)) ? (int)$data->F_TOT13 : 0;
			$this->F_TOT14 = (isset($data->F_TOT14)) ? (int)$data->F_TOT14 : 0;
			$this->F_TOT15 = (isset($data->F_TOT15)) ? (int)$data->F_TOT15 : 0;
			$this->F_TOT16 = (isset($data->F_TOT16)) ? (int)$data->F_TOT16 : 0;
			$this->F_TOT17 = (isset($data->F_TOT17)) ? (int)$data->F_TOT17 : 0;
			$this->F_TOT18 = (isset($data->F_TOT18)) ? (int)$data->F_TOT18 : 0;
			$this->F_TOT19 = (isset($data->F_TOT19)) ? (int)$data->F_TOT19 : 0;
			$this->F_COD11 = (isset($data->F_COD11)) ? (int)$data->F_COD11 : '';
			$this->F_VAL11 = (isset($data->F_VAL11)) ? (float)$data->F_VAL11 : null;
			$this->F_PRA11 = (isset($data->F_PRA11)) ? (int)$data->F_PRA11 : null;
			$this->F_QTD11 = (isset($data->F_QTD11)) ? (int)$data->F_QTD11 : null;
			$this->F_SIT11 = (isset($data->F_SIT11)) ? trim($data->F_SIT11) : '';
			$this->F_COD12 = (isset($data->F_COD12)) ? (int)$data->F_COD12 : '';
			$this->F_VAL12 = (isset($data->F_VAL12)) ? (float)$data->F_VAL12 : null;
			$this->F_PRA12 = (isset($data->F_PRA12)) ? (int)$data->F_PRA12 : null;
			$this->F_QTD12 = (isset($data->F_QTD12)) ? (int)$data->F_QTD12 : null;
			$this->F_SIT12 = (isset($data->F_SIT12)) ? trim($data->F_SIT12) : '';
			$this->F_COD13 = (isset($data->F_COD13)) ? (int)$data->F_COD13 : '';
			$this->F_VAL13 = (isset($data->F_VAL13)) ? (float)$data->F_VAL13 : null;
			$this->F_PRA13 = (isset($data->F_PRA13)) ? (int)$data->F_PRA13 : null;
			$this->F_QTD13 = (isset($data->F_QTD13)) ? (int)$data->F_QTD13 : null;
			$this->F_SIT13 = (isset($data->F_SIT13)) ? trim($data->F_SIT13) : '';
			$this->F_COD14 = (isset($data->F_COD14)) ? (int)$data->F_COD14 : '';
			$this->F_VAL14 = (isset($data->F_VAL14)) ? (float)$data->F_VAL14 : null;
			$this->F_PRA14 = (isset($data->F_PRA14)) ? (int)$data->F_PRA14 : null;
			$this->F_QTD14 = (isset($data->F_QTD14)) ? (int)$data->F_QTD14 : null;
			$this->F_SIT14 = (isset($data->F_SIT14)) ? trim($data->F_SIT14) : '';
			$this->F_COD15 = (isset($data->F_COD15)) ? (int)$data->F_COD15 : '';
			$this->F_VAL15 = (isset($data->F_VAL15)) ? (float)$data->F_VAL15 : null;
			$this->F_PRA15 = (isset($data->F_PRA15)) ? (int)$data->F_PRA15 : null;
			$this->F_QTD15 = (isset($data->F_QTD15)) ? (int)$data->F_QTD15 : null;
			$this->F_SIT15 = (isset($data->F_SIT15)) ? trim($data->F_SIT15) : '';
			$this->F_COD16 = (isset($data->F_COD16)) ? (int)$data->F_COD16 : '';
			$this->F_VAL16 = (isset($data->F_VAL16)) ? (float)$data->F_VAL16 : null;
			$this->F_PRA16 = (isset($data->F_PRA16)) ? (int)$data->F_PRA16 : null;
			$this->F_QTD16 = (isset($data->F_QTD16)) ? (int)$data->F_QTD16 : null;
			$this->F_SIT16 = (isset($data->F_SIT16)) ? trim($data->F_SIT16) : '';
			$this->F_COD17 = (isset($data->F_COD17)) ? (int)$data->F_COD17 : '';
			$this->F_VAL17 = (isset($data->F_VAL17)) ? (float)$data->F_VAL17 : null;
			$this->F_PRA17 = (isset($data->F_PRA17)) ? (int)$data->F_PRA17 : null;
			$this->F_QTD17 = (isset($data->F_QTD17)) ? (int)$data->F_QTD17 : null;
			$this->F_SIT17 = (isset($data->F_SIT17)) ? trim($data->F_SIT17) : '';
			$this->F_COD18 = (isset($data->F_COD18)) ? (int)$data->F_COD18 : '';
			$this->F_VAL18 = (isset($data->F_VAL18)) ? (float)$data->F_VAL18 : null;
			$this->F_PRA18 = (isset($data->F_PRA18)) ? (int)$data->F_PRA18 : null;
			$this->F_QTD18 = (isset($data->F_QTD18)) ? (int)$data->F_QTD18 : null;
			$this->F_SIT18 = (isset($data->F_SIT18)) ? trim($data->F_SIT18) : '';
			$this->F_COD19 = (isset($data->F_COD19)) ? (int)$data->F_COD19 : '';
			$this->F_VAL19 = (isset($data->F_VAL19)) ? (float)$data->F_VAL19 : null;
			$this->F_PRA19 = (isset($data->F_PRA19)) ? (int)$data->F_PRA19 : null;
			$this->F_QTD19 = (isset($data->F_QTD19)) ? (int)$data->F_QTD19 : null;
			$this->F_SIT19 = (isset($data->F_SIT19)) ? trim($data->F_SIT19) : '';
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
			'F_TOT10' => $this->F_TOT10,
			'F_COD11' => $this->F_COD11, 
			'F_VAL11' => $this->F_VAL11, 
			'F_PRA11' => $this->F_PRA11, 
			'F_QTD11' => $this->F_QTD11, 
			'F_SIT11' => $this->F_SIT11, 
			'F_MES11' => $this->F_MES11, 
			'F_TOT11' => $this->F_TOT11, 
			'F_COD12' => $this->F_COD12, 
			'F_VAL12' => $this->F_VAL12, 
			'F_PRA12' => $this->F_PRA12, 
			'F_QTD12' => $this->F_QTD12, 
			'F_SIT12' => $this->F_SIT12, 
			'F_MES12' => $this->F_MES12, 
			'F_TOT12' => $this->F_TOT12, 
			'F_COD13' => $this->F_COD13, 
			'F_VAL13' => $this->F_VAL13, 
			'F_PRA13' => $this->F_PRA13, 
			'F_QTD13' => $this->F_QTD13, 
			'F_SIT13' => $this->F_SIT13, 
			'F_MES13' => $this->F_MES13, 
			'F_TOT13' => $this->F_TOT13, 
			'F_COD14' => $this->F_COD14, 
			'F_VAL14' => $this->F_VAL14, 
			'F_PRA14' => $this->F_PRA14, 
			'F_QTD14' => $this->F_QTD14, 
			'F_SIT14' => $this->F_SIT14,
			'F_MES14' => $this->F_MES14, 
			'F_TOT14' => $this->F_TOT14,  
			'F_COD15' => $this->F_COD15, 
			'F_VAL15' => $this->F_VAL15, 
			'F_PRA15' => $this->F_PRA15, 
			'F_QTD15' => $this->F_QTD15, 
			'F_SIT15' => $this->F_SIT15, 
			'F_MES15' => $this->F_MES15, 
			'F_TOT15' => $this->F_TOT15, 
			'F_COD16' => $this->F_COD16, 
			'F_VAL16' => $this->F_VAL16, 
			'F_PRA16' => $this->F_PRA16, 
			'F_QTD16' => $this->F_QTD16, 
			'F_SIT16' => $this->F_SIT16, 
			'F_MES16' => $this->F_MES16, 
			'F_TOT16' => $this->F_TOT16, 
			'F_COD17' => $this->F_COD17, 
			'F_VAL17' => $this->F_VAL17, 
			'F_PRA17' => $this->F_PRA17, 
			'F_QTD17' => $this->F_QTD17, 
			'F_SIT17' => $this->F_SIT17, 
			'F_MES17' => $this->F_MES17, 
			'F_TOT17' => $this->F_TOT17, 
			'F_COD18' => $this->F_COD18, 
			'F_VAL18' => $this->F_VAL18, 
			'F_PRA18' => $this->F_PRA18, 
			'F_QTD18' => $this->F_QTD18, 
			'F_SIT18' => $this->F_SIT18, 
			'F_MES18' => $this->F_MES18, 
			'F_TOT18' => $this->F_TOT18, 
			'F_COD19' => $this->F_COD19, 
			'F_VAL19' => $this->F_VAL19, 
			'F_PRA19' => $this->F_PRA19, 
			'F_QTD19' => $this->F_QTD19, 
			'F_SIT19' => $this->F_SIT19,
			'F_MES19' => $this->F_MES19, 
			'F_TOT19' => $this->F_TOT19
		);
	}

    public function getFMATRIC()
    {
        return $this->F_MATRIC;
    }

    public function setFMATRIC($F_MATRIC)
    {
        $this->F_MATRIC = $F_MATRIC;

        return $this;
    }

    public function getFCOD01()
    {
        return $this->F_COD01;
    }

    public function setFCOD01($F_COD01)
    {
        $this->F_COD01 = $F_COD01;

        return $this;
    }

    public function getFVAL01()
    {
        return $this->F_VAL01;
    }

    public function setFVAL01($F_VAL01)
    {
        $this->F_VAL01 = $F_VAL01;

        return $this;
    }

    public function getFPRA01()
    {
        return $this->F_PRA01;
    }

    public function setFPRA01($F_PRA01)
    {
        $this->F_PRA01 = $F_PRA01;

        return $this;
    }

    public function getFQTD01()
    {
        return $this->F_QTD01;
    }

    public function setFQTD01($F_QTD01)
    {
        $this->F_QTD01 = $F_QTD01;

        return $this;
    }

    public function getFSIT01()
    {
        return $this->F_SIT01;
    }

    public function setFSIT01($F_SIT01)
    {
        $this->F_SIT01 = $F_SIT01;

        return $this;
    }

    public function getFCOD02()
    {
        return $this->F_COD02;
    }

    public function setFCOD02($F_COD02)
    {
        $this->F_COD02 = $F_COD02;

        return $this;
    }

    public function getFVAL02()
    {
        return $this->F_VAL02;
    }

    public function setFVAL02($F_VAL02)
    {
        $this->F_VAL02 = $F_VAL02;

        return $this;
    }

    public function getFPRA02()
    {
        return $this->F_PRA02;
    }

    public function setFPRA02($F_PRA02)
    {
        $this->F_PRA02 = $F_PRA02;

        return $this;
    }

    public function getFQTD02()
    {
        return $this->F_QTD02;
    }

    public function setFQTD02($F_QTD02)
    {
        $this->F_QTD02 = $F_QTD02;

        return $this;
    }

    public function getFSIT02()
    {
        return $this->F_SIT02;
    }

    public function setFSIT02($F_SIT02)
    {
        $this->F_SIT02 = $F_SIT02;

        return $this;
    }

    public function getFCOD03()
    {
        return $this->F_COD03;
    }

    public function setFCOD03($F_COD03)
    {
        $this->F_COD03 = $F_COD03;

        return $this;
    }

    public function getFVAL03()
    {
        return $this->F_VAL03;
    }

    public function setFVAL03($F_VAL03)
    {
        $this->F_VAL03 = $F_VAL03;

        return $this;
    }

    public function getFPRA03()
    {
        return $this->F_PRA03;
    }

    public function setFPRA03($F_PRA03)
    {
        $this->F_PRA03 = $F_PRA03;

        return $this;
    }

    public function getFQTD03()
    {
        return $this->F_QTD03;
    }

    public function setFQTD03($F_QTD03)
    {
        $this->F_QTD03 = $F_QTD03;

        return $this;
    }

    public function getFSIT03()
    {
        return $this->F_SIT03;
    }

    public function setFSIT03($F_SIT03)
    {
        $this->F_SIT03 = $F_SIT03;

        return $this;
    }

    public function getFCOD04()
    {
        return $this->F_COD04;
    }

    public function setFCOD04($F_COD04)
    {
        $this->F_COD04 = $F_COD04;

        return $this;
    }

    public function getFVAL04()
    {
        return $this->F_VAL04;
    }

    public function setFVAL04($F_VAL04)
    {
        $this->F_VAL04 = $F_VAL04;

        return $this;
    }

    public function getFPRA04()
    {
        return $this->F_PRA04;
    }

    public function setFPRA04($F_PRA04)
    {
        $this->F_PRA04 = $F_PRA04;

        return $this;
    }

    public function getFQTD04()
    {
        return $this->F_QTD04;
    }

    public function setFQTD04($F_QTD04)
    {
        $this->F_QTD04 = $F_QTD04;

        return $this;
    }

    public function getFSIT04()
    {
        return $this->F_SIT04;
    }

    public function setFSIT04($F_SIT04)
    {
        $this->F_SIT04 = $F_SIT04;

        return $this;
    }

    public function getFCOD05()
    {
        return $this->F_COD05;
    }

    public function setFCOD05($F_COD05)
    {
        $this->F_COD05 = $F_COD05;

        return $this;
    }

    public function getFVAL05()
    {
        return $this->F_VAL05;
    }

    public function setFVAL05($F_VAL05)
    {
        $this->F_VAL05 = $F_VAL05;

        return $this;
    }

    public function getFPRA05()
    {
        return $this->F_PRA05;
    }

    public function setFPRA05($F_PRA05)
    {
        $this->F_PRA05 = $F_PRA05;

        return $this;
    }

    public function getFQTD05()
    {
        return $this->F_QTD05;
    }

    public function setFQTD05($F_QTD05)
    {
        $this->F_QTD05 = $F_QTD05;

        return $this;
    }

    public function getFSIT05()
    {
        return $this->F_SIT05;
    }

    public function setFSIT05($F_SIT05)
    {
        $this->F_SIT05 = $F_SIT05;

        return $this;
    }

    public function getFCOD06()
    {
        return $this->F_COD06;
    }

    public function setFCOD06($F_COD06)
    {
        $this->F_COD06 = $F_COD06;

        return $this;
    }

    public function getFVAL06()
    {
        return $this->F_VAL06;
    }

    public function setFVAL06($F_VAL06)
    {
        $this->F_VAL06 = $F_VAL06;

        return $this;
    }

    public function getFPRA06()
    {
        return $this->F_PRA06;
    }

    public function setFPRA06($F_PRA06)
    {
        $this->F_PRA06 = $F_PRA06;

        return $this;
    }

    public function getFQTD06()
    {
        return $this->F_QTD06;
    }

    public function setFQTD06($F_QTD06)
    {
        $this->F_QTD06 = $F_QTD06;

        return $this;
    }

    public function getFSIT06()
    {
        return $this->F_SIT06;
    }

    public function setFSIT06($F_SIT06)
    {
        $this->F_SIT06 = $F_SIT06;

        return $this;
    }

    public function getFCOD07()
    {
        return $this->F_COD07;
    }

    public function setFCOD07($F_COD07)
    {
        $this->F_COD07 = $F_COD07;

        return $this;
    }

    public function getFVAL07()
    {
        return $this->F_VAL07;
    }

    public function setFVAL07($F_VAL07)
    {
        $this->F_VAL07 = $F_VAL07;

        return $this;
    }

    public function getFPRA07()
    {
        return $this->F_PRA07;
    }

    public function setFPRA07($F_PRA07)
    {
        $this->F_PRA07 = $F_PRA07;

        return $this;
    }

    public function getFQTD07()
    {
        return $this->F_QTD07;
    }

    public function setFQTD07($F_QTD07)
    {
        $this->F_QTD07 = $F_QTD07;

        return $this;
    }

    public function getFSIT07()
    {
        return $this->F_SIT07;
    }

    public function setFSIT07($F_SIT07)
    {
        $this->F_SIT07 = $F_SIT07;

        return $this;
    }

    public function getFCOD08()
    {
        return $this->F_COD08;
    }

    public function setFCOD08($F_COD08)
    {
        $this->F_COD08 = $F_COD08;

        return $this;
    }

    public function getFVAL08()
    {
        return $this->F_VAL08;
    }

    public function setFVAL08($F_VAL08)
    {
        $this->F_VAL08 = $F_VAL08;

        return $this;
    }

    public function getFPRA08()
    {
        return $this->F_PRA08;
    }

    public function setFPRA08($F_PRA08)
    {
        $this->F_PRA08 = $F_PRA08;

        return $this;
    }

    public function getFQTD08()
    {
        return $this->F_QTD08;
    }

    public function setFQTD08($F_QTD08)
    {
        $this->F_QTD08 = $F_QTD08;

        return $this;
    }

    public function getFSIT08()
    {
        return $this->F_SIT08;
    }

    public function setFSIT08($F_SIT08)
    {
        $this->F_SIT08 = $F_SIT08;

        return $this;
    }

    public function getFCOD09()
    {
        return $this->F_COD09;
    }

    public function setFCOD09($F_COD09)
    {
        $this->F_COD09 = $F_COD09;

        return $this;
    }

    public function getFVAL09()
    {
        return $this->F_VAL09;
    }

    public function setFVAL09($F_VAL09)
    {
        $this->F_VAL09 = $F_VAL09;

        return $this;
    }

    public function getFPRA09()
    {
        return $this->F_PRA09;
    }

    public function setFPRA09($F_PRA09)
    {
        $this->F_PRA09 = $F_PRA09;

        return $this;
    }

    public function getFQTD09()
    {
        return $this->F_QTD09;
    }

    public function setFQTD09($F_QTD09)
    {
        $this->F_QTD09 = $F_QTD09;

        return $this;
    }

    public function getFSIT09()
    {
        return $this->F_SIT09;
    }

    public function setFSIT09($F_SIT09)
    {
        $this->F_SIT09 = $F_SIT09;

        return $this;
    }

    public function getFCOD10()
    {
        return $this->F_COD10;
    }

    public function setFCOD10($F_COD10)
    {
        $this->F_COD10 = $F_COD10;

        return $this;
    }

    public function getFVAL10()
    {
        return $this->F_VAL10;
    }

    public function setFVAL10($F_VAL10)
    {
        $this->F_VAL10 = $F_VAL10;

        return $this;
    }

    public function getFPRA10()
    {
        return $this->F_PRA10;
    }

    public function setFPRA10($F_PRA10)
    {
        $this->F_PRA10 = $F_PRA10;

        return $this;
    }

    public function getFQTD10()
    {
        return $this->F_QTD10;
    }

    public function setFQTD10($F_QTD10)
    {
        $this->F_QTD10 = $F_QTD10;

        return $this;
    }

    public function getFSIT10()
    {
        return $this->F_SIT10;
    }

    public function setFSIT10($F_SIT10)
    {
        $this->F_SIT10 = $F_SIT10;

        return $this;
    }

    public function getFCOD11()
    {
        return $this->F_COD11;
    }

    public function setFCOD11($F_COD11)
    {
        $this->F_COD11 = $F_COD11;

        return $this;
    }

    public function getFVAL11()
    {
        return $this->F_VAL11;
    }

    public function setFVAL11($F_VAL11)
    {
        $this->F_VAL11 = $F_VAL11;

        return $this;
    }

    public function getFPRA11()
    {
        return $this->F_PRA11;
    }

    public function setFPRA11($F_PRA11)
    {
        $this->F_PRA11 = $F_PRA11;

        return $this;
    }

    public function getFQTD11()
    {
        return $this->F_QTD11;
    }

    public function setFQTD11($F_QTD11)
    {
        $this->F_QTD11 = $F_QTD11;

        return $this;
    }

    public function getFSIT11()
    {
        return $this->F_SIT11;
    }

    public function setFSIT11($F_SIT11)
    {
        $this->F_SIT11 = $F_SIT11;

        return $this;
    }

    public function getFCOD12()
    {
        return $this->F_COD12;
    }

    public function setFCOD12($F_COD12)
    {
        $this->F_COD12 = $F_COD12;

        return $this;
    }

    public function getFVAL12()
    {
        return $this->F_VAL12;
    }

    public function setFVAL12($F_VAL12)
    {
        $this->F_VAL12 = $F_VAL12;

        return $this;
    }

    public function getFPRA12()
    {
        return $this->F_PRA12;
    }

    public function setFPRA12($F_PRA12)
    {
        $this->F_PRA12 = $F_PRA12;

        return $this;
    }

    public function getFQTD12()
    {
        return $this->F_QTD12;
    }

    public function setFQTD12($F_QTD12)
    {
        $this->F_QTD12 = $F_QTD12;

        return $this;
    }

    public function getFSIT12()
    {
        return $this->F_SIT12;
    }

    public function setFSIT12($F_SIT12)
    {
        $this->F_SIT12 = $F_SIT12;

        return $this;
    }

    public function getFCOD13()
    {
        return $this->F_COD13;
    }

    public function setFCOD13($F_COD13)
    {
        $this->F_COD13 = $F_COD13;

        return $this;
    }

    public function getFVAL13()
    {
        return $this->F_VAL13;
    }

    public function setFVAL13($F_VAL13)
    {
        $this->F_VAL13 = $F_VAL13;

        return $this;
    }

    public function getFPRA13()
    {
        return $this->F_PRA13;
    }

    public function setFPRA13($F_PRA13)
    {
        $this->F_PRA13 = $F_PRA13;

        return $this;
    }

    public function getFQTD13()
    {
        return $this->F_QTD13;
    }

    public function setFQTD13($F_QTD13)
    {
        $this->F_QTD13 = $F_QTD13;

        return $this;
    }

    public function getFSIT13()
    {
        return $this->F_SIT13;
    }

    public function setFSIT13($F_SIT13)
    {
        $this->F_SIT13 = $F_SIT13;

        return $this;
    }

    public function getFCOD14()
    {
        return $this->F_COD14;
    }

    public function setFCOD14($F_COD14)
    {
        $this->F_COD14 = $F_COD14;

        return $this;
    }

    public function getFVAL14()
    {
        return $this->F_VAL14;
    }

    public function setFVAL14($F_VAL14)
    {
        $this->F_VAL14 = $F_VAL14;

        return $this;
    }

    public function getFPRA14()
    {
        return $this->F_PRA14;
    }

    public function setFPRA14($F_PRA14)
    {
        $this->F_PRA14 = $F_PRA14;

        return $this;
    }

    public function getFQTD14()
    {
        return $this->F_QTD14;
    }

    public function setFQTD14($F_QTD14)
    {
        $this->F_QTD14 = $F_QTD14;

        return $this;
    }

    public function getFSIT14()
    {
        return $this->F_SIT14;
    }

    public function setFSIT14($F_SIT14)
    {
        $this->F_SIT14 = $F_SIT14;

        return $this;
    }

    public function getFCOD15()
    {
        return $this->F_COD15;
    }

    public function setFCOD15($F_COD15)
    {
        $this->F_COD15 = $F_COD15;

        return $this;
    }

    public function getFVAL15()
    {
        return $this->F_VAL15;
    }

    public function setFVAL15($F_VAL15)
    {
        $this->F_VAL15 = $F_VAL15;

        return $this;
    }

    public function getFPRA15()
    {
        return $this->F_PRA15;
    }

    public function setFPRA15($F_PRA15)
    {
        $this->F_PRA15 = $F_PRA15;

        return $this;
    }

    public function getFQTD15()
    {
        return $this->F_QTD15;
    }

    public function setFQTD15($F_QTD15)
    {
        $this->F_QTD15 = $F_QTD15;

        return $this;
    }

    public function getFSIT15()
    {
        return $this->F_SIT15;
    }

    public function setFSIT15($F_SIT15)
    {
        $this->F_SIT15 = $F_SIT15;

        return $this;
    }

    public function getFCOD16()
    {
        return $this->F_COD16;
    }

    public function setFCOD16($F_COD16)
    {
        $this->F_COD16 = $F_COD16;

        return $this;
    }

    public function getFVAL16()
    {
        return $this->F_VAL16;
    }

    public function setFVAL16($F_VAL16)
    {
        $this->F_VAL16 = $F_VAL16;

        return $this;
    }

    public function getFPRA16()
    {
        return $this->F_PRA16;
    }

    public function setFPRA16($F_PRA16)
    {
        $this->F_PRA16 = $F_PRA16;

        return $this;
    }

    public function getFQTD16()
    {
        return $this->F_QTD16;
    }

    public function setFQTD16($F_QTD16)
    {
        $this->F_QTD16 = $F_QTD16;

        return $this;
    }

    public function getFSIT16()
    {
        return $this->F_SIT16;
    }

    public function setFSIT16($F_SIT16)
    {
        $this->F_SIT16 = $F_SIT16;

        return $this;
    }

    public function getFCOD17()
    {
        return $this->F_COD17;
    }

    public function setFCOD17($F_COD17)
    {
        $this->F_COD17 = $F_COD17;

        return $this;
    }

    public function getFVAL17()
    {
        return $this->F_VAL17;
    }

    public function setFVAL17($F_VAL17)
    {
        $this->F_VAL17 = $F_VAL17;

        return $this;
    }

    public function getFPRA17()
    {
        return $this->F_PRA17;
    }

    public function setFPRA17($F_PRA17)
    {
        $this->F_PRA17 = $F_PRA17;

        return $this;
    }

    public function getFQTD17()
    {
        return $this->F_QTD17;
    }

    public function setFQTD17($F_QTD17)
    {
        $this->F_QTD17 = $F_QTD17;

        return $this;
    }

    public function getFSIT17()
    {
        return $this->F_SIT17;
    }

    public function setFSIT17($F_SIT17)
    {
        $this->F_SIT17 = $F_SIT17;

        return $this;
    }

    public function getFCOD18()
    {
        return $this->F_COD18;
    }

    public function setFCOD18($F_COD18)
    {
        $this->F_COD18 = $F_COD18;

        return $this;
    }

    public function getFVAL18()
    {
        return $this->F_VAL18;
    }

    public function setFVAL18($F_VAL18)
    {
        $this->F_VAL18 = $F_VAL18;

        return $this;
    }

    public function getFPRA18()
    {
        return $this->F_PRA18;
    }

    public function setFPRA18($F_PRA18)
    {
        $this->F_PRA18 = $F_PRA18;

        return $this;
    }

    public function getFQTD18()
    {
        return $this->F_QTD18;
    }

    public function setFQTD18($F_QTD18)
    {
        $this->F_QTD18 = $F_QTD18;

        return $this;
    }

    public function getFSIT18()
    {
        return $this->F_SIT18;
    }

    public function setFSIT18($F_SIT18)
    {
        $this->F_SIT18 = $F_SIT18;

        return $this;
    }

    public function getFCOD19()
    {
        return $this->F_COD19;
    }

    public function setFCOD19($F_COD19)
    {
        $this->F_COD19 = $F_COD19;

        return $this;
    }

    public function getFVAL19()
    {
        return $this->F_VAL19;
    }

    public function setFVAL19($F_VAL19)
    {
        $this->F_VAL19 = $F_VAL19;

        return $this;
    }

    public function getFPRA19()
    {
        return $this->F_PRA19;
    }

    public function setFPRA19($F_PRA19)
    {
        $this->F_PRA19 = $F_PRA19;

        return $this;
    }

    public function getFQTD19()
    {
        return $this->F_QTD19;
    }

    public function setFQTD19($F_QTD19)
    {
        $this->F_QTD19 = $F_QTD19;

        return $this;
    }

    public function getFSIT19()
    {
        return $this->F_SIT19;
    }

    public function setFSIT19($F_SIT19)
    {
        $this->F_SIT19 = $F_SIT19;

        return $this;
    }

    public function getFMES01()
    {
        return $this->F_MES01;
    }

    public function setFMES01($F_MES01)
    {
        $this->F_MES01 = $F_MES01;

        return $this;
    }

    public function getFMES02()
    {
        return $this->F_MES02;
    }

    public function setFMES02($F_MES02)
    {
        $this->F_MES02 = $F_MES02;

        return $this;
    }

    public function getFMES03()
    {
        return $this->F_MES03;
    }

    public function setFMES03($F_MES03)
    {
        $this->F_MES03 = $F_MES03;

        return $this;
    }

    public function getFMES04()
    {
        return $this->F_MES04;
    }

    public function setFMES04($F_MES04)
    {
        $this->F_MES04 = $F_MES04;

        return $this;
    }

    public function getFMES05()
    {
        return $this->F_MES05;
    }

    public function setFMES05($F_MES05)
    {
        $this->F_MES05 = $F_MES05;

        return $this;
    }

    public function getFMES06()
    {
        return $this->F_MES06;
    }

    public function setFMES06($F_MES06)
    {
        $this->F_MES06 = $F_MES06;

        return $this;
    }

    public function getFMES07()
    {
        return $this->F_MES07;
    }

    public function setFMES07($F_MES07)
    {
        $this->F_MES07 = $F_MES07;

        return $this;
    }

    public function getFMES08()
    {
        return $this->F_MES08;
    }

    public function setFMES08($F_MES08)
    {
        $this->F_MES08 = $F_MES08;

        return $this;
    }

    public function getFMES09()
    {
        return $this->F_MES09;
    }

    public function setFMES09($F_MES09)
    {
        $this->F_MES09 = $F_MES09;

        return $this;
    }

    public function getFMES10()
    {
        return $this->F_MES10;
    }

    public function setFMES10($F_MES10)
    {
        $this->F_MES10 = $F_MES10;

        return $this;
    }

    public function getDATAALT()
    {
        return $this->DATAALT;
    }

    public function setDATAALT($DATAALT)
    {
        $this->DATAALT = $DATAALT;

        return $this;
    }

    public function getHORAALT()
    {
        return $this->HORAALT;
    }

    public function setHORAALT($HORAALT)
    {
        $this->HORAALT = $HORAALT;

        return $this;
    }

    public function getUSUARIO()
    {
        return $this->USUARIO;
    }

    public function setUSUARIO($USUARIO)
    {
        $this->USUARIO = $USUARIO;

        return $this;
    }

    public function getFTOT01()
    {
        return $this->F_TOT01;
    }

    public function setFTOT01($F_TOT01)
    {
        $this->F_TOT01 = $F_TOT01;

        return $this;
    }

    public function getFTOT02()
    {
        return $this->F_TOT02;
    }

    public function setFTOT02($F_TOT02)
    {
        $this->F_TOT02 = $F_TOT02;

        return $this;
    }

    public function getFTOT03()
    {
        return $this->F_TOT03;
    }

    public function setFTOT03($F_TOT03)
    {
        $this->F_TOT03 = $F_TOT03;

        return $this;
    }

    public function getFTOT04()
    {
        return $this->F_TOT04;
    }

    public function setFTOT04($F_TOT04)
    {
        $this->F_TOT04 = $F_TOT04;

        return $this;
    }

    public function getFTOT05()
    {
        return $this->F_TOT05;
    }

    public function setFTOT05($F_TOT05)
    {
        $this->F_TOT05 = $F_TOT05;

        return $this;
    }

    public function getFTOT06()
    {
        return $this->F_TOT06;
    }

    public function setFTOT06($F_TOT06)
    {
        $this->F_TOT06 = $F_TOT06;

        return $this;
    }

    public function getFTOT07()
    {
        return $this->F_TOT07;
    }

    public function setFTOT07($F_TOT07)
    {
        $this->F_TOT07 = $F_TOT07;

        return $this;
    }

    public function getFTOT08()
    {
        return $this->F_TOT08;
    }

    public function setFTOT08($F_TOT08)
    {
        $this->F_TOT08 = $F_TOT08;

        return $this;
    }

    public function getFTOT09()
    {
        return $this->F_TOT09;
    }

    public function setFTOT09($F_TOT09)
    {
        $this->F_TOT09 = $F_TOT09;

        return $this;
    }

    public function getFTOT10()
    {
        return $this->F_TOT10;
    }

    public function setFTOT10($F_TOT10)
    {
        $this->F_TOT10 = $F_TOT10;

        return $this;
    }

    public function getRegisterIndex()
    {
        return $this->registerIndex;
    }

    public function setRegisterIndex($registerIndex)
    {
        $this->registerIndex = $registerIndex;

        return $this;
    }
}