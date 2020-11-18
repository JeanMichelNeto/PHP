<?php
session_start();
include_once'verifica_login.php';
include("conexao.php");

$params = array(
	':descricao' => $_POST['descricao']
);


if(empty($_POST['descricao']) || empty($_POST['pontoini']) || empty($_POST['pontofim'])){
	 echo '<a href="painel.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('PREENCHA TODOS OS CAMPOS!!');
}

$descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
$pontoini = mysqli_real_escape_string($conexao, trim($_POST['pontoini']));
$pontofim = mysqli_real_escape_string($conexao, trim($_POST['pontofim']));

$usuario = $_SESSION['usuario'];


$sql = "select count(*) as total from rota where rota = '$rota'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

// A variável filtra os dados que entram pelo método post//
$dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// A variável inicia com um valor boleano de Falso//
$erro = FALSE;

$dados_st = array_map('strip_tags', $dados_rc);
$dados = array_map('trim', $dados_st);

// Verifica se o formulario inserido está em branco// 
 	if(in_array('', $dados)){
 		$erro = TRUE;
 		$_SESSION['msg'] = "Preencha Todos os Dados";
 	}else{
 		//Query verifica se usuario já existe
 		$result_rota = "SELECT idrota FROM rota WHERE descricao = '".$dados['descricao']."'";
 		$resultado_rota = mysqli_query($conexao, $result_rota);
 		if(($resultado_rota) AND ($resultado_rota->num_rows != 0)){
 			$erro = TRUE;
 			$_SESSION['msg'] = "Rtoa Já Existe!";

 		}
 	}


		if(!$erro){
		if($row['total'] == 1) {
			$_SESSION['rota_existe'] = true;
			header('Location: edit_rota.php');
			exit;
		}

		$sql = "INSERT INTO rota (descricao, pontoini, pontofim) VALUES ('$descricao', '$pontoini', '$pontofim')";

		if($conexao->query($sql) === TRUE) {
			$_SESSION['status_cadastro'] = true;

			 	$last_id = $conexao->insert_id;

		try {
		   $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('INCLUSÃO', NOW(), '$usuario', 'ROTA', '$last_id')";
			$conexao->query($sqllog);

		} catch (Exception $e) {
		    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}

		}

		}

		$conexao->close();

			header('Location: edit_rota.php');
			exit;
?>