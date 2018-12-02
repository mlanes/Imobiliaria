<?php

namespace Validate\Imovel;

use Validate\Validate;

class Add extends Validate
{
    public function validate()
    {
        $this->required(['ic_status', 'qt_area_util', 'qt_area_total', 'vl_preco', 'ds_imovel', 'cd_proprietario']);
    }
}