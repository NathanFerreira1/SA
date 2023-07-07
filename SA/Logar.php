<?php
session_start();
require_once("Conn.php");
class Usuarios extends Conn
{
    public object $conn;
    //recebe um usuario e senha e compara no banco de dados se o usuario existe
    public function logar()
    {

        $this->conn = $this->connect();
        $query_users = "SELECT * FROM usuarios WHERE email=:email and senha=:senha";
        $senha = md5($this->formData['senha']);//criptografa a senha inserida
        $login=$this->conn->prepare($query_users);
        
        $login->bindParam(':email',$this->formData['email']);
        $login->bindParam(':senha',$senha);
        $login->execute();

        if($login->rowCount()){
            //return true;
            //salva a permissão do usuario logano na session do navegador
            echo "usuario autenticado";
            $retorno = $login->fetch();
            $_SESSION["permissao"] = $retorno['permissao'];

        }
        else{
            //return false;
            echo"falhou";
        }
    }
}

