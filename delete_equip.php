<?php

session_start();
include_once'verifica_login.php';
include("conexao.php");

$usuario = $_SESSION['usuario'];
$EquipDEL = $_GET['del'];

$del = "DELETE FROM equipamentos WHERE idequipamento= '".$_GET['del']."'";
$apagar = mysqli_query($conexao, $del);

if($conexao->query($del) === TRUE) {

	

        try {
           $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('EXCLUIU', NOW(), '$usuario', 'EQUIPAMENTO', '$EquipDEL')";
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }


	echo "Apagado Com Sucesso!";
	echo "<br>";
    echo '<a href="edit_equip.php"">Voltar';
}else{
	echo "Erro!";
}

$conexao->close();

?>