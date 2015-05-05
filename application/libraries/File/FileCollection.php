<?php
namespace application\libraries\File;

Class FileCollection extends FileAbstract {

	private $_dataCollection = array();

	public function getCollection()
	{
		return $this->_dataCollection;
	}

	public function attachIntoCollection($fileObject = NULL)
	{
		if (is_object($fileObject) && !empty($fileObject)) {
			$this->_dataCollection[] = $fileObject;
		}
	}
}