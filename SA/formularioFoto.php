<?php
require_once("Conexao.php");
if(isset($_FILES['arquivo']))
{
    $arquivo = $_FILES['arquivo'];
    var_dump($_FILES['arquivo']);

    $pasta="upload/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomedoArquivo = MD5($nomeDoArquivo);
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    $caminho =$pasta . $novoNomedoArquivo . "." . $extensao;
    $certo = move_uploaded_file($arquivo["tmp_name"], $caminho);
    if($certo){
         $mysqli->query("INSERT INTO galeria(caminho) VALUES ('$caminho')");
    
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="">
        <p><label for="">Selecione o arquivo</label>
        <input name="arquivo" type="file"></p>
        <button name="upload" type="submit">Enviar arquivo</button>
        <button><a href='formulariofreezer.php'>Cligue para voltar ao formulario do freezer</a><br></button>
        <button><a href='formulariogeladeira.php'>Cligue para voltar ao formulario da geladeira</a><br></button>
</form>
</body>
</html>