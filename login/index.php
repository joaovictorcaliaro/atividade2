<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

require_once("conn.php");
require_once("usuario.php");

// Recebendo os valores em forma de array
$formData = filter_input_array(INPUT_POST,FILTER_DEFAULT);
// Verificando se o botão de cadastro foi acionado
    if(!empty($formData["logar"])){
        $createusuario = new usuario();
        $createusuario->formData = $formData;
        $result_cliente = $createusuario->validar();
        foreach ($result_cliente as $row_cliente){
            extract($row_cliente);
        }
        if(count($createusuario->validar())>0){
            echo "Olá";
        }    
     }

?>
    <form action="" method="POST">
        <label for=""><h2>Login</h2></label><br>
        <label for="">Email</label><br>
        <input type="email" name="email" require><br><br>
        <label for="">Senha</label><br>
        <input type="password" name="senha" require><br><br>
        <input type="submit" name="logar">
    </form>
</body>
</html>