<?php
Class File extends CI_Model {

	private $_table = 'bi_files';

	public function __construct()
	{
		parent::__construct();
	}

	public function fetchAll($file_type = null)
	{
		if ($file_type) {
			$this->db->where('file_type', $file_type);
		}
		$this->db->join('bi_files_types', 'type_id = file_type');
		return $this->db->get('bi_files')->result();
			
	}

	public function getFile($id)
	{
		$id = (int) $id;
		if ($id) {
			$this->db->where('file_id', $id);
			$this->db->limit(1);
			$resultSet = $this->db->get($this->_table);
			if ($resultSet->num_rows()) {
				return $resultSet->row();
			}
		}

		return null;
	}

	public function saveFile($id, $data)
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