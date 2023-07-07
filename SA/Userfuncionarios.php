<?php
    require_once("Conn.php");
    class Usuarios extends Conn
    {

    public object $conn;
    public array $formData;

//metodo que insere um novo usuario
    public function create(){
        
        $this->conn = $this->connect();
        $senha = md5($this->formData['senha']);//criptografa a senha a ser inserida
        
        $query="INSERT INTO usuarios(nome,email,senha,permissao) VALUES (:nome,:email,:senha,'0')";
        
        $addUser=$this->conn->prepare($query);
        
        $addUser->bindParam(':nome',$this->formData['nome']);
        $addUser->bindParam(':email',$this->formData['email']);
        $addUser->bindParam(':senha',$senha);

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
        $id = $_GET['id'];
        $query_user = "SELECT *
                        FROM usuarios
                        WHERE id= $id AND permissao != 2" ;
        $result_user = $this->conn->prepare($query_user);
        $result_user->execute();
        $value = $result_user->fetch();
        return $value;
    }

    //funcão que edita as permissoes do usuario
    public function edit() : bool
    {
        $this->conn = $this->connect();
        $query_user = "UPDATE usuarios SET permissao=:permissao
                    WHERE id=:id";
        $edit_user = $this->conn->prepare($query_user);
    
        $edit_user->bindParam(':permissao',$this->formData['permissao']);
        $edit_user->bindParam(':id', $this->formData['id']);
        $teste = $edit_user->execute();

        if($edit_user->rowCount()){
            return true;
        }else{
            return false;
        }

    }
    //função que deleta um usuario
    public function delete():bool{
        $this->conn = $this->connect();
        $query_user = "DELETE FROM usuarios WHERE id=:id";
        $delete_user = $this->conn->prepare($query_user);
        $delete_user->bindParam(':id',$this->id);
        $value = $delete_user->execute();
        return $value;
    }
}

    ?>