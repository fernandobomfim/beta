<?php
Class FileFinanceMoviment extends FileAbstract {

    namespace application\libraries\File;

	public $matricula;
	public $cpf;
	public $nomeServidor;
	public $estabelecimento;
	public $orgao;
	public $codigoDesconto;
	public $valorDesconto;
	public $prazoTotal;
	public $numeroParcelasPagas;
	public $dataInclusaoDesconto;
	public $periodo;

	public function __construct()
	{
		$structure = new FileStructure;
		$structure->setField('matricula', FileStructure::TYPE_NUMBER, 0, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('cpf', FileStructure::TYPE_NUMBER, 10, 11);
		$structure->setField('nomeServidor', FileStructure::TYPE_STRING, 22, 50, FileStructure::STRPAD_RIGHT_WITH_SPACES);
		$structure->setField('estabelecimento', FileStructure::TYPE_NUMBER, 71, 3);
		$structure->setField('orgao', FileStructure::TYPE_NUMBER, 74, 3);
		$structure->setField('codigoDesconto', FileStructure::TYPE_NUMBER, 77, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('valorDesconto', FileStructure::TYPE_NUMBER, 80, 10);
		$structure->setField('prazoTotal', FileStructure::TYPE_NUMBER, 90, 3);
		$structure->setField('numeroParcelasPagas', FileStructure::TYPE_NUMBER, 93, 3);
		$structure->setField('dataInclusaoDesconto', FileStructure::TYPE_DATE, 96, 8);
		$structure->setField('periodo', FileStructure::TYPE_STRING, 104, 6);
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

    public function getCodigoDesconto()
    {
        return $this->codigoDesconto;
    }

    public function setCodigoDesconto($codigoDesconto)
    {
        $this->codigoDesconto = $codigoDesconto;

        return $this;
    }

    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    public function setValorDesconto($valorDesconto)
    {
        $this->valorDesconto = $valorDesconto;

        return $this;
    }

    public function getPrazoTotal()
    {
        return $this->prazoTotal;
    }

    public function setPrazoTotal($prazoTotal)
    {
        $this->prazoTotal = $prazoTotal;

        return $this;
    }

    public function getNumeroParcelasPagas()
    {
        return $this->numeroParcelasPagas;
    }

    public function setNumeroParcelasPagas($numeroParcelasPagas)
    {
        $this->numeroParcelasPagas = $numeroParcelasPagas;

        return $this;
    }

    public function getDataInclusaoDesconto()
    {
        return $this->dataInclusaoDesconto;
    }

    public function setDataInclusaoDesconto($dataInclusaoDesconto)
    {
        $this->dataInclusaoDesconto = $dataInclusaoDesconto;

        return $this;
    }

    public function getPeriodo()
    {
        return $this->periodo;
    }

    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }
}