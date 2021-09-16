<!DOCTYPE html>
<?php
	require_once "includes/banco.php";
	require_once "includes/login.php";
	require_once "includes/funcoes.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href= "estilos/estilo.css"/>
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
         rel="stylesheet">
	    <title> Cadastro de Usuário </title>	
    </head>
<body>
    <div id="body">
        <?php 
        if(!is_admin()){
            echo msg_erro( "Área Restrita, somente administradores");
        }else{
            if(!isset($_POST['usuario'])){
                require "user-new-form.php";
            }else{
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;
                
                if($senha1 === $senha2){
                    echo msg_sucesso("Tudo certo para gravar.");
                }else{
                    echo msg_erro("As senhas não são iguais.");
                }
                
            }
           
        }
            echo voltar();
        
        ?>
    </div>
</body>
</html>