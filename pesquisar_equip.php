<?php 
     session_start();
    include("conexao.php");
    include_once'verifica_login.php';

    if(empty($_POST['nome'])){
     echo '<a href="configuracao.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('DIGITE SUA BUSCA!!');
    }


    
    $EquipID = $_GET['edit'];
    $pesquisar = $_POST['nome'];

    

 

    $result_pesq = "SELECT * FROM equipamentos WHERE nome = '$pesquisar'";
    $resultado = mysqli_query($conexao, $result_pesq);

        while ($rows_result = mysqli_fetch_array($resultado)) {
           header('Location: config_ecs.php?edit='.$rows_result['idequipamento'].'');
          
        }

    

?>