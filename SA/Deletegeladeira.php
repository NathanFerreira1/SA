<?php
session_start();

ob_start();

//Receber o id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
</head>

<body>

    

    <h1>Apagar</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    //Incluir os arquivos
    require './Usergeladeira.php';

 
    //Verificar se o id possui valor
    if (!empty($id)) {

        //Instanciar a classe e criar o objeto
        $deleteUser = new Geladeira();

        //Enviando o id para o atributo id da classe User
        $deleteUser->id = $id;

        $deleteUser = $deleteUser->delete();
         echo  "<p style='color: #f00;'>Removido com sucesso</p>";
         header('Location: /SA/Viewgeladeira.php');
        
    

    } else {
        echo "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        
    }
    ?>

</body>

</html>