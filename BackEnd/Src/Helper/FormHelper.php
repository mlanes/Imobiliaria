<?php

use Core\Helper;

class FormHelper extends Helper
{
    private $id;
    private $type;
    private $value;
    private $checked;

    public function __construct()
    {
        parent::__construct();
    }

    public function control(String $fieldName, $options = null, $value = null)
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
        $this->value = '';
        $this->checked = '';
        if (isset($options['value'])) {
            $this->setValue($fieldName, $options['value']);
        }
        $this->setChecked($fieldName, $options, $value);
        // if (isset($_POST[$fieldName])) {
        //     if ($this->type != 'radio') {
        //         if (isset($options['value'])) {
        //             echo $_POST[$fieldName];
        //             $this->value = 'value="' . $_POST[$fieldName] . '"';
        //         }
        //     } else {
        //         $this->value = 'value="' . $options['value'] . '" ';
        //         if ($_POST[$fieldName] == $options['value']) {
        //             $checked = 'checked';
        //         }
        //     }
        // } elseif (isset($options['checked']) && $options['checked'] == true) {
        //     $checked = 'checked';
        // }

        
        $id = 'id="' . $this->id . '"';
        $input = "<input {$type} {$name} {$id} {$attr} " . $this->value . $this->checked . ">";

        $block = $label . $input;
        if (isset($options['block']) && $options['block'] != false) {
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

    public function radio($fieldName, $options, $value = null)
    {
        $element = '';
        foreach ($options as $key => $data) {
            $data['type'] = 'radio';
            $data['label'] = '';
            $element .= $this->control($fieldName, $data,  $value) . $data['text'];
        }
        return $element;
    }

    private function setValue($fieldName, $value = null)
    {
        if ($this->type == 'radio') {
            // echo 'Radio.';
            // var_dump($value);
            $this->value = $value;
        }
        else {
            if (isset($value)) {
                if (isset($_POST[$fieldName])) {
                    $this->value = $_POST[$fieldName];
                } else {
                    $this->value = $value;
                }
            } else {
                if (isset($_POST[$fieldName])) {
                    $this->value = $_POST[$fieldName];
                }
            }   
        }

        if (!empty($this->value)) {
            $this->value = 'value="' . $this->value . '"';
        }
    }

    public function setChecked($fieldName, $options = null, $value = null)
    {
        if ($this->type == 'radio') {
            // echo $options['value'];
            if (isset($_POST[$fieldName])) {
                // echo '<br>Valor do Post: ' . $_POST[$fieldName];
                // echo 'Rota 1';
                if ($_POST[$fieldName] == $options['value']) {
                    $this->checked = 'checked';
                }
            }
            elseif (isset($value) && $options['value'] == $value) {
                // echo 'Rota 3 ';
                $this->checked = 'checked';
            }
            elseif (isset($options['checked']) && $options['checked'] == true) {
                // echo 'Rota 2';
                $this->checked = 'checked';
            }
        }

        // if (isset($_POST[$fieldName])) {
        //     if ($this->type != 'radio') {
        //         if (isset($options['value'])) {
        //             echo $_POST[$fieldName];
        //             $this->value = 'value="' . $_POST[$fieldName] . '"';
        //         }
        //     } else {
        //         $this->value = 'value="' . $options['value'] . '" ';
        //         if ($_POST[$fieldName] == $options['value']) {
        //             $checked = 'checked';
        //         }
        //     }
        // } elseif (isset($options['checked']) && $options['checked'] == true) {
        //     $checked = 'checked';
        // }
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
        $ignoreList = array('checked', 'block', 'label', 'value');
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
