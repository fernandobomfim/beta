<?php
namespace application\libraries\Dbase;

Class Dbase {

	private $_file;
	private $_mode;
	private $_identifier;
	private $_header;
	private $_numRecords;
	private $_numFields;

	public function __construct($_file = NULL, $_mode = 0)
	{
		if ($_file) {
			$this->setFile($_file);
			$this->setMode($_mode);
		}
	}

	public function setFile($file)
	{
		if (file_exists($file)) {
			$this->_file = $file;	
		} else {
			throw new Exception("Erro ao carregar arquivo DBF: O arquivo $file não existe!");
		}
		
	}

	public function setMode($mode)
	{
		$this->_mode = $mode;
	}

	public function open()
	{
		if (!$this->_identifier = dbase_open($this->_file, $this->_mode)) {
			throw new Exception("Erro ao abrir o arquivo DBF.");
		}
		
		$this->_header = dbase_get_header_info($this->_identifier);
		$this->_numFields = dbase_numfields($this->_identifier);
		$this->_numRecords = dbase_numrecords($this->_identifier);	
		return $this;
	}

	public function getIdentifier()
	{
		return $this->_identifier;
	}

	public function getHeader()
	{
		return $this->_header;
	}

	public function getNumFields()
	{
		return $this->_numFields;
	}

	public function getNumRecords()
	{
		return $this->_numRecords;
	}

	public function getRecord($recordNumber = NULL)
	{
		return dbase_get_record($this->_identifier, $recordNumber);
	}

	public function getRecordWithNames($recordNumber = NULL)
	{
		return dbase_get_record_with_names($this->_identifier, $recordNumber);
	}

	public function getCollection()
	{
		$_collection = array();

		for($a = 0; $a <= $this->_numRecords; $a++) {
			$_collection[$a] = (object) $this->getRecordWithNames($a);		
		}

		return $_collection;
	}

	public function close()
	{
		dbase_close($this->_identifier);
		return $this;
	}


}