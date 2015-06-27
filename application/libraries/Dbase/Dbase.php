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
			$this->open();
		}
	}

	public function setFile($file)
	{
		try {
			if (file_exists($file)) {
				$this->_file = $file;
			} else {
				throw new \Exception("Erro ao carregar arquivo DBF: O arquivo ".$file." não existe!");
			}
		} catch (\Exception $e) {
			show_error($e->getMessage());
			exit();
		}
		
	}

	public function setMode($mode)
	{
		$this->_mode = $mode;
	}

	public function open()
	{	
		try {
			if ($this->_mode == 2 && !is_writable($this->_file)) {
				throw new \Exception("O arquivo DBF selecionado não possui permissão de escrita: ".$this->_file);
			}

			$this->_identifier = @dbase_open($this->_file, $this->_mode);
			if (!$this->_identifier) {
				throw new \Exception("Erro ao abrir o arquivo DBF: ".$this->_file);
			}
		} catch (\Exception $e) {
			 show_error($e->getMessage());
			 exit();
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

	public function getCollectionArray()
	{
		$_collection = array();

		for($a = 0; $a <= $this->_numRecords; $a++) {
			$_collection[$a] = $this->getRecordWithNames($a);
		}

		return $_collection;
	}

	public function close()
	{
		dbase_close($this->_identifier);
		return $this;
	}

	public function setRegister($registerIndex, $registerData)
	{
		if ($registerIndex && $registerData && is_int($registerIndex) && is_array($registerData)) {
			unset($registerData['deleted']);
			unset($registerData['key']);
			$registerDataValues = array_values($registerData);
			return dbase_replace_record($this->_identifier, $registerDataValues, $registerIndex);
		}
		return FALSE;
	}


}