<?php 
     session_start();
    include("conexao.php");
    include_once'verifica_login.php';

    $EquipID = $_GET['edit'];


   
    $pesquisar = $_POST['nome'];
    $pesquisar = $_POST['problemas'];
    

    $result_pesq = "SELECT * FROM equipamentos WHERE nome = '$pesquisar' OR problemas = '$pesquisar'";
    $resultado = mysqli_query($conexao, $result_pesq);

        while ($rows_result = mysqli_fetch_array($resultado)) {
            header('Location: problemas.php?edit='.$rows_result['idequipamento'].'');
          
          
        }

     



    

?>