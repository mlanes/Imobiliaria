<?php

namespace Validate;

abstract class Validate
{
    private $errors;

    public function required($fields)
    {
        if (!is_array($fields)) {
            throw new Exception('Os campos precisam ser um array');
        }
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
    private function isEmpty($field)
    {
        if (empty($_POST[$field])) {
            $this->errors[$field] = 'Esse campo é obrigatório.';
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
}
