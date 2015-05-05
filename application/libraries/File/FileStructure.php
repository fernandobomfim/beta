<?php
namespace application\libraries\File;

Class FileStructure {

    const TYPE_STRING    = 'string';
    const TYPE_INTEGER   = 'integer';
    const TYPE_NUMBER    = 'float';
    const TYPE_DECIMAL   = 'float';
    const TYPE_FLOAT     = 'float';
    const TYPE_DOUBLE    = 'double';
    const TYPE_DATE      = 'date';
    const TYPE_DATETIME  = 'datetime';
    const TYPE_TIME      = 'time';
    const STRPAD_LEFT_WITH_SPACES   = "LEFT_SPACE";
    const STRPAD_LEFT_WTTH_ZEROS    = "LEFT_ZERO";
    const STRPAD_RIGHT_WITH_SPACES  = "RIGHT_SPACE";
    const STRPAD_RIGHT_WITH_ZEROS   = "RIGHT_ZERO";
    const STRPAD_BOTH_WTH_ZEROS     = "BOTH_ZERO";
    const STRPAD_BOTH_WOTH_SPACES   = "BOTH_ZERO";

    private $_fileStructure;

    public function __construct()
    {
    }

    public function getStructure()
    {
        return $this->_fileStructure;
    }

    public function setField($fieldName, $type, $indexStart, $size = 1, $pad = self::STRPAD_LEFT_WITH_SPACES)
    {
    	if ( !empty($fieldName) && !empty($type) && is_integer($indexStart) && $size >= 1 ) {
			$this->attachFieldIntoStructure((string)$fieldName, $type, (int)$indexStart, (int)$size, $pad);
		}
    }

    private function attachFieldIntoStructure($fieldName, $type, $indexStart, $size, $pad) {
        $field = new \stdClass();
        $field->fieldName = $fieldName;
        $field->fieldType = $type;
        $field->fieldIndex = $indexStart;
        $field->fieldSize = $size;
        $field->fieldPad = $pad;
        $this->_fileStructure[$fieldName] = $field;
    }
}