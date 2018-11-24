<?php

require_once 'Core/Database.php';

class Model extends Database
{
    private $table;
    protected $lastId;

    public function __construct()
    {
        parent::__construct();
    }
}
