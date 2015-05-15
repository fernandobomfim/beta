<?php
use application\libraries\Xbase\XBaseTable;
use application\libraries\Xbase\XBaseWritableTable;

class Configuracoes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->config('beta_informatica', TRUE);
		$this->BIConfig = (object) $this->config->config['beta_informatica'];
		$this->BIConfig->estabelecimento = 1;
		$this->BIConfig->orgao = 2;

		$this->load->helper('form_helper');
	}

	public function index()
	{
		$data['page'] = "configuracoes";
		$data['page_title'] = "Configurações";
		$data['page_icon'] = "fa-cog";
		$this->load->view('configuracoes', $data);
	}

	public function test()
	{
		$filename = realpath("dbf/CADFUN.dbf");
		$xbase = new XBaseWritableTable($filename);
		$xbase->openWrite();

		var_dump($xbase->getColumns());

	}
}