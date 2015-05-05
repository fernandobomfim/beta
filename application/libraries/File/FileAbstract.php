<?php
namespace application\libraries\File;

Class FileAbstract {

	private $_file;
	private $_fileStructure;
	private $_dataCollection = array();
	private $_fleContents;
	public $_fileProcessedContents;

	const FILE_EOL = "\r\n";

	public function __construct(FileStructure $fileStructure = NULL)
	{
		if ($fileStructure) {
			$this->_fileStructure = $fileStructure;
		}
	}

	public function getFile()
	{
		return $this->_file;
	}

	public function setFile($file = NULL)
	{
		if (file_exists($file)) {
			$this->_file = $file;
			$this->readFile();
		}
		return $this;
	}

	public function getFileStructure()
	{
		return $this->_fileStructure->getStructure();
	}

	public function getCollection()
	{
		return $this->_dataCollection;
	}

	public function getFileContents()
	{
		return $this->_fileContents;
	}

	private function setFileContents($fileContents = NULL)
	{
		if (is_string($fileContents)) {
			
		}
		$this->_fileContents = $fileContents;
		return $this;
	}

	public function attachIntoCollection($data = NULL)
	{
		$collection = array();

		if (is_object($data) && !empty($data)) {
			foreach ($this->getFileStructure() as $key => $value) {
				if (isset($data->$key) && array_key_exists($value->fieldName, $this->getFileStructure())) {
			 		$collection[$value->fieldName] = $data->$key;
				} else {
					throw new \Exception("ERRO NA ESTRUTURA DO ARQIUVO!", 1);
				}
			}
			$this->_dataCollection[] = $collection;
		}
	}

	private function readFile()
	{
		$file = file($this->_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		if ($file && is_array($file)) {
			$this->setFileContents($file);
		}
		return $this;
	}

	public function renderFile($returnContent = FALSE)
	{
		$content = '';
		if ($this->_fileProcessedContents) {
			foreach ($this->_fileProcessedContents as $line) {
				$content .= $line;
			}

			if ($returnContent == TRUE) {
				return $content;
			}

			echo $content;
		}
	}

	public function createFile()
	{
		if (count($this->getCollection() > 0)) {
			$this->_fileProcessedContents = null;
			foreach ($this->getCollection() as $data) {
				$lineBuffer = '';
				foreach ($this->getFileStructure() as $key => $structure) {
					$dataLine = isset($data[$key]) ? $data[$key] : '';
					$lineBuffer .= $this->applyStrPad($dataLine, $structure);
				}
				$this->_fileProcessedContents[] = $lineBuffer . self::FILE_EOL;
			}
		}

		return $this;
	}

	public function processFile($file = NULL)
	{	
		if (count($this->_fileContents)) {
			foreach ($this->_fileContents as $line) {
				$processedLine = $this->processFileLine($line);
				$this->attachIntoCollection($processedLine);
			}
		}
		return $this;
	}

	private function processFileLine($line)
	{
		if ($line && !empty($line)) {
			$processedLine = new \StdClass();
			foreach ($this->getFileStructure() as $structure) {
				echo $structure->fieldName.": ".$structure->fieldSize."/n";
				$fieldName = $structure->fieldName;
				$processedLine->$fieldName = trim(substr($line, $structure->fieldIndex, $structure->fieldSize));
			}
			return $processedLine;
		}
	}

	private function applyStrPad($data, $structure)
    {
        switch ($structure->fieldPad) {
            case 'LEFT_ZERO':
                return str_pad($data, $structure->fieldSize, "0", STR_PAD_LEFT);
                break;
            case 'LEFT_SPACE':
                return str_pad($data, $structure->fieldSize, " ", STR_PAD_LEFT);
                break;
            case 'RIGHT_ZERO':
                return str_pad($data, $structure->fieldSize, "0", STR_PAD_RIGHT);
                break;
            case 'RIGHT_SPACE':
                return str_pad($data, $structure->fieldSize, " ", STR_PAD_RIGHT);
                break;
            case 'BOTH_ZERO':
                return str_pad($data, $structure->fieldSize, "0", STR_PAD_BOTH);
                break;
            case 'BOTH_SPACE':
                return str_pad($data, $structure->fieldSize, " ", STR_PAD_BOTH);
                break;
            default:
                return NULL;
                break;
        }
    }

}