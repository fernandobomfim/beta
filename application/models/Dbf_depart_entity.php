<?php
namespace application\models;

Class Dbf_Depart_Entity implements Dbf_entity_interface {

	public $D_CODIGO = 0;
	public $D_NOME = 0;

	public function hydrate($data)
	{
		if (!empty($data)) {
			$data = (is_array($data)) ? (object)$data : $data;
			$this->D_CODIGO = (isset($data->D_CODIGO)) ? (int)$data->D_CODIGO : 0;
			$this->D_NOME = (isset($data->D_NOME)) ? trim($data->D_NOME) : '';
		}
	}

	public function getArray($obj = FALSE)
	{
		$array = get_object_vars($this);
		unset($array['registerIndex']);
        return ($obj) ? (object)$array : $array;
	}

	public function getRegisterIndex()
    {
        return $this->registerIndex;
    }

    public function setRegisterIndex($registerIndex)
    {
        $this->registerIndex = $registerIndex;

        return $this;
    }
    
}