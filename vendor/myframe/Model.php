<?php


namespace vendor\myframe;
use components\Constants;
use PDO;

class Model
{
    public $tableName;
    public $db;
    public $page;
    public function __construct()
    {
        $request = new Request();
        $this->page = $request->page;
        $this->tableName = $this->tableName();
        $conn = new Connection();
        $this->db = $conn->getConnect();
    }
    public function tableName()
    {
        return "user";
    }
    public function getList($withoutLimit = false)
    {
        $offset = ($this->page - 1) * Constants::LIMIT;

        if ($withoutLimit) {
            $sql = "select * from {$this->tableName}";
            $state = $this->db->prepare($sql);
        }else {
            $sql = "select * from {$this->tableName} limit :offset, :limit";
            $state = $this->db->prepare($sql);
            $state->bindValue(":limit", Constants::LIMIT, PDO::PARAM_INT);
            $state->bindValue(":offset", $offset, PDO::PARAM_INT);
        }
        $state->execute();
        return $state->fetchAll(PDO::FETCH_OBJ);
    }
    public function getPageCount()
    {
        $sql = "select * from {$this->tableName}";
        $state = $this->db->prepare($sql);
        $state->execute();
        $total_rows = $state->rowCount();
        return ceil($total_rows / Constants::LIMIT);
    }
    public function getRowById($id)
    {
        $sql = "select * from {$this->tableName} where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindValue(":id", $id, PDO::PARAM_INT);
        $state->execute();
        return $state->fetchAll(PDO::FETCH_OBJ);
    }

}