<?php

use Core\Model;

class CategoriaImovelModel extends Model
{
    private $cd_categoria_imovel;
    private $ic_status;
    private $nm_categoria_imovel;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_categoria_imovel";
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
            $sql = "INSERT INTO $this->table (nm_categoria_imovel, ic_status) VALUES (:nm_categoria_imovel, :ic_status);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":nm_categoria_imovel", $this->nm_categoria_imovel);
            $stmt->bindValue(":ic_status", $this->ic_status);
            $stmt->execute();
            $this->lastId = $this->link->lastInsertId();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function update()
    {
        try {
            $sql = "UPDATE $this->table SET nm_categoria_imovel = :nm_categoria_imovel, ic_status = :ic_status WHERE cd_categoria_imovel = :cd_categoria_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_categoria_imovel", $this->cd_categoria_imovel);
            $stmt->bindValue(":nm_categoria_imovel", $this->nm_categoria_imovel);
            $stmt->bindValue(":ic_status", $this->ic_status);
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
            $sql = "SELECT * FROM $this->table WHERE cd_categoria_imovel = :cd_categoria_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_categoria_imovel", $this->cd_categoria_imovel);
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
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_categoria_imovel = :cd_categoria_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 0);
            $stmt->bindValue(":cd_categoria_imovel", $this->cd_categoria_imovel);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function enable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_categoria_imovel = :cd_categoria_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_categoria_imovel", $this->cd_categoria_imovel);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
