<?php

use Core\Model;

class ImovelModel extends Model
{
    private $cd_imovel;
    private $ic_status;
    private $qt_area_util;
    private $qt_area_total;
    private $vl_preco;
    private $ds_imovel;
    private $ds_imagem;
    private $cd_latitude;
    private $cd_longitude;
    private $cd_categoria_imovel;
    private $cd_proprietario;

    public function __construct()
    {
        parent::__construct();
        $this->table = "tb_imovel";
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
            $sql = "INSERT INTO $this->table (ic_status, qt_area_util, qt_area_total, vl_preco, ds_imovel, ds_imagem, cd_latitude, cd_longitude, cd_categoria_imovel, cd_proprietario) VALUES (:ic_status, :qt_area_util, :qt_area_total, :vl_preco, :ds_imovel, :ds_imagem, :cd_latitude, :cd_longitude, :cd_categoria_imovel, :cd_proprietario);";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(':ic_status', $this->ic_status);
            $stmt->bindValue(':qt_area_util', $this->qt_area_util);
            $stmt->bindValue(':qt_area_total', $this->qt_area_total);
            $stmt->bindValue(':vl_preco', $this->vl_preco);
            $stmt->bindValue(':ds_imovel', $this->ds_imovel);
            $stmt->bindValue(':ds_imagem', $this->ds_imagem);
            $stmt->bindValue(':cd_latitude', $this->cd_latitude);
            $stmt->bindValue(':cd_longitude', $this->cd_longitude);
            $stmt->bindValue(':cd_categoria_imovel', $this->cd_categoria_imovel);
            $stmt->bindValue(':cd_proprietario', $this->cd_proprietario);
            $stmt->execute();
            $this->lastId = $this->link->lastInsertId();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function update()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status, qt_area_util = :qt_area_util, qt_area_total = :qt_area_total, vl_preco = :vl_preco, ds_imovel = :ds_imovel, ds_imagem = :ds_imagem, cd_latitude = :cd_latitude, cd_longitude = :cd_longitude, cd_categoria_imovel = :cd_categoria_imovel, cd_proprietario = :cd_proprietario WHERE cd_imovel = :cd_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":cd_imovel", $this->cd_imovel);
            $stmt->bindValue(':ic_status', $this->ic_status);
            $stmt->bindValue(':qt_area_util', $this->qt_area_util);
            $stmt->bindValue(':qt_area_total', $this->qt_area_total);
            $stmt->bindValue(':vl_preco', $this->vl_preco);
            $stmt->bindValue(':ds_imovel', $this->ds_imovel);
            $stmt->bindValue(':ds_imagem', $this->ds_imagem);
            $stmt->bindValue(':cd_latitude', $this->cd_latitude);
            $stmt->bindValue(':cd_longitude', $this->cd_longitude);
            $stmt->bindValue(':cd_categoria_imovel', $this->cd_categoria_imovel);
            $stmt->bindValue(':cd_proprietario', $this->cd_proprietario);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function list()
    {
        try {
            $sql = "SELECT $this->table.*, tb_pessoa.nm_primeiro, tb_pessoa.nm_meio, tb_pessoa.nm_ultimo, tb_pessoa.cd_cpf FROM $this->table LEFT JOIN tb_proprietario ON $this->table.cd_proprietario = tb_proprietario.cd_proprietario LEFT JOIN tb_pessoa ON tb_proprietario.cd_pessoa = tb_pessoa.cd_pessoa;";
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
            $sql = "SELECT * FROM $this->table;";
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
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_imovel = :cd_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 0);
            $stmt->bindValue(":cd_imovel", $this->cd_imovel);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }

    public function enable()
    {
        try {
            $sql = "UPDATE $this->table SET ic_status = :ic_status WHERE cd_imovel = :cd_imovel;";
            $stmt = $this->link->prepare($sql);
            $stmt->bindValue(":ic_status", 1);
            $stmt->bindValue(":cd_imovel", $this->cd_imovel);
            $stmt->execute();
        } catch (Exception $e) {
            echo '<p>Erro: <b>' . $e->getMessage() . '</b></p>';
        }
    }
}
