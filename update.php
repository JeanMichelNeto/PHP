<?php 
     session_start();
    include("conexao.php");
    include_once'verifica_login.php';

    


    if(isset($_POST['update']))
    {
        $UserID = $_GET['ID'];
        $UserNome = $_POST['nome'];
        $User = $_POST['usuario'];
        $UserAcc = md5($_POST['senha']);

        $usuario = $_SESSION['usuario'];

        $query = " update usuario set nome = '".$UserNome."', usuario ='".$User."', senha ='".$UserAcc."' where idusuario='".$UserID."'";
        $result = mysqli_query($conexao,$query);

        if($result){

        try {
        $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('AlTERAÇÃO', NOW(), '$usuario', 'USUARIO', '$UserID')";
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
           echo "Editado Com Sucesso!";
           echo "<br>";
           echo '<a href="edit_user.php"">Voltar';
        }else{
            echo ' Please Check Your Query ';

         }
        } else {
        header("location:painel.php");
        }


?>