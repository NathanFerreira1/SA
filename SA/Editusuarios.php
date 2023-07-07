<?php
session_start();

//Receber o id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
//Incluir os arquivos
require_once ("Userfuncionarios.php");

//Receber os dados do formulario
$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verificar se o usuario clicou no botao
if (!empty($formData['SendEditUser'])) {
    //var_dump($formData);
    $editUser = new Usuarios();
    $editUser->formData = $formData;
    $value = $editUser->edit();
    if($value){
        echo  "<p style='color: green;'>editado com sucesso!</p>";
    }else{
        echo "<p style='color: #f00;'>Erro:não editado!</p>";
    }
}
//Verificar se o id possui valor
if (!empty($id)) {

    //Instanciar a classe e criar o objeto
    $viewUser = new Usuarios();

    //Enviando o id para o atributo id da classe User
    $viewUser->id = $id;

    $valueUser = $viewUser->view();
    if(!$valueUser){
        echo'Permissão Negada!';
        exit();
    }

    extract($valueUser);


  

?>

<form name="EditUser" method="POST" action="">
<input type="hidden" name="id" value="<?php echo @$id; ?>" />
<input type="text" readonly  value = "<?php echo @$nome; ?>"/>
<input type="text" readonly  value = "<?php echo @  $email; ?>"/>
<select name="permissao" required>
    <option value= "0">Selecione a opção</option>
    <option value= "0">Funcionario Padrão</option>
    <option value= "1">Gestor</option>
    </select><br><br>
<input type="submit" value="Editar" name="SendEditUser" />

<?php


    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuario não encontrado!</p>";
        
    }
    ?>


