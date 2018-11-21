<?php

require_once 'Core/Model.php';
require_once 'Interfaces/CrudInterface.php';

class CategoriaFuncionarioModel extends Model implements CrudInterface
{
    private $cd_categoria;
    private $nm_categoria;
    private $ic_status;
    private $nm_sigla;

    public function __construct()
    {
        parent::__construct();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function countItems()
    {
        try {
            $sql = "SELECT COUNT(*) as COUNT FROM tb_categoria_funcionario;";
            $stmt = $this->link->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            foreach ($result as $key => $value) {
                foreach ($value as $k => $v) {
                    $count = $v;
                }
            }
            return $count;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function insert()
    {
        try {
            $sql = "INSERT INTO user(name) VALUES(:name);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":name", "mateus");
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM tb_categoria_funcionario;";
            $stmt = $this->link->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function disable()
    {
        try {
            $sql = "UPDATE tb_categoria_funcionario SET ic_status = :ic_status WHERE cd_categoria = :cd_categoria;";
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
            $sql = "UPDATE tb_categoria_funcionario SET ic_status = :ic_status WHERE cd_categoria = :cd_categoria;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_categoria", $this->cd_categoria);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
