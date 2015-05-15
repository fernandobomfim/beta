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
					throw new \Exception("ERRO NA ESTRUTURA DO ARQUIVO: ERRO NO CAMPO ".$key, 1);
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
                #return str_pad($data, $structure->fieldSize, "0", STR_PAD_LEFT);
                return $this->str_pad_unicode($data, $structure->fieldSize, "0", STR_PAD_LEFT);
                break;
            case 'LEFT_SPACE':
                #return str_pad($data, $structure->fieldSize, " ", STR_PAD_LEFT);
            	return $this->str_pad_unicode($data, $structure->fieldSize, " ", STR_PAD_LEFT);
                break;
            case 'RIGHT_ZERO':
                #return str_pad($data, $structure->fieldSize, "0", STR_PAD_RIGHT);
            	return $this->str_pad_unicode($data, $structure->fieldSize, "0", STR_PAD_RIGHT);
                break;
            case 'RIGHT_SPACE':
                #return str_pad($data, $structure->fieldSize, " ", STR_PAD_RIGHT);
                return $this->str_pad_unicode($data, $structure->fieldSize, " ", STR_PAD_RIGHT);
                break;
            case 'BOTH_ZERO':
                #return str_pad($data, $structure->fieldSize, "0", STR_PAD_BOTH);
                return $this->str_pad_unicode($data, $structure->fieldSize, "0", STR_PAD_BOTH);
                break;
            case 'BOTH_SPACE':
                #return str_pad($data, $structure->fieldSize, " ", STR_PAD_BOTH);
            	return $this->str_pad_unicode($data, $structure->fieldSize, " ", STR_PAD_BOTH);
                break;
            default:
                return NULL;
                break;
        }
    }

    static public function str_pad_unicode($str, $pad_len, $pad_str = ' ', $dir = STR_PAD_RIGHT)
    {
    	mb_internal_encoding('utf-8');

	    $str_len = mb_strlen($str);
	    $pad_str_len = mb_strlen($pad_str);
	    if (!$str_len && ($dir == STR_PAD_RIGHT || $dir == STR_PAD_LEFT)) {
	        $str_len = 1; // @debug
	    }
	    if (!$pad_len || !$pad_str_len || $pad_len <= $str_len) {
	        return $str;
	    }
	    
	    $result = null;
	    $repeat = ceil($str_len - $pad_str_len + $pad_len);
	    if ($dir == STR_PAD_RIGHT) {
	        $result = $str . str_repeat($pad_str, $repeat);
	        $result = mb_substr($result, 0, $pad_len);
	    } else if ($dir == STR_PAD_LEFT) {
	        $result = str_repeat($pad_str, $repeat) . $str;
	        $result = mb_substr($result, -$pad_len);
	    } else if ($dir == STR_PAD_BOTH) {
	        $length = ($pad_len - $str_len) / 2;
	        $repeat = ceil($length / $pad_str_len);
	        $result = mb_substr(str_repeat($pad_str, $repeat), 0, floor($length)) 
	                    . $str 
	                       . mb_substr(str_repeat($pad_str, $repeat), 0, ceil($length));
	    }
	    
	    return $result;
	}

    public function dateToFile($date) {
    	return date('dmY', strtotime($date));
    }

    public function dateToHuman() {

    }

}