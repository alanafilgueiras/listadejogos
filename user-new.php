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
                $tipo = $_POST['tipo']?? null;
                
                if($senha1 === $senha2){
                    if (empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                        echo msg_erro('Todos os campos são obrigatórios. Tente novamente.');
                    }else{
                        $senha = gerarHash($senha1);
                        $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                        if($banco->query($q)){
                            echo msg_sucesso("Usuário $nome Cadastrado com sucesso!");
                        }else{
                        echo msg_erro("Não foi possível criar o usuário $usuario. Talvez o login esteja sendo usado.");
                        }
                    }
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