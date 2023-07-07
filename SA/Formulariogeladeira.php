<?php
require_once("Usergeladeira.php");
require_once("Listgeladeira.php");

$formData = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if(!empty($formData['addUser'])){
  if (!empty($id)) {

    //Instanciar a classe e criar o objeto
    $viewUser = new Geladeira();

    //Enviando o id para o atributo id da classe User
    $viewUser->id = $id;

    $valueUser = $viewUser->view();

    extract($valueUser);
}
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $createUser = new Geladeira();   
    $createUser->formData = $formData;
    $listUsers = new ListUsers();
    $result_users = $listUsers->list();

    for($i = 0; $i < count($result_users); ++$i){
      if($result_users[$i]['marca'] == $formData["marca"]){
        $result = $createUser->somar();
        exit();
      }else{
        $result = $createUser->create();
        if($result){
          echo "cadastrado com sucesso!";
      }
      else{
          echo "não cadastrado";
      }
      }
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
          <label>portas:</label><br>
          <select name="portas" required>
            <option value= "null">Selecione a Opção</option>
            <option value= "2">2</option>
            <option value= "3">3</option>
            <option value= "4">4</option>
            </select><br>
          <label>quantidade:</label><br>
          <input type ="text" placeholder ="Digite a quantidade" name = "quantidade"><br>
          <input class="cad" type="submit" value="Cadastrar" name="addUser">
          <button><a href='formularioFoto.php'>Adicionar um arquivo:</a><br></button>
          </form></center>
          