<?php

namespace Validate\Acesso;

use Validate\Validate;

class Login extends Validate
{
    public function validate()
    {
        $this->required(['login', 'password']);
    }
}
