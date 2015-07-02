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
		$this->load->model('Orgs');
		$data['orgaos'] = $this->Orgs->fetchAll();

		$data['page'] = "configuracoes";
		$data['page_title'] = "Configurações";
		$data['page_icon'] = "fa-cog";
		$this->load->view('configuracoes', $data);
	}

	public function cadastrarOrgao()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('codigoOrgao', 'Código do Órgão', 'required');
		$this->form_validation->set_rules('codigoEstabelecimento', 'Código do Estabelecimento', 'required');
		$this->form_validation->set_rules('basepath', 'BasePath dos Arquivos DBF', 'required|trim|callback__checkBasePath');
		$this->form_validation->set_message('required', 'O campo <strong>%s</strong> é obrigatório!');
		if ($this->form_validation->run()) {
			$this->db->trans_begin();
			$this->load->model('Orgs');
			$orgData = array(
				'org_date' => date('Y-m-d H:i:s'),
				'org_name' => mb_strtoupper($this->input->post('nome'),'UTF-8'),
				'org_code' => $this->input->post('codigoOrgao'),
				'org_establishment_code' => $this->input->post('codigoEstabelecimento'),
				'org_basepath' => $this->input->post('basepath'),
			);
			$this->Orgs->save($orgData);

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->message->add('Houve um erro ao cadastrar o novo órgão.', 'error');
			} else {
				$this->db->trans_commit();
				$this->message->add('O novo órgão foi cadastrado com sucesso!', 'success');
				redirect('configuracoes');
			}
		} else {
			$data['page'] = "configuracoes";
			$data['page_title'] = "Configurações / Cadastrar Orgão";
			$data['page_icon'] = "fa-cog";
			$this->load->view('configuracoes_cadastrar_orgao', $data);	
		}
	}

	public function _checkBasePath($basepath)
	{
		$basepathFormatted = str_replace("\\", '/', $basepath);
		if (realpath($basepathFormatted)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('_checkBasePath', sprintf('O BasePath <strong>%s</strong> não é válido!', $basepath));
			return FALSE;
		}
	}

	public function setConfig($idConfig = false)
	{	
		if (!$idConfig) {
			$idConfig = (int) $this->input->post('orgao_id');
		}

		if ($idConfig) {
			$this->db->where('org_id', $idConfig);
			$config = $this->db->get('bi_orgs');
			if ($config && $config->num_rows()) {
				$this->session->set_userdata('orgao', $config->row());
			}
		}

		$redirect = $this->input->post('redirectTo');
		redirect($redirect);
	}

}
