<?php
require_once("Conn.php");
class ListUsers extends Conn
{
    public object $conn;

    public function list() :array
    {
        $this->conn = $this->connect();
        $query_users = "SELECT * FROM freezer ORDER BY id DESC LIMIT 40";
        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }
}