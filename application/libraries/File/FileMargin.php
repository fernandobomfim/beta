<?php
namespace application\libraries\File;

Class FileMargin extends FileAbstract {

	public $matricula;
	public $cpf;
	public $nomeServidor;
	public $estabelecimento;
	public $orgao;
	public $margem;
	public $dataNascimento;
    public $dataAdmissao;
    public $fimContrato;
	public $regimeTrabalho;
	public $localTrabalho;
	public $carteiraIdentidade;

	public function __construct()
	{
		$structure = new FileStructure;
		$structure->setField('matricula', FileStructure::TYPE_INTEGER, 0, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('cpf', FileStructure::TYPE_STRING, 10, 11);
		$structure->setField('nomeServidor', FileStructure::TYPE_STRING, 21, 50, FileStructure::STRPAD_RIGHT_WITH_SPACES);
		$structure->setField('estabelecimento', FileStructure::TYPE_INTEGER, 71, 3);
		$structure->setField('orgao', FileStructure::TYPE_SRING, 74, 3);
        $structure->setField('margem', FileStructure::TYPE_NUMBER, 77, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('dataNascimento', FileStructure::TYPE_DATE, 87, 8);
        $structure->setField('dataAdmissao', FileStructure::TYPE_DATE, 97, 8);
        $structure->setField('fimContrato', FileStructure::TYPE_DATE, 103, 8);
        $structure->setField('regimeTrabalho', FileStructure::TYPE_STRING, 111, 40);
        $structure->setField('localTrabalho', FileStructure::TYPE_STRING, 151, 40, FileStructure::STRPAD_RIGHT_WITH_SPACES);
        $structure->setField('carteiraIdentidade', FileStructure::TYPE_STRING, 191, 15, FileStructure::STRPAD_RIGHT_WITH_SPACES);
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

    public function getFimContrato()
    {
        return $this->fimContrato;
    }

    public function setFimContrato($fimContrato)
    {
        $this->fimContrato = $fimContrato;

        return $this;
    }

    public function getRegineTrabalho()
    {
        return $this->regineTrabalho;
    }

    public function setRegineTrabalho($regineTrabalho)
    {
        $this->regineTrabalho = $regineTrabalho;

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