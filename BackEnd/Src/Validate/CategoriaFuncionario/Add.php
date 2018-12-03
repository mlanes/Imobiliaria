<?php

namespace Validate\CategoriaFuncionario;

use Validate\Validate;

class Add extends Validate
{
    public function validate()
    {
        $this->required(['nm_categoria', 'ic_status', 'nm_sigla']);
        $this->max(['nm_categoria' => 45, 'nm_sigla' => 45]);
    }
}
