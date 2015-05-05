<?php
namespace application\models\File;

Class FileRegister {

	private $_table = 'bi_files_registers';

	public function fetchAll($file_id = null)
	{
		if ($file_id) {
			$this->db->where('reg_file_id', $file_id);
		}
		return $this->db->get($this->_table)->result();
			
	}

	public function getRegister($id)
	{
		$id = (int) $id;
		if ($id) {
			$this->db->where('reg_id', $id);
			$this->db->limit(1);
			$resultSet = $this->db->get($this->_table)
			if ($resultSet->num_rows()) {
				return $resultSet->row();
			}
		}

		return null;
	}

	public function saveRegister($id, $data)
	{
		$id = (int) $id;
		if ($id) {
			if (is_array($data) AND count($data)) {
				foreach ($data as $key => $value) {
					$this->db->set($key, $value);
				}
			}

			if ($this->getRegister($id)) {
				return $this->db->update($this->_table);	
			} else {
				return $this->db->insert($this->_table)->insert_id();
			}
		}

		return false;
	}
}