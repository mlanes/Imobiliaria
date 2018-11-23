<?php
require_once 'Core/Model.php';
require_once 'Interfaces/CrudInterface.php';

class FuncionarioModel extends Model implements CrudInterface
{
    private $cd_funcionario;
    private $ic_status;
    private $cd_categoria;
    private $cd_creci;
    private $cd_pessoa;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_funcionario";
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
            $sql = "INSERT INTO $this->table (ic_status, cd_categoria, cd_creci) VALUES (:ic_status, :cd_categoria, :cd_creci);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", $this->ic_status);
            $stmt->bindValue(":cd_categoria", $this->cd_categoria);
            $stmt->bindValue(":cd_creci", $this->cd_creci);
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
            $sql = "SELECT * FROM $this->table LEFT JOIN tb_pessoa ON $this->table.cd_pessoa = tb_pessoa.cd_pessoa WHERE cd_funcionario = :cd_funcionario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_funcionario", $this->cd_funcionario);
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
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_funcionario = :cd_funcionario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 0);
            $stmt->bindValue(":cd_funcionario", $this->cd_funcionario);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function enable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_funcionario = :cd_funcionario;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_funcionario", $this->cd_funcionario);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
