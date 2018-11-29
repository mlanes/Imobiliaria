<?php

use Core\Helper;

class FormHelper extends Helper
{
    private $id;
    private $type;

    public function __construct()
    {
        parent::__construct();
    }

    public function control(String $fieldName, $options = null)
    {
        $this->setType($options);
        $this->setId($fieldName, $options);

        $attr = $this->setAttributes($options);
        $label = '';

        if ($options['label'] != false) {
            $label = $this->label($fieldName, $options['label']);
        }

        $type = 'type="' . $this->type . '"';
        $name = 'name="'. $fieldName . '"';
        $value = '';
        $checked = '';
        
        if (isset($_POST[$fieldName])) {
            if ($this->type != 'radio') {
                $value = 'value="' . $_POST[$fieldName] . '"';
            } else {
                $value = 'value="' . $options['value'] . '" ';
                if ($_POST[$fieldName] == $options['value']) {
                    $checked = 'checked';
                }
            }
        } elseif (isset($options['checked']) && $options['checked'] == true) {
            $checked = 'checked';
        }
        
        $id = 'id="' . $this->id . '"';
        $input = "<input {$type} {$name} {$id} {$attr} {$value} 
        {$checked}>";

        $block = $label . $input;
        if (!isset($options['block'])) {
            $block = '<div class="form-group">' . $block . '</div>';
        }
        return $block;
    }

    public function label($fieldName, $labelOptions)
    {
        $text = $fieldName;
        $class = '';
        $for = '';

        if (isset($this->id)) {
            $for = 'for="' . $this->id . '"';
        }

        if (isset($labelOptions['text']) && $labelOptions['text'] != false) {
            $text = $labelOptions['text'];
        }

        if (isset($labelOptions['class'])) {
            $class = 'class="' . $labelOptions['class'] . '"';
        }

        if (isset($labelOptions['for'])) {
            $for = 'for="' . $labelOptions['for'] . '"';
        }

        $label = "<label {$class} {$for}>{$text}</label>";
        return $label;
    }

    public function radio($fieldName, $options)
    {
        $element = '';
        foreach ($options as $key => $value) {
            $value['type'] = 'radio';
            $value['label'] = '';
            $element .= $this->control($fieldName, $value) . $value['text'];
        }
        return $element;
    }

    private function setId($name, $options)
    {
        $id = '';
        foreach ($options as $key => $value) {
            if ($key == 'id') {
                $id = $value;
            }
        }
        if (isset($id)) {
            $id = $name;
        }
        $this->id = $id;
    }

    private function setAttributes($options)
    {
        $ignoreList = array('checked', 'block', 'label');
        $attr = '';
        foreach ($options as $key => $value) {
            if (!$this->isArray($value)) {
                $x = 0;
                for ($i = 0;$i < count($ignoreList); $i++) {
                    if ($key == $ignoreList[$i]) {
                        $x++;
                    }
                }
                if ($x == 0) {
                    $attr .= $key . '="' . $value . '"';
                    if ($key == 'id') {
                        $this->id = $value;
                    }
                }
            }
        }
        return $attr;
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
