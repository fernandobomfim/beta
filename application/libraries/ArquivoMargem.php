<?php
namespace application\libraries\File;

Class FileMargin extends FileAbstract {

	private $_dataStructure = array(
		'regime_trabalho'		=> array('type' => 'A', 'size' => 40, 'start' => 111, 'end' => 150),
		'local_trabalho'		=> array('type' => 'A', 'size' => 40, 'start' => 151, 'end' => 190),
		'carteira_identidade'	=> array('type' => 'A', 'size' => 15, 'start' => 191, 'end' => 205),
	);

	public function __construct()
	{
		$structure = new FileStructure;
		$structure->setStructure('matricula', FileStructure::TYPE_NUMBER, 10, 0);
		$structure->setStructure('cpf', FileStructure::TYPE_NUMBER, 11, 10);
		$structure->setStructure('nome_servidor', FileStructure::TYPE_STRING, 50, 22, FileStructure::STRPAD_RIGHT_WITH_SPACES);
		$structure->setStructure('estabelecimento', FileStructure::TYPE_NUMBER, 3, 71);
		$structure->setStructure('orgao', FileStructure::TYPE_NUMBER, 3, 74, 76);
		$structure->setStructure('margem', FileStructure::TYPE_STRING, 10, 77, FileStructure::STRPAD_LEFT_ZEROS);
		$structure->setStructure('data_nascimento', FileStructure::TYPE_DATE, 8, 87);
		$structure->setStructure('data_admissao', FileStructure::TYPE_DATE, 8, 95);
		$structure->setStructure('data_fim_contrato', FileStructure::TYPE_DATE, 8, 103);
		$structure->setStructure('regime_trabalho', FileStructure::TYPE_STRING, 40, 111);
		$structure->setStructure('local_trabalho', FileStructure::TYPE_STRING, 40, 141);
		$structure->setStructure('carteira_identidade', FileStructure::TYPE_STRING, 15, 191);
		$this->setFileStructure($structure);
	}
}