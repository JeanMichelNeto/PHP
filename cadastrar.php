<?php
session_start();
include("conexao.php");

if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha'])){
	 echo '<a href="painel.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('PREENCHA TODOS OS CAMPOS!!');
}



$erro = FALSE;

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));



$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

// A variável filtra os dados que entram pelo método post//
$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// A variável inicia com um valor boleano de Falso//


$dados_st = array_map('strip_tags', $dados_rc);
$dados = array_map('trim', $dados_st);

// Verifica se o formulario inserido está em branco// 
 	if(in_array('', $dados)){
 		$erro = TRUE;
 		$_SESSION['msg'] = "Preencha Todos os Campos!";


 	}else{
 		//Query verifica se usuario já existe
 		$result_user = "SELECT idusuario FROM usuario WHERE usuario = '".$dados['usuario']."'";
 		$resultado_usuario = mysqli_query($conexao, $result_user);
 		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
 			$erro = TRUE;
 			$_SESSION['msg'] = "Usuario Já Existe!";
 			echo '<a href="painel.php"">Clique Para Voltar!</a>';
     		echo "<br/>";
    		die('USUÁRIO JÁ EXISTE!!');
 		}
 	}


if(!$erro){

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	echo 'USÁRIO JÁ CADASTRADO!!';

}


$sql = "INSERT INTO usuario (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";





if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;

 	$last_id = $conexao->insert_id;

try {
   $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('INCLUSÃO', NOW(), '$usuario', 'USUÁRIO', '$last_id')";
	$conexao->query($sqllog);

} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}


}

}




$conexao->close();

header('Location: edit_user.php');
exit;
?>