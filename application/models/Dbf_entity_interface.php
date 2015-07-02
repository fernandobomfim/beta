<?php
namespace application\models;

Interface Dbf_entity_interface {

	public function hydrate($data);

	public function getArray();

}