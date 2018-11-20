<?php

require_once 'Core/Model.php';

class CategoriaFuncionarioModel extends Model
{

    private $cd_categoria;
    private $nm_categoria;
    private $ic_status;
    private $nm_sigla;

    public function __construct() {
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

    public function countTotal() {
        try{
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
            $sql = "SELECT * FROM tb_categoria_funcionario;";
            $stmt = $this->link->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

}
