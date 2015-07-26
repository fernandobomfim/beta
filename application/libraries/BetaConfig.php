<?php

class BetaConfig {
	
	public $orgId = null;
	public $orgName = null;
	public $orgCode = null;
	public $orgEstablishmentCode = null;
	public $orgDate = null;
	public $orgBasepath = null;

	public function __construct() 
	{
		$CI =& get_instance();
		$CI->load->model('Orgs');

		$session = $CI->session->userdata('orgao');
		if ($session) {
			$this->orgId = $session->org_id;
			$this->orgName = $session->org_name;
			$this->orgCode = $session->org_code;
			$this->orgEstablishmentCode = $session->org_establishment_code;
			$this->orgDate = $session->org_date;
			$this->orgBasepath = $session->org_basepath;
		}
	}
}