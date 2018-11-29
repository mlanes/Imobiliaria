<?php

namespace Validate;

abstract class Validate
{
    private $errors;

    public function required($fields)
    {
        $this->fieldsIsArray($fields);
        if (empty($fields)) {
            foreach ($fields as $key => $value) {
                $this->isEmpty($key);
            }
            return;
        }
        foreach ($fields as $key => $field) {
            $this->isEmpty($field);
        }
    }

    private function fieldsIsArray($fields)
    {
        if (!is_array($fields)) {
            throw new Exception('Os campos precisam ser um array.');
        }
    }

    private function isEmpty($field)
    {
        if (empty($_POST[$field])) {
            $this->errors[$field][] = 'Esse campo é obrigatório.';
        }
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function max($fields)
    {
        $this->fieldsIsArray($fields);
        foreach ($fields as $key => $length) {
            if (isset($_POST[$key])) {
                $count = strlen($_POST[$key]);
                if ($count > $length) {
                    $this->errors[$key][] = "O campo deve ter no máximo {$length} caracteres.";
                }
            }
        }
    }
}
