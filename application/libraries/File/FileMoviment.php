<?php
namespace application\libraries\File;

Class FileMoviment extends FileAbstract {

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
		$structure->setField('matricula', FileStructure::TYPE_INTEGER, 0, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('cpf', FileStructure::TYPE_STRING, 10, 11);
		$structure->setField('nomeServidor', FileStructure::TYPE_STRING, 21, 50, FileStructure::STRPAD_RIGHT_WITH_SPACES);
		$structure->setField('estabelecimento', FileStructure::TYPE_STRING, 71, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
	    $structure->setField('orgao', FileStructure::TYPE_STRING, 74, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('codigoDesconto', FileStructure::TYPE_STRING, 77, 3);
        $structure->setField('valorDesconto', FileStructure::TYPE_DECIMAL, 80, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('prazoTotal', FileStructure::TYPE_INTEGER, 90, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('numeroParcelasPagas', FileStructure::TYPE_INTEGER, 93, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('dataInclusaoDesconto', FileStructure::TYPE_DATE, 96, 8);
        $structure->setField('periodo', FileStructure::TYPE_DATE, 104, 6);
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

    public function hydrate(array $data) {
        if (!empty($data)) {
            $this->matricula            = (!empty($data['matricula'])) ? (int)$data['matricula'] : null;
            $this->cpf                  = (!empty($data['cpf'])) ? $data['cpf'] : null;
            $this->nomeServidor         = (!empty($data['nomeServidor'])) ? trim($data['nomeServidor']) : null;
            $this->estabelecimento      = (!empty($data['estabelecimento'])) ? (int)trim($data['estabelecimento']) : null;
            $this->orgao                = (!empty($data['orgao'])) ? (int)trim($data['orgao']) : null;
            $this->codigoDesconto       = (!empty($data['codigoDesconto'])) ? (int)trim($data['codigoDesconto']) : null;
            $this->valorDesconto        = (!empty($data['valorDesconto'])) ? (float)$data['valorDesconto'] : null;
            $this->prazoTotal           = (!empty($data['prazoTotal'])) ? (int)$data['prazoTotal'] : null;
            $this->numeroParcelasPagas  = (!empty($data['numeroParcelasPagas'])) ? (int)$data['numeroParcelasPagas'] : null;
            $this->dataInclusaoDesconto = (!empty($data['dataInclusaoDesconto'])) ? trim($data['dataInclusaoDesconto']) : null;
            $this->periodo              = (!empty($data['periodo'])) ? trim($data['periodo']) : null;
        }
    }
}
