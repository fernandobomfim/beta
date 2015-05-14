<?php
namespace application\libraries\File;

Class FileMargin extends FileAbstract {

	public $matricula;
	public $cpf;
	public $nomeServidor;
	public $estabelecimento;
	public $orgao;
	public $margem;
    public $margemCartao;
	public $dataNascimento;
    public $dataAdmissao;
    public $dataFimContrato;
	public $regimeTrabalho;
	public $localTrabalho;
	public $carteiraIdentidade;

	public function __construct()
	{
		$structure = new FileStructure;
		$structure->setField('matricula', FileStructure::TYPE_INTEGER, 0, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('cpf', FileStructure::TYPE_STRING, 10, 11, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('nomeServidor', FileStructure::TYPE_STRING, 21, 50, FileStructure::STRPAD_RIGHT_WITH_SPACES);
		$structure->setField('estabelecimento', FileStructure::TYPE_INTEGER, 71, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('orgao', FileStructure::TYPE_STRING, 74, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('margem', FileStructure::TYPE_NUMBER, 77, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('margemCartao', FileStructure::TYPE_NUMBER, 87, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('dataNascimento', FileStructure::TYPE_DATE, 97, 8);
        $structure->setField('dataAdmissao', FileStructure::TYPE_DATE, 105, 8);
        $structure->setField('dataFimContrato', FileStructure::TYPE_DATE, 113, 8, FileStructure::STRPAD_RIGHT_WITH_SPACES);
        $structure->setField('regimeTrabalho', FileStructure::TYPE_STRING, 121, 40, FileStructure::STRPAD_RIGHT_WITH_SPACES);
        $structure->setField('localTrabalho', FileStructure::TYPE_STRING, 161, 40, FileStructure::STRPAD_RIGHT_WITH_SPACES);
        $structure->setField('carteiraIdentidade', FileStructure::TYPE_STRING, 201, 15, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		parent::__construct($structure);
	}

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNomeServidor()
    {
        return $this->nomeServidor;
    }

    public function setNomeServidor($nomeServidor)
    {
        $this->nomeServidor = $nomeServidor;

        return $this;
    }

    public function getEstabelecimento()
    {
        return $this->estabelecimento;
    }

    public function setEstabelecimento($estabelecimento)
    {
        $this->estabelecimento = $estabelecimento;

        return $this;
    }

    public function getOrgao()
    {
        return $this->orgao;
    }

    public function setOrgao($orgao)
    {
        $this->orgao = $orgao;

        return $this;
    }

    public function getMargem()
    {
        return $this->margem;
    }

    public function setMargem($margem)
    {
        $this->margem = $margem;

        return $this;
    }

    public function getMargemCartao()
    {
        return $this->margemCartao;
    }

    public function setMargemCartao($margemCartao)
    {
        $this->margemCartao = $margemCartao;

        return $this;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getDataAdmissao()
    {
        return $this->dataAdmissao;
    }

    public function setDataAdmissao($dataAdmissao)
    {
        $this->dataAdmissao = $dataAdmissao;

        return $this;
    }

    public function getDataFimContrato()
    {
        return $this->dataFimContrato;
    }

    public function setDataFimContrato($dataFimContrato)
    {
        $this->dataFimContrato = $dataFimContrato;

        return $this;
    }

    public function getRegimeTrabalho()
    {
        return $this->regimeTrabalho;
    }

    public function setRegimeTrabalho($regimeTrabalho)
    {
        $this->regimeTrabalho = $regimeTrabalho;

        return $this;
    }

    public function getLocalTrabalho()
    {
        return $this->localTrabalho;
    }

    public function setLocalTrabalho($localTrabalho)
    {
        $this->localTrabalho = $localTrabalho;

        return $this;
    }

    public function getCarteiraIdentidade()
    {
        return $this->carteiraIdentidade;
    }

    public function setCarteiraIdentidade($carteiraIdentidade)
    {
        $this->carteiraIdentidade = $carteiraIdentidade;

        return $this;
    }
}