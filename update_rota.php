<?php 

session_start();
include_once'verifica_login.php';
include("conexao.php");

    $usuario = $_SESSION['usuario'];

    if(isset($_POST['update']))
    {
        $RotaID = $_GET['ID'];
        $Descr = $_POST['descricao'];
        $Pincial = $_POST['pontoini'];
        $Pfinal = $_POST['pontofim'];

        $query = " update rota set descricao = '".$Descr."', pontoini ='".$Pincial."', pontofim ='".$Pfinal."' where idrota='".$RotaID."'";
        $result = mysqli_query($conexao,$query);

        if($result){

         
            try {
                $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('ATUALIZOU', NOW(), '$usuario', 'ROTA', '$RotaID')";

                $conexao->query($sqllog);

} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}
           echo "Editado Com Sucesso!";
           echo "<br>";
           echo '<a href="edit_rota.php"">Voltar';
        }else{
            echo ' Please Check Your Query ';

         }
        } else {
        header("location:edit_rota.php");
        }


?>