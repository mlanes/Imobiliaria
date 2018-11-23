<?php

require_once 'Core/Model.php';
require_once 'Interfaces/CrudInterface.php';

class CategoriaFuncionarioModel extends Model implements CrudInterface
{
    private $cd_categoria;
    private $ic_status;
    private $nm_categoria;
    private $nm_sigla;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_categoria_funcionario";
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
        try {
            $sql = "INSERT INTO $this->table (nm_categoria, ic_status, nm_sigla) VALUES (:nm_categoria, :ic_status, :nm_sigla);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":nm_categoria", $this->nm_categoria);
            $stmt->bindValue(":ic_status", $this->ic_status);
            $stmt->bindValue(":nm_sigla", $this->nm_sigla);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function update()
    {
        try {
            $sql = "UPDATE $this->table SET nm_categoria = :nm_categoria, ic_status = :ic_status, nm_sigla = :nm_sigla WHERE cd_categoria = :cd_categoria;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_categoria", $this->cd_categoria);
            $stmt->bindValue(":nm_categoria", $this->nm_categoria);
            $stmt->bindValue(":ic_status", $this->ic_status);
            $stmt->bindValue(":nm_sigla", $this->nm_sigla);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
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
            $sql = "SELECT * FROM $this->table WHERE cd_categoria = :cd_categoria;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_categoria", $this->cd_categoria);
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
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_categoria = :cd_categoria;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 0);
            $stmt->bindValue(":cd_categoria", $this->cd_categoria);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function enable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_categoria = :cd_categoria;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_categoria", $this->cd_categoria);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
