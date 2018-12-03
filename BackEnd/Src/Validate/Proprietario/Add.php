<?php

namespace Validate\Proprietario;

use Validate\Validate;

class Add extends Validate
{
    public function validate()
    {
        $this->required(['nm_primeiro', 'nm_meio', 'nm_ultimo', 'dt_nascimento', 'cd_cpf']);
    }
}