<?php

    session_start();
    include("conexao.php");
    include_once'verifica_login.php';

$UserID = $_GET['del'];    

$usuario = $_SESSION['usuario'];

$del = "DELETE FROM usuario WHERE idusuario= '".$_GET['del']."'";
$apagar = mysqli_query($conexao, $del);

if($conexao->query($del) === TRUE) {

     try {
        $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('USUÁRIO DELETADO', NOW(), '$usuario', 'USUARIO', '$UserID')";
           
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        	echo "Apagado Com Sucesso!";
        	echo "<br>";
            echo '<a href="edit_user.php"">Voltar';

        }else{
	       echo "Erro!";
        }

$conexao->close();


?>