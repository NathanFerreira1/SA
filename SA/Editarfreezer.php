<?php
session_start();

//Receber o id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    //Incluir os arquivos
    require_once ("Userfreezer.php");

    //Receber os dados do formulario
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Verificar se o usuario clicou no botao
    if (!empty($formData['SendEditUser'])) {
        //var_dump($formData);
        $editUser = new Freezer();
        $editUser->formData = $formData;
        $value = $editUser->edit();
        var_dump($value);
        if($value){
            echo  "<p style='color: green;'>editado com sucesso!</p>";
        }else{
            echo "<p style='color: #f00;'>Erro:  não editado!</p>";
        }
    }

    //Verificar se o id possui valor
    if (!empty($id)) {

        //Instanciar a classe e criar o objeto
        $viewUser = new Freezer();

        //Enviando o id para o atributo id da classe User
        $viewUser->id = $id;

        $valueUser = $viewUser->view();

        extract($valueUser);

    ?>
        <form name="EditUser" method="POST" action="">
        <label>marca:</label><br>
          <input type ="text" name = "marca" value = "<?php echo $marca; ?>"><br>
          <label>modelo:</label><br>
          <input type ="text" name = "modelo" value = "<?php echo $modelo; ?>"><br>
          <label>material:</label><br>
          <select name="material" required>
            <option value= "<?php echo $material; ?>"><?php echo $material; ?></option>
            <option value= "Aluminio">Aluminio</option>
            <option value= "Inox">Inox</option>
            <option value= "Aço">Aço</option>
            </select><br>
          <label>cor:</label><br>
          <select name="cor" required>
            <option value= "<?php echo $cor; ?>"><?php echo $cor; ?></option>
            <option value= "Branco">Branco</option>
            <option value= "Preto">Preto</option>
            <option value= "Cinza">Cinza</option>
            <option value= "Inox">Inox</option>
            </select><br>
          <label>tipo:</label><br>
          <select name="tipo" required>
            <option value= "<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
            <option value= "vertical">vertical</option>
            <option value= "horizontal">horizontal</option>
            </select><br>
            <input type="submit" value="Editar" name="SendEditUser" />
        </form>
    <?php


    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro:não encontrado!</p>";
        
    }
    ?>

</body>

</html>