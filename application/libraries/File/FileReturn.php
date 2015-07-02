<?php
namespace application\libraries\File;

Class FileReturn extends FileAbstract{

    public $matricula;
	public $cpf;
	public $nomeServidor;
	public $estabelecimento;
    public $orgao;
	public $codigoDesconto;
	public $valorDescontoPrevisto;
    public $valorDescontoRealizado;
	public $motivoNaoDesconto;
    public $situacao;
    public $periodo;

	public function __construct()
	{
		$structure = new FileStructure;
		$structure->setField('matricula', FileStructure::TYPE_STRING, 0, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
		$structure->setField('cpf', FileStructure::TYPE_STRING, 10, 11);
		$structure->setField('nomeServidor', FileStructure::TYPE_STRING, 21, 50, FileStructure::STRPAD_RIGHT_WITH_SPACES);
		$structure->setField('estabelecimento', FileStructure::TYPE_STRING, 71, 3, FileStructure::STRPAD_RIGHT_WITH_ZEROS);
		$structure->setField('orgao', FileStructure::TYPE_STRING, 74, 3, FileStructure::STRPAD_RIGHT_WITH_ZEROS);
        $structure->setField('codigoDesconto', FileStructure::TYPE_STRING, 77, 3, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('valorDescontoPrevisto', FileStructure::TYPE_STRING, 80, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('valorDescontoRealizado', FileStructure::TYPE_STRING, 90, 10, FileStructure::STRPAD_LEFT_WTTH_ZEROS);
        $structure->setField('motivoNaoDesconto', FileStructure::TYPE_STRING, 100, 100, FileStructure::STRPAD_RIGHT_WITH_SPACES);
        $structure->setField('situacao', FileStructure::TYPE_STRING, 200, 1);
        $structure->setField('periodo', FileStructure::TYPE_STRING, 201, 6);
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

    public function getValorDescontoPrevisto()
    {
        return $this->valorDescontoPrevisto;
    }

    public function setValorDescontoPrevisto($valorDescontoPrevisto)
    {
        $this->valorDescontoPrevisto = number_format($valorDescontoPrevisto, 2, '.', '');

        return $this;
    }

    public function getValorDescontoRealizado()
    {
        return $this->valorDescontoRealizado;
    }

    public function setValorDescontoRealizado($valorDescontoRealizado)
    {
        $this->valorDescontoRealizado = number_format($valorDescontoRealizado, 2, '.', '');

        return $this;
    }

    public function getMotivoNaoDesconto()
    {
        return $this->motivoNaoDesconto;
    }

    public function setMotivoNaoDesconto($motivoNaoDesconto)
    {
        $this->motivoNaoDesconto = $motivoNaoDesconto;

        return $this;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

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