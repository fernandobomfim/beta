<?php
namespace application\libraries\File;

Class FileStructureField {

    const TYPE_STRING    = 'string';
    const TYPE_NUMBER    = 'integer';
    const TYPE_DATE      = 'date';
    const STRPAD_LEFT_WITH_SPACES   = "LEFT_SPACE";
    const STRPAD_LEFT_WTTH_ZEROS    = "LEFT_ZERO";
    const STRPAD_RIGHT_WITH_SPACES  = "RIGHT_SPACE";
    const STRPAD_RIGHT_WITH_ZEROS   = "RIGHT_ZERO";
    const STRPAD_BOTH_WTH_ZEROS     = "BOTH_ZERO";
    const STRPAD_BOTH_WOTH_SPACES   = "BOTH_ZERO";

	private $_fieldName;
	private $_type;
	private $_indexStart;
    private $_size;
	private $_pad;
    private $_fileStructure;

    public function __construct() {
    }

	public function getFieldName()
    {
        return $this->_fieldName;
    }

    public function setFieldName($fieldName)
    {
        $this->_fieldName = $fieldName;

        return $this;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function setType($type)
    {
        $this->_type = $type;

        return $this;
    }

    public function getSize()
    {
        return $this->_size;
    }

    public function setSize($size)
    {
        $this->_size = $size;

        return $this;
    }

    public function getIndexStart()
    {
        return $this->_indexStart;
    }

    public function setIndexStart($index)
    {
        $this->_indexStart = $index;

        return $this;
    }

    public function getPad()
    {
        return $this->_pad;
    }

    public function setPad($pad)
    {
        $this->_pad = $pad;

        return $this;
    }

    public function setField($field, $type, $indexStart, $size = 1, $pad = null)
    {
    	if ( !empty($field) && !empty($type) && !empty($indexStart) && $size >= 1 ) {
			$this->attachIntoStructure((string)$field, $type, (int)$indexStart, (int)$size, $pad);
            return $this;
		}
    }

    private function attachIntoStructure($fieldName, $type, $indexStart, $size, $pad) {
        $field = new stdClass();
        $field->fieldName = $fieldName;
        $field->fieldType = $type;
        $field->fieldIndex = $indexStart;
        $field->fieldSize = $size;
        $field->fieldPad = $pad;
        $this->_fileStructure[$fieldName] = $field;
    }

    public function getStructure()
    {
        return $this->_fileStructure;
    }

    protected function applyPad($data, $size, $padType)
    {
        switch ($padType) {
            case 'LEFT_ZERO':
                return str_pad($data, $size, "0", STR_PAD_LEFT);
                break;
            case 'LEFT_SPACE':
                return str_pad($data, $size, " ", STR_PAD_LEFT);
                break;
            case 'RIGHT_ZERO':
                return str_pad($data, $size, "0", STR_PAD_RIGHT);
                break;
            case 'RIGHT_SPACE':
                return str_pad($data, $size, " ", STR_PAD_RIGHT);
                break;
            case 'BOTH_ZERO':
                return str_pad($data, $size, "0", STR_PAD_BOTH);
                break;
            case 'BOTH_SPACE':
                return str_pad($data, $size, " ", STR_PAD_BOTH);
                break;
            default:
                return NULL;
                break;
        }
    }
}