<?php

use Core\Helper;

class FormHelper extends Helper
{
    private $type;

    public function __construct()
    {
        parent::__construct();
    }

    public function control(String $fieldName, $options = null)
    {
        $this->setType($options);

        $this->label($options['label']);

        $input = '<input type="' . $this->type .'" name="'. $fieldName . '"';
        $value = '';
        if (isset($_POST[$fieldName])) {
            $value = 'value="' . $_POST[$fieldName] . '"';
        }
        $input .= $value . '>';
        return $input;
    }

    public function label($options)
    {
        $text = '';
        $class = '';
        $for = '';
        $text = $options['text'];
        foreach ($options as $key => $value) {
            echo $key;
        }
    }

    private function setType($options)
    {
        if ($this->isArray($options)) {
            foreach ($options as $key => $value) {
                if ($key == 'type') {
                    $this->type = $value;
                }
            }
            return;
        }
    }

    private function isArray($options)
    {
        return is_array($options);
    }
}
