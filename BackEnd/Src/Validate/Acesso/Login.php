<?php

namespace Validate\Acesso;

use Validate\Validate;

class Login extends Validate
{
    public function validate()
    {
        $this->required(['nm_login', 'nm_password']);
    }
}
