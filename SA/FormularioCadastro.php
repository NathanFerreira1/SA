
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>


</head>
<?php
require_once("Userfuncionarios.php");

// cria um novo usuario e coloca as informações em um array
$formData = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if(!empty($formData['addUser'])){
    
    $createUser = new Usuarios();   
    $createUser->formData = $formData;
    $result = $createUser->create();

    if($result){
        echo "Usuário cadastrado com sucesso!";
    }
    else{
        echo "Usuário não cadastrado";
    }
}
 
?>
<body>

     
    <form  name="createUser"  method="POST" action="">
       
        <label>nome:</label>
        <input type="text" placeholdder="nome" name="nome" required><br>
        <label>email:</label>
        <input type="text" placeholdder="email" name="email" required><br>
        <label>senha:</label>
        <input type="password" placeholdder="senha" name="senha" required><br><br>
        <input class="SUBMIT-BUTTON" type="submit" value="Cadastrar" name="addUser">
    </form>
</body>

</html> 