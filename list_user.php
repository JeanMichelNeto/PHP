?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar</title>		
	</head>
	<body>
		<a href="index.php">Cadastrar</a><br>
		<a href="listar.php">Listar</a><br>
		<h1>Listar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		

		//Setar a quantidade de itens por pagina
	
		
		//calcular o inicio visualização
	
		
		$result_usuarios = "SELECT * FROM usuario";
		$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "ID: " . $row_usuario['idusuario'] . "<br>"; 
			echo "Nome: " . $row_usuario['nome'] . "<br>";
			echo "Usuário: " . $row_usuario['usuario'] . "<br><hr>";
		}
		
		
		?>		
	</body>
</html>