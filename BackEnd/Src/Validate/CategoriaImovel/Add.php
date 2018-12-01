<?php

namespace Validate\CategoriaImovel;

use Validate\Validate;

class Add extends Validate
{
    public function validate()
    {
        $this->required(['nm_categoria_imovel', 'ic_status']);
    }
}
