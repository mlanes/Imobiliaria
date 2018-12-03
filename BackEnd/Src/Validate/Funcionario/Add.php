<?php

namespace Validate\Funcionario;

use Validate\Validate;

class Add extends Validate
{
    public function validate()
    {
        $this->required(['nm_primeiro', 'nm_meio', 'nm_ultimo', 'ic_status', 'dt_nascimento', 'cd_cpf', 'cd_categoria']);
    }
}