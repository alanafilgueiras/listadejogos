<!DOCTYPE html>
<?php
	require_once "includes/banco.php";
	require_once "includes/login.php";
	require_once  "includes/funcoes.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href= "estilos/estilo.css"/>
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
         rel="stylesheet">
	    <title> Edição de dados do usuario </title>	
    </head>
    <body>
    <div id="body">
        <?php 
            if (!is_logado()){
                echo msg_erro("efetue o <a href= 'user-login.php'> login</a> para prosseguir.");

            }else{
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                }else{
                    msg_sucesso("dados foram passados");
                }
            }
        ?>

    </div>
    
    
    </body>
</html>