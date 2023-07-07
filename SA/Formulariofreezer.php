<?php
require_once("Userfreezer.php");


$formData = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if(!empty($formData['addUser'])){
    
    $createUser = new Freezer();   
    $createUser->formData = $formData;
    $result = $createUser->create();

    if($result){
        echo "cadastrado com sucesso!";
    }
    else{
        echo "não cadastrado";
    }
}
?>

<div class="divformulario">
   <center><form name="createUser"  method="POST" action="">
          <label>marca:</label><br>
          <input type ="text" placeholder ="Digite a marca" name = "marca"><br>
          <label>modelo:</label><br>
          <input type ="text" placeholder ="Digite o modelo" name = "modelo"><br>
          <label>material:</label><br>
          <select name="material" required>
            <option value= "null">Selecione a Opção</option>
            <option value= "Aluminio">Aluminio</option>
            <option value= "Inox">Inox</option>
            <option value= "Aço">Aço</option>
            </select><br>
          <label>cor:</label><br>
          <select name="cor" required>
            <option value= "null">Selecione a Opção</option>
            <option value= "Branco">Branco</option>
            <option value= "Preto">Preto</option>
            <option value= "Cinza">Cinza</option>
            <option value= "Inox">Inox</option>
            </select><br>
          <label>tipo:</label><br>
          <select name="tipo" required>
            <option value= "null">Selecione a Opção</option>
            <option value= "vertical">vertical</option>
            <option value= "horizontal">horizontal</option>
            </select><br>
          <label>quantidade:</label><br>
          <input type ="text" placeholder ="Digite a quantidade" name = "quantidade"><br>
          <input class="cad" type="submit" value="Cadastrar" name="addUser">
          <button><a href='formularioFoto.php'>Adicionar um arquivo:</a><br></button>
          </form></center>