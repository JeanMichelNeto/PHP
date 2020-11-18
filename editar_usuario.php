<?php
session_start();
include("conexao.php");


$del = "DELETE FROM rota WHERE idrota= '".$_GET['del']."'";
$apagar = mysqli_query($conexao, $del);

if($conexao->query($del) === TRUE) {
	echo "Apagado Com Sucesso!";
}else{
	echo "Erro!";
}


$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";
$del = "DELETE FROM rota WHERE idrota= '".$_GET['del']."'";
$salvar = "UPDATE usuario  SET `nome`='$nome', `usuario`='$usuario', `senha`='$senha',  WHERE idusuario= '".$_GET['del']."'";


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>