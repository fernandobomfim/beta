<?php
class Orgs extends CI_Model {

	private $_table = 'bi_orgs';

	public function __construct()
	{
		parent::__construct();
		$session = $this->session->userdata('orgao'); 
		if (!isset($session->org_id) || empty($session->org_id)) {
			$orgaos = $this->fetchAll();
			if ($orgaos && count($orgaos)) {
				$this->session->set_userdata('orgao', $orgaos[0]);
			}
		}
	}

	public function fetchAll()
	{
		$this->db->order_by('org_name', 'ASC');
		return $this->db->get($this->_table)->result();
	}

	public function fetchAllForSelectInput()
	{
		$array = array();
		$collection = $this->fetchAll();
		foreach ($collection as $row) {
			$array[$row->org_id] = $row->org_name;
		}
		ksort($array);
		return $array;
	}

	public function getOrg($id)
	{
		$id = (int) $id;
		if ($id) {
			$this->db->where('org_id', $id);
			$this->db->limit(1);
			$resultSet = $this->db->get($this->_table);
			if ($resultSet->num_rows()) {
				return $resultSet->row();
			}
		}
		return null;
	}

	public function save($data = false)
	{
		if ($data) {
			return $this->db->insert($this->_table, $data);
		}
	}

	public function saveOrg($id, $data)
	{
		$id = (int) $id;
		if ($id) {
			if (is_array($data) AND count($data)) {
				foreach ($data as $key => $value) {
					$this->db->set($key, $value);
				}
			}

			if ($this->getFile($id)) {
				return $this->db->update($this->_table);	
			} else {
				return $this->db->insert($this->_table)->insert_id();
			}
		}

		return false;
	}
}
