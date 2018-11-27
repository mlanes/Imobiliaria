<?php

require_once 'Core/Model.php';
require_once 'Interfaces/CrudInterface.php';

class AcessoModel extends Model implements CrudInterface
{
    private $cd_acesso;
    private $ic_status;
    private $nm_login;
    private $nm_password;
    private $cd_funcionario;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_acesso";
    }

    public function __set(String $name, $value)
    {
        $this->$name = $value;
    }

    public function __get(String $name)
    {
        return $this->$name;
    }

    public function countItems()
    {
        try {
            $sql = "SELECT COUNT(*) as COUNT FROM $this->table;";
            $stmt = $this->link->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ)->COUNT;
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function insert()
    {
    }

    public function update()
    {
    }

    public function list()
    {
        try {
            $sql = "SELECT * FROM $this->table;";
            $stmt = $this->link->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE cd_acesso = :cd_acesso;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_acesso", $this->cd_acesso);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function disable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_acesso = :cd_acesso;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 0);
            $stmt->bindValue(":cd_acesso", $this->cd_acesso);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function enable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_acesso = :cd_acesso;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_acesso", $this->cd_acesso);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function login()
    {
        try {
            $sql = "SELECT nm_login FROM $this->table WHERE ic_status = :ic_status AND nm_login = :nm_login AND nm_password = :nm_password LIMIT 1;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":nm_login", $this->nm_login);
            $stmt->bindValue(":nm_password", $this->nm_password);
            $stmt->execute();
            $result = $stmt->rowCount();
            if ($result >= 1) {
                return true;
            }
            else {
                return false;
            }
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
