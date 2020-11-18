<?php
session_start();
include_once'verifica_login.php';
include("conexao.php");

if(empty($_POST['nserie']) || empty($_POST['nome']) || empty($_POST['descricao']) || empty($_POST['descricao']) || empty($_POST['categoria']) || empty($_POST['tipo']) || empty($_POST['garantia']) || empty($_POST['proprietario']) || empty($_POST['licenca']) || empty($_POST['localizacao']) || empty($_POST['status'])){
     echo '<a href="painel.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('PREENCHA TODOS OS CAMPOS!!');

}

$usuario = $_SESSION['usuario'];

$nserie = mysqli_real_escape_string($conexao, trim($_POST['nserie']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));

$categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
$tipo = mysqli_real_escape_string($conexao, trim($_POST['tipo']));
$garantia = mysqli_real_escape_string($conexao, trim($_POST['garantia']));
$proprietario = mysqli_real_escape_string($conexao, trim($_POST['proprietario']));
$licenca = mysqli_real_escape_string($conexao, trim($_POST['licenca']));

$localizacao = mysqli_real_escape_string($conexao, trim($_POST['localizacao']));
$status = mysqli_real_escape_string($conexao, trim($_POST['status']));


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
        $result_equip= "SELECT idequipamento FROM equipamentos WHERE nserie = '".$dados['nserie']."'";
        $resultado_equip = mysqli_query($conexao, $result_equip);
        if(($resultado_equip) AND ($resultado_equip->num_rows != 0)){
            $erro = TRUE;
            $_SESSION['msg'] = "N° Série Já Existe!";
            echo '<a href="painel.php"">Clique Para Voltar!</a>';
            echo "<br/>";
            die('N° SÉRIE JÁ  CADASTRADO!!');

        }

        $result_equip= "SELECT idequipamento FROM equipamentos WHERE nome = '".$dados['nome']."'";
        $resultado_equip = mysqli_query($conexao, $result_equip);
        if(($resultado_equip) AND ($resultado_equip->num_rows != 0)){
            $erro = TRUE;
            $_SESSION['msg'] = "Nome Já Existe!";
             echo '<a href="painel.php"">Clique Para Voltar!</a>';
            echo "<br/>";
            die('NOME JÁ  CADASTRADO!!');
        }
        
    }



if(!$erro){
    
if($row['total'] == 1) {
	$_SESSION['equipamento_existe'] = true;
	header('Location: edit_equip.php');
	exit;
}

$sql = "INSERT INTO equipamentos (nserie, nome, descricao, localizacao, status, categoria, tipo, garantia, proprietario, licenca, data_cadastro) VALUES ('$nserie', '$nome', '$descricao', '$localizacao', '$status' , '$categoria', '$tipo', '$garantia', '$proprietario', '$licenca',  NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;

	$last_id = $conexao->insert_id;

        try {
           $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('INCLUIU', NOW(), '$usuario', 'EQUIPAMENTO', '$last_id')";
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
}

}

$conexao->close();

header('Location: edit_equip.php');
exit;
?>