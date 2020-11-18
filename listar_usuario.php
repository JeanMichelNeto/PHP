<?php
include_once "conexao.php";

//consultar no banco de dados
$result_usuario = "SELECT * FROM usuario ORDER BY id DESC";
$resultado_usuario = mysqli_query($conexao, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Usuário</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr>
					<th><?php echo $row_usuario['idusuario']; ?></th>
					<td><?php echo $row_usuario['nome']; ?></td>
					<td><?php echo $row_usuario['usuario']; ?></td>
				</tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
