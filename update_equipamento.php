<?php 

session_start();
include_once'verifica_login.php';
include("conexao.php");

    $usuario = $_SESSION['usuario'];


    if(isset($_POST['update']))
    {
        $EquipID = $_GET['ID'];
        $Nserie = $_POST['nserie'];
        $Nome = $_POST['nome'];
        $Descr = $_POST['descricao'];
        $Local = $_POST['localizacao'];
        $Status = $_POST['status'];

        $Cat = $_POST['categoria'];
        $Tipo = $_POST['tipo'];
        $Garan = $_POST['garantia'];
        $Prop = $_POST['proprietario'];
        $Licen = $_POST['licenca'];

        
       


        $query = " update equipamentos set nserie = '".$Nserie."', nome ='".$Nome."', descricao ='".$Descr."', localizacao ='".$Local."', status ='".$Status."', categoria ='".$Cat."', tipo ='".$Tipo."', garantia ='".$Garan."', proprietario ='".$Prop."', licenca ='".$Licen."' where idequipamento='".$EquipID."'";

        $result = mysqli_query($conexao,$query);

        if($result){

         $last_id = $conexao->insert_id;

        try {
           $sqllog = "INSERT INTO auditoria (nomeacao, dataauditoria, usuario, tabela, identificador) VALUES ('ALTEROU', NOW(), '$usuario', 'EQUIPAMENTO', '$EquipID')";
            $conexao->query($sqllog);

        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }



           echo "Editado Com Sucesso!";
           echo "<br>";
           echo '<a href="edit_equip.php"">Voltar';
        }else{
            echo ' Please Check Your Query ';

         }
        } else {
        header("location:edit_equip.php");
        }


?>