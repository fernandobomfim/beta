<?php
namespace application\models;

Class Dbf_Cadfun_Entity implements Dbf_entity_interface {

	public $F_MATRIC = 0;
	public $F_NOME = '';
	public $F_CPF = '';
	public $F_IDENTIDA = '';
	public $F_CI_ORGAO = '';
	public $F_ELEITOR = '';
	public $F_PIS = '';
	public $F_DATANASC = '';
	public $F_EST_CIVI = '';
	public $F_PAI = '';
	public $F_MAE = '';
	public $F_RUA = '';
	public $F_BAIRRO = '';
	public $F_CIDADE = '';
	public $F_UF = '';
	public $F_CEP = '';
	public $F_FONE = '';
	public $F_ADMISSAO = '';
	public $F_DTQUINQ = '';
	public $F_SALARIO = 0;
	public $F_TIPOSALA = '';
	public $F_VINCULO = '';
	public $F_SITUACAO = 0;
	public $F_FUNCAO = 0;
	public $F_CNTCUSTO = 0;
    public $F_DTFIMCTA = '';

	public $registerIndex = null;

	public function hydrate($data)
	{
		if (!empty($data)) {
			$data = (is_array($data)) ? (object)$data : $data;
			$this->F_MATRIC = (isset($data->F_MATRIC)) ? (int)$data->F_MATRIC : '';
			$this->F_NOME =  (isset($data->F_NOME)) ? trim($data->F_NOME) : '';
			$this->F_CPF =  (isset($data->F_CPF)) ? (int)$data->F_CPF : '';
			$this->F_IDENTIDA =  (isset($data->F_IDENTIDA)) ? (int)trim($data->F_IDENTIDA) : '';
			$this->F_CI_ORGAO =  (isset($data->F_CI_ORGAO)) ? trim($data->F_CI_ORGAO) : '';
			$this->F_ELEITOR =  (isset($data->F_ELEITOR)) ? (int)$data->F_ELEITOR : '';
			$this->F_PIS =  (isset($data->F_PIS)) ? (int)$data->F_PIS : '';
			$this->F_DATANASC =  (isset($data->F_DATANASC)) ? trim($data->F_DATANASC) : '';
			$this->F_EST_CIVI =  (isset($data->F_EST_CIVI)) ? (int)$data->F_EST_CIVI : '';
			$this->F_PAI =  (isset($data->F_PAI)) ? trim($data->F_PAI) : '';
			$this->F_MAE =  (isset($data->F_MAE)) ? trim($data->F_MAE) : '';
			$this->F_RUA =  (isset($data->F_RUA)) ? trim($data->F_RUA) : '';
			$this->F_BAIRRO =  (isset($data->F_BAIRRO)) ? trim($data->F_BAIRRO) : '';
			$this->F_CIDADE =  (isset($data->F_CIDADE)) ? trim($data->F_CIDADE) : '';
			$this->F_UF =  (isset($data->F_UF)) ? trim($data->F_UF) : '';
			$this->F_CEP =  (isset($data->F_CEP)) ? trim($data->F_CEP) : '';
			$this->F_FONE =  (isset($data->F_FONE)) ? (int)$data->F_FONE : '';
			$this->F_ADMISSAO =  (isset($data->F_ADMISSAO)) ? trim($data->F_ADMISSAO) : '';
			$this->F_DTQUINQ =  (isset($data->F_DTQUINQ)) ? trim($data->F_DTQUINQ) : '';
			$this->F_SALARIO = (isset($data->F_SALARIO)) ? (float)$data->F_SALARIO : 0;
			$this->F_TIPOSALA =  (isset($data->F_TIPOSALA)) ? (int)$data->F_TIPOSALA : 0;
			$this->F_VINCULO =  (isset($data->F_VINCULO)) ? (int)$data->F_VINCULO : 0;
			$this->F_SITUACAO = (isset($data->F_SITUACAO)) ? (int)$data->F_SITUACAO : '';
			$this->F_FUNCAO = (isset($data->F_FUNCAO)) ? (int)$data->F_FUNCAO : 0;
			$this->F_CNTCUSTO = (isset($data->F_CNTCUSTO)) ? (int)$data->F_CNTCUSTO : 0;
            $this->F_DTFIMCTA = (isset($data->F_DTFIMCTA)) ? trim($data->F_DTFIMCTA) : 0;
		}
	}

	public function getArray($obj = FALSE)
    {
        $array = get_object_vars($this);
        unset($array['registerIndex']);
        return ($obj) ? (object)$array : $array;
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

    public function getFNOME()
    {
        return $this->F_NOME;
    }

    public function setFNOME($F_NOME)
    {
        $this->F_NOME = $F_NOME;
        return $this;
    }

    public function getFCPF()
    {
        return $this->F_CPF;
    }

    public function setFCPF($F_CPF)
    {
        $this->F_CPF = $F_CPF;
        return $this;
    }

    public function getFIDENTIDA()
    {
        return $this->F_IDENTIDA;
    }

    public function setFIDENTIDA($F_IDENTIDA)
    {
        $this->F_IDENTIDA = $F_IDENTIDA;
        return $this;
    }

    public function getFCIORGAO()
    {
        return $this->F_CI_ORGAO;
    }

    public function setFCIORGAO($F_CI_ORGAO)
    {
        $this->F_CI_ORGAO = $F_CI_ORGAO;
        return $this;
    }

    public function getFELEITOR()
    {
        return $this->F_ELEITOR;
    }

    public function setFELEITOR($F_ELEITOR)
    {
        $this->F_ELEITOR = $F_ELEITOR;
        return $this;
    }

    public function getFPIS()
    {
        return $this->F_PIS;
    }

    public function setFPIS($F_PIS)
    {
        $this->F_PIS = $F_PIS;
        return $this;
    }

    public function getFDATANASC()
    {
        return $this->F_DATANASC;
    }

    public function setFDATANASC($F_DATANASC)
    {
        $this->F_DATANASC = $F_DATANASC;
        return $this;
    }

    public function getFESTCIVI()
    {
        return $this->F_EST_CIVI;
    }

    public function setFESTCIVI($F_EST_CIVI)
    {
        $this->F_EST_CIVI = $F_EST_CIVI;
        return $this;
    }

    public function getFPAI()
    {
        return $this->F_PAI;
    }

    public function setFPAI($F_PAI)
    {
        $this->F_PAI = $F_PAI;
        return $this;
    }

    public function getFMAE()
    {
        return $this->F_MAE;
    }

    public function setFMAE($F_MAE)
    {
        $this->F_MAE = $F_MAE;
        return $this;
    }

    public function getFRUA()
    {
        return $this->F_RUA;
    }

    public function setFRUA($F_RUA)
    {
        $this->F_RUA = $F_RUA;
        return $this;
    }

    public function getFBAIRRO()
    {
        return $this->F_BAIRRO;
    }

    public function setFBAIRRO($F_BAIRRO)
    {
        $this->F_BAIRRO = $F_BAIRRO;
        return $this;
    }

    public function getFCIDADE()
    {
        return $this->F_CIDADE;
    }

    public function setFCIDADE($F_CIDADE)
    {
        $this->F_CIDADE = $F_CIDADE;
        return $this;
    }

    public function getFUF()
    {
        return $this->F_UF;
    }

    public function setFUF($F_UF)
    {
        $this->F_UF = $F_UF;
        return $this;
    }

    public function getFCEP()
    {
        return $this->F_CEP;
    }

    public function setFCEP($F_CEP)
    {
        $this->F_CEP = $F_CEP;
        return $this;
    }

    public function getFFONE()
    {
        return $this->F_FONE;
    }

    public function setFFONE($F_FONE)
    {
        $this->F_FONE = $F_FONE;
        return $this;
    }

    public function getFADMISSAO()
    {
        return $this->F_ADMISSAO;
    }

    public function setFADMISSAO($F_ADMISSAO)
    {
        $this->F_ADMISSAO = $F_ADMISSAO;
        return $this;
    }

    public function getFDTQUINQ()
    {
        return $this->F_DTQUINQ;
    }

    public function setFDTQUINQ($F_DTQUINQ)
    {
        $this->F_DTQUINQ = $F_DTQUINQ;
        return $this;
    }

    public function getFSALARIO()
    {
        return $this->F_SALARIO;
    }

    public function setFSALARIO($F_SALARIO)
    {
        $this->F_SALARIO = $F_SALARIO;
        return $this;
    }

    public function getFTIPOSALA()
    {
        return $this->F_TIPOSALA;
    }

    public function setFTIPOSALA($F_TIPOSALA)
    {
        $this->F_TIPOSALA = $F_TIPOSALA;
        return $this;
    }

    public function getFVINCULO()
    {
        return $this->F_VINCULO;
    }

    public function setFVINCULO($F_VINCULO)
    {
        $this->F_VINCULO = $F_VINCULO;
        return $this;
    }

    public function getFSITUACAO()
    {
        return $this->F_SITUACAO;
    }

    public function setFSITUACAO($F_SITUACAO)
    {
        $this->F_SITUACAO = $F_SITUACAO;
        return $this;
    }

    public function getFFUNCAO()
    {
        return $this->F_FUNCAO;
    }

    public function setFFUNCAO($F_FUNCAO)
    {
        $this->F_FUNCAO = $F_FUNCAO;
        return $this;
    }

    public function getFCNTCUSTO()
    {
        return $this->F_CNTCUSTO;
    }

    public function setFCNTCUSTO($F_CNTCUSTO)
    {
        $this->F_CNTCUSTO = $F_CNTCUSTO;
        return $this;
    }

    public function getFDTFIMCTA()
    {
        return $this->F_DTFIMCTA;
    }

    public function setFDTFIMCTA($F_DTFIMCTA)
    {
        $this->F_DTFIMCTA = $F_DTFIMCTA;
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