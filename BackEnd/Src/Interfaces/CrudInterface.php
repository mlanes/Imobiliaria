<?php

interface CrudInterface
{
    public function __construct();
    public function __set(String $name, $value);
    public function __get(String $name);
    public function countItems();
    public function insert();
    public function select();
    public function disable();
    public function enable();
}
