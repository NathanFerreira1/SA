<?php
session_start();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

require_once ("Conn.php");
require_once("Listusuarios.php");

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Verificar se o id possui valor
    if (!empty($id)) {

        //Instanciar a classe e criar o objeto
        $viewUser = new Usuarios();

        //Enviando o id para o atributo id da classe User
        $viewUser->id = $id;

        $valueUser = $viewUser->view();

        extract($valueUser);
    }

$listUsers = new ListUsers();
$result_users = $listUsers->list();

foreach ($result_users as $row_user) {
    extract($row_user);

    echo "nome: $nome ";
    echo "email: $email ";
    ?>
    <button><a href='Editusuarios.php?id=<?= $id ?>'>Editar</a><br></button> 
    <button><a href='Deleteusuarios.php?id=<?= $id ?>'>Deletar</a><br></button>
    <?php
    echo "<hr>";
}
?>