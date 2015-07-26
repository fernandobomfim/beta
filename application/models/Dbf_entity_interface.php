<?php
namespace application\models;

Interface Dbf_entity_interface {

	public function hydrate($data);

	public function getArray();

	public function getRegisterIndex();

	public function setRegisterIndex($registerIndex);

}