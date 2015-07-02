<?php
namespace application\models;

Class Dbf_Movger_Entity implements Dbf_entity_interface {

	public $O_FUNCIONA = 0;
	public $O_CNTCUSTO = 0;
	public $O_RENDIMEN = 0;
	public $O_VALOR = 0;
	public $O_PRAZO = 0;
	public $O_REFERENC = '';
	public $O_FLAG = '';
	public $O_DATA = '';
	public $O_SEMANA = '';
	public $O_CGC = '';
	public $DATAALT = '';
	public $HORAALT = '';
	public $USUARIO = '';
	public $O_QTDPARCF = '';
	public $O_TOTPARCF = '';
	public $O_TAREFA = '';
	public $O_DATASERV = '';
	public $O_PRODUCAO = '';
	public $O_PRECO = '';
	public $O_UNIDADE = '';
	public $O_UNID02 = '';
	public $O_UNID05 = '';
	public $O_UNID08 = '';
	public $O_CNT02 = '';
	public $O_CNT05 = '';
	public $O_CNT08 = '';

	public $registerIndex = null;

	public function hydrate($data)
	{
		if (!empty($data)) {
			$data = (is_array($data)) ? (object)$data : $data;
			$this->O_FUNCIONA 	= (isset($data->O_FUNCIONA)) ? (int)$data->O_FUNCIONA : '';
			$this->O_CNTCUSTO 	= (isset($data->O_CNTCUSTO) ? (int)$data->O_CNTCUSTO : '');
			$this->O_RENDIMEN 	= (isset($data->O_RENDIMEN) ? (int)$data->O_RENDIMEN : '');
			$this->O_VALOR 		= (isset($data->O_VALOR) ? $data->O_VALOR : '');
			$this->O_PRAZO 		= (isset($data->O_PRAZO) ? (int)$data->O_PRAZO : '');
			$this->O_REFERENC 	= (isset($data->O_REFERENC) ? $data->O_REFERENC : '');
			$this->O_FLAG 		= (isset($data->O_FLAG) ? $data->O_FLAG : '');
			$this->O_DATA 		= (isset($data->O_DATA) ? $data->O_DATA : '');
			$this->O_SEMANA 	= (isset($data->O_SEMANA) ? $data->O_SEMANA : '');
			$this->O_CGC 		= (isset($data->O_CGC) ? $data->O_CGC : '');
			$this->DATAALT 		= (isset($data->DATAALT) ? $data->DATAALT : '');
			$this->HORAALT 		= (isset($data->HORAALT) ? $data->HORAALT : '');
			$this->USUARIO 		= (isset($data->USUARIO) ? $data->USUARIO : '');
			$this->O_QTDPARCF 	= (isset($data->O_QTDPARCF) ? (int)$data->O_QTDPARCF : '');
			$this->O_TOTPARCF 	= (isset($data->O_TOTPARCF) ? (int)$data->O_TOTPARCF : '');
			$this->O_TAREFA 	= (isset($data->O_TAREFA) ? $data->O_TAREFA : '');
			$this->O_QTDPARCF 	= (isset($data->O_QTDPARCF) ? (int)$data->O_QTDPARCF : '');
			$this->O_TOTPARCF 	= (isset($data->O_TOTPARCF) ? (int)$data->O_TOTPARCF : '');
			$this->O_PRECO 		= (isset($data->O_PRECO) ? $data->O_PRECO : '');
			$this->O_UNIDADE 	= (isset($data->O_UNIDADE) ? $data->O_UNIDADE : '');
			$this->O_UNID02 	= (isset($data->O_UNID02) ? $data->O_UNID02 : '');
			$this->O_UNID05 	= (isset($data->O_UNID05) ? $data->O_UNID05 : '');
			$this->O_UNID08 	= (isset($data->O_UNID08) ? $data->O_UNID08 : '');
			$this->O_CNT02 		= (isset($data->O_CNT02) ? $data->O_CNT02 : '');
			$this->O_CNT05 		= (isset($data->O_CNT05) ? $data->O_CNT05 : '');
			$this->O_CNT08 		= (isset($data->O_CNT08) ? $data->O_CNT08 : '');
			
		}
	}

	public function getArray($obj = FALSE)
	{
		return array(
			'O_FUNCIONA' => $this->O_FUNCIONA,
			'O_CNTCUSTO' => $this->O_CNTCUSTO,
			'O_RENDIMEN' => $this->O_RENDIMEN,
			'O_VALOR' => $this->O_VALOR,
			'O_PRAZO' => $this->O_PRAZO,
			'O_REFERENC' => $this->O_REFERENC,
			'O_FLAG' => $this->O_FLAG,
			'O_DATA' => $this->O_DATA,
			'O_SEMANA' => $this->O_SEMANA,
			'O_CGC' => $this->O_CGC,
			'DATAALT' => $this->DATAALT,
			'HORAALT' => $this->HORAALT,
			'USUARIO' => $this->USUARIO,
			'O_QTDPARCF' => $this->O_QTDPARCF,
			'O_TOTPARCF' => $this->O_TOTPARCF,
			'O_TAREFA' => $this->O_TAREFA,
			'O_DATASERV' => $this->O_DATASERV,
			'O_PRODUCAO' => $this->O_PRODUCAO,
			'O_PRECO' => $this->O_PRECO,
			'O_UNIDADE' => $this->O_UNIDADE,
			'O_UNID02' => $this->O_UNID02,
			'O_UNID05' => $this->O_UNID05,
			'O_UNID08' => $this->O_UNID08,
			'O_CNT02' => $this->O_CNT02,
			'O_CNT05' => $this->O_CNT05,
			'O_CNT08' => $this->O_CNT08
		);
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