<?php

abstract class Database
{
    private $db_host = HOSTNAME;
    private $db_name = DB_NAME;
    private $db_user = DB_USER;
    private $db_password = DB_PASSWORD;

    protected static $link;

    public function __construct()
    {
        $this->link = $this->connect();
    }

    public function connect()
    {
        try {
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $link = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password, $options);
            return $link;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
