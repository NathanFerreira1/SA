<?php
    require("Conn.php");
    class Geladeira extends Conn
    {

    public object $conn;
    public array $formData;


    public function create(){
        
        $this->conn = $this->connect();
        $query="INSERT INTO freezer(marca,modelo,material,cor,tipo,quantidade) VALUES (:marca,:modelo,:material,:cor,:tipo,:quantidade)";
        $addUser=$this->conn->prepare($query);
        
        $addUser->bindParam(':marca',$this->formData['marca']);
        $addUser->bindParam(':modelo',$this->formData['modelo']);
        $addUser->bindParam(':material',$this->formData['material']);
        $addUser->bindParam(':cor',$this->formData['cor']);
        $addUser->bindParam(':tipo',$this->formData['tipo']);
        $addUser->bindParam(':quantidade',$this->formData['quantidade']);
        $addUser->execute();
        
        if($addUser->rowCount()){
            return true;
        }
        else{
            return false;
        }
    }
    public function view()
    {
        $this->conn = $this->connect();
        $query_user = "SELECT id, marca, modelo, material, cor, tipo, quantidade
                        FROM freezer
                        WHERE id =:id
                        LIMIT 1";
        $result_user = $this->conn->prepare($query_user);
        $result_user->bindParam(':id', $this->id);
        $result_user->execute();
        $value = $result_user->fetch();
        return $value;
    }
    public function edit() : bool
    {
        //var_dump($this->formData);
        $this->conn = $this->connect();
        $query_user = "UPDATE freezer SET marca=:marca,modelo=:modelo, material=:material, cor=:cor, tipo=:tipo WHERE id=:id";
        
        $edit_user = $this->conn->prepare($query_user);
        $edit_user->bindParam(':marca',$this->formData['marca']);
        $edit_user->bindParam(':modelo',$this->formData['modelo']);
        $edit_user->bindParam(':material',$this->formData['material']);
        $edit_user->bindParam(':cor',$this->formData['cor']);
        $edit_user->bindParam(':tipo',$this->formData['tipo']);
        $edit_user->bindParam(':id', $this->formData['id']);
        $teste = $edit_user->execute();
        
        if($edit_user->rowCount()){
            return true;
        }else{
            return false;
        }

    }
    public function somar() : bool {
        $this->conn = $this->connect();
        $query_user = "UPDATE freezer SET quantidade=:quantidade WHERE id=:id";
        $edit_user = $this->conn->prepare($query_user);
        $edit_user->bindParam(':quantidade',$this->formData['quantidade']);
        $edit_user->bindParam(':id', $this->formData['id']);
        $teste = $edit_user->execute();
        
        if($edit_user->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function delete():bool{
        $this->conn = $this->connect();
        $query_user = "DELETE from freezer WHERE id=:id";
        $delete_user = $this->conn->prepare($query_user);
        $delete_user->bindParam(':id',$this->id);
        $value = $delete_user->execute();
        return $value;
    }
}

?>