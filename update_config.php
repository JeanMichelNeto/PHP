<?php 

  session_start();
    include_once'verifica_login.php';
    include("conexao.php");

    if(empty($_POST['configuracao']) || empty($_POST['dataauditoria'])){
     echo '<a href="configuracao.php"">Clique Para Voltar!</a>';
     echo "<br/>";
    die('PREENCHA TODOS OS CAMPOS!!');
}


    $usuario = $_SESSION['usuario'];

    if(isset($_POST['update']))
    {
        
        $EquipID = $_GET['ID'];
        $DataAu = $_POST['dataauditoria'];
        $Config = $_POST['configuracao'];
        $Nome = $_POST['nome'];



        $query = " update equipamentos set configuracao ='".$Config."', dataauditoria ='".$DataAu."', dataconfiguracao = NOW()  where idequipamento='".$EquipID."'";



        $result = mysqli_query($conexao,$query);

        if($result){
          

        try {
           $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador, nome, descricao) VALUES ('CONFIGUROU', NOW(), '$usuario', 'EQUIPAMENTO', '$EquipID', '$Nome', '$Config' )";
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }

           echo "Configurado Com Sucesso!";
           echo "<br>";
           echo '<a href="configuracao.php"">Voltar';
        }else{
            echo 'Erro ao Configurar ';

         }
        } else {
        header("location:configuracao.php");
        }


?>