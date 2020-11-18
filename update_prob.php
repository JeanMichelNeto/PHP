<?php 

  session_start();
    include_once'verifica_login.php';
    include("conexao.php");

if(empty($_POST['problemas']) || empty($_POST['dataprob']) || empty($_POST['solucao']) || empty($_POST['status_prob'])){
     echo '<a href="configuracao.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('PREENCHA TODOS OS CAMPOS!!');
}


    $usuario = $_SESSION['usuario'];


    if(isset($_POST['update']))
    {
        
        $EquipID = $_GET['ID'];
        $Nserie = $_POST['nserie'];
        $Proble = $_POST['problemas'];
        $DataProb = $_POST['dataprob'];
        $StatusProb = $_POST['status_prob'];
        $Soluc = $_POST['solucao'];
        $Nome = $_POST['nome'];


        $query = " update equipamentos set problemas ='". $Proble."', nserie ='".$Nserie."',  dataprob ='".$DataProb."', solucao ='".$Soluc."', status_prob ='".$StatusProb."'  where idequipamento='".$EquipID."'";

        $result = mysqli_query($conexao,$query);

        if($result){
           

        try {
           $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador, dataprob, solucao, problemas, status_prob, nserie, nome) VALUES ('CADASTROU PROBLEMA', NOW(), '$usuario', 'EQUIPAMENTO', '$EquipID', '$DataProb', '$Soluc', '$Proble', '$StatusProb', '$Nserie', '$Nome')";
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }

           echo "Cadastrado Com Sucesso!";
           echo "<br>";
           echo '<a href="configuracao.php"">Voltar';
        }else{
            echo 'Erro ao Configurar ';

         }
        } else {
        header("location:configuracao.php");
        }


?>