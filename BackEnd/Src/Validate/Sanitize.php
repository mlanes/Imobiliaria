<?php

namespace Validate;

class Sanitize {

    protected $sanitized = [];

    public function sanitized()
    {
        $posts = $_POST;

        foreach ($posts as $name => $value) {
            $this->sanitized[$name] = filter_var($_POST[$name], FILTER_SANITIZE_STRING);
        }
        return (object) $this->sanitized;
    }

}