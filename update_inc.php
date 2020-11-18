<?php 

  session_start();
    include_once'verifica_login.php';
    include("conexao.php");

if(empty($_POST['incidentes']) || empty($_POST['datainc']) || empty($_POST['solucao']) || empty($_POST['status_prob'])){
     echo '<a href="configuracao.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('PREENCHA TODOS OS CAMPOS!!');
}


    $usuario = $_SESSION['usuario'];


    if(isset($_POST['update']))
    {
        
        $EquipID = $_GET['ID'];
        $Nserie = $_POST['nserie'];
        $Incid = $_POST['incidentes'];
        $DataInc = $_POST['datainc'];
        $StatusProb = $_POST['status_prob'];
        $Soluc = $_POST['solucao'];
        $StatusProb = $_POST['status_prob'];
        $Nome = $_POST['nome'];


        $query = " update equipamentos set incidentes ='".$Incid."', nserie ='".$Nserie."',  datainc ='".$DataInc."', solucao ='".$Soluc."', status_prob ='".$StatusProb."'  where idequipamento='".$EquipID."'";



        $result = mysqli_query($conexao,$query);

        if($result){
           

        try {
           $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador, datainc, solucao, incidentes, status_prob, nserie, nome) VALUES ('CADASTROU INCIDENTE', NOW(), '$usuario', 'EQUIPAMENTO', '$EquipID', '$DataInc', '$Soluc', '$Incid', '$StatusProb', '$Nserie', '$Nome')";
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