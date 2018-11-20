<?php

require_once 'Core/Model.php';

class UserModel extends Model
{

    private $id;
    private $name;

    public function __construct() {
        parent::__construct();
    }

    public function insert() {
        try{
            $sql = "INSERT INTO user(name) VALUES(:name);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":name", "mateus");
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function select() {
        try{
            $sql = "SELECT * FROM user;";
            $stmt = $this->link->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

}
