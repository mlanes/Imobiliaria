<?php

namespace Core;

use Core\Database;

abstract class Model extends Database
{
    protected $table;
    protected $lastId;

    public function __construct()
    {
        parent::__construct();
    }
}
