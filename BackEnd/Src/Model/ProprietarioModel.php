<?php

use Core\Model;

class ProprietarioModel extends Model
{
    private $cd_proprietario;
    private $ic_status;
    private $cd_pessoa;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_proprietario";
    }

    public function __set(String $name, $value)
    {
        $this->$name = $value;
    }

    public function __get(String $name)
    {
        return $this->$name;
    }

    public function setIcStatus($value)
    {
        if ($value == "enable") {
            $this->ic_status = 1;
        }
        else {
            $this->ic_status = 0;
        }
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
        try {
            $sql = "INSERT INTO $this->table (ic_status, cd_pessoa) VALUES (:ic_status, :cd_pessoa);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", $this->ic_status);
            $stmt->bindValue(":cd_pessoa", $this->cd_pessoa);
            $stmt->execute();
            $this->lastId = $this->link->lastInsertId();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function update()
    {
        try {
            $sql = "UPDATE $this->table SET cd_pessoa = :cd_pessoa WHERE cd_proprietario = :cd_proprietario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_proprietario", $this->cd_proprietario);
            $stmt->bindValue(":cd_pessoa", $this->cd_pessoa);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function list()
    {
        try {
            $sql = "SELECT * FROM $this->table LEFT JOIN tb_pessoa ON $this->table.cd_pessoa = tb_pessoa.cd_pessoa;";
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
            $sql = "SELECT * FROM $this->table LEFT JOIN tb_pessoa ON $this->table.cd_pessoa = tb_pessoa.cd_pessoa WHERE cd_proprietario = :cd_proprietario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_proprietario", $this->cd_proprietario);
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
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_proprietario = :cd_proprietario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 0);
            $stmt->bindValue(":cd_proprietario", $this->cd_proprietario);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function enable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_proprietario = :cd_proprietario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_proprietario", $this->cd_proprietario);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
