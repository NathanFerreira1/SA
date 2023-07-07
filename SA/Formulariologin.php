<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste</title>
</head>
<?php
require_once("Logar.php");


$formData = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if(!empty($formData['login'])){
    $createUser = new Usuarios();   
    $createUser->formData = $formData;
    $result = $createUser->logar();
}
?>

<body>
<form method="POST" class="formLogin">
<CENTER><h1>LOGIN</h1></cENTER>
<center><form name="login"  method="POST" action="">
    <label>EMAIL:</label><br>
    <input type="text" placeholdder="email" name="email" required><br>
    <label>SENHA:</label><br>
    <input type="text" placeholdder="senha" name="senha" required><br><br>
    <div class="SUBMIT-BUTTON">
      <input type="submit" value="ENTRAR" name="login">
      <h3>Ainda não tem cadastro? <a href="FormularioCadastro.php">CADASTRA-SE</a></h3>
    </div>
  
    

    <form method="POST" class="formLogin">
</form></center>
</body>
</html> 