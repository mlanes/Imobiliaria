<?php
require_once 'Core/Model.php';
require_once 'Interfaces/CrudInterface.php';

class PessoaModel extends Model implements CrudInterface
{
    private $cd_pessoa;
    private $nm_primeiro;
    private $nm_meio;
    private $nm_ultimo;
    private $dt_criado;
    private $dt_editado;
    private $cd_cpf;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_pessoa";
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
            $sql = "INSERT INTO $this->table (nm_primeiro, nm_meio, nm_ultimo, dt_criado, dt_editado, cd_cpf) VALUES (:nm_primeiro, :nm_meio, :nm_ultimo, :dt_criado, :dt_editado, :cd_cpf);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":nm_primeiro", $this->nm_primeiro);
            $stmt->bindValue(":nm_meio", $this->nm_meio);
            $stmt->bindValue(":nm_ultimo", $this->nm_ultimo);
            $stmt->bindValue(":dt_criado", $this->dt_criado);
            $stmt->bindValue(":dt_editado", $this->dt_editado);
            $stmt->bindValue(":cd_cpf", $this->cd_cpf);
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
            $sql = "SELECT * FROM $this->table WHERE cd_pessoa = :cd_pessoa;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_pessoa", $this->cd_pessoa);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
    public function disable()
    {
    }

    public function enable()
    {
    }
}
