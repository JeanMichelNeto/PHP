<?php
session_start();
include_once'verifica_login.php';
include("conexao.php");

$usuario = $_SESSION['usuario'];


    $EquipID = $_GET['edit'];
    $query = " select * from equipamentos where idequipamento='".$EquipID."'";
    $result = mysqli_query($conexao,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $EquipID = $row['idequipamento'];
        $Nserie = $row['nserie'];
        $Nome = $row['nome'];
        $Descr = $row['descricao'];
        $Local = $row['localizacao'];
        $Status = $row['status'];

        $Cat = $row['categoria'];
        $Tipo = $row['tipo'];
        $Garan = $row['garantia'];
        $Prop = $row['proprietario'];
        $Licen = $row['licenca'];

        
        $Proble = $row['problemas'];
        $Incid = $row['incidentes'];
        $DataAu = $row['dataauditoria'];
        $Config = $row['configuracao'];
        $DataInc = $row['datainc'];
        $Soluc = $row['solucao'];
        $StatusProb = $row['status_prob'];

        
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link rel="icon" href="img/logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



        <title>Administrativo - NeoTech</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="css/theme.css" rel="stylesheet">
        <script src="js/ie-emulation-modes-warning.js"></script>
        <style>
      #mapa {
        height:800px;
        width:1200px;
      }
    </style>
    </head>
    <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="img/logo.png" width="100" id="dashboard">
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Usuários<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="cadastro.php">Cadastrar</a></li>
                            <li><a href="edit_user.php">Gerenciar</a></li>
                            <li><a href="logs_user.php">Logs</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Rotas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="rotas.php">Cadastrar</a></li>
                            <li><a href="edit_rota.php">Gerenciar</a></li>
                            <li><a href="logs_rota.php">Logs</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipamentos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="equipamentos.php">Cadastrar</a></li>
                            <li><a href="edit_equip.php">Gerenciar</a></li>
                            <li><a href="logs_equip.php">Logs</a></li>
                            <li><a href="logs_inc.php">Logs Incidentes</a></li>
                            <li><a href="logs_prob.php">Logs Problemas</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuração<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="configuracao.php">Configurar Equipamento</a></li>
                             <li><a href="logs_config.php">Logs</a></li>
                        </ul>
                    </li>
                    
                     <li><a href="base.php">Soluções</a></li>
                    <li><a href="logout.php">Sair</a></li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

        <body>   
        <div class="container d-flex">
            <div class="row align-itens-center">
                <div class="">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">SOLUÇÃO DE PROBLEMAS</h3>
                        </div>
                        <div class="form-row">

                            <form action="update_inc.php?ID=<?php echo $EquipID ?>" method="post">
                                <div class="form-group col-md-6">
                                <label>N° de Série</label>
                                <input type="text" class="form-control mb-2" placeholder=" N° de Série " name="nserie" value="<?php echo $Nserie ?>" disabled>
                                <input type="hidden" class="form-control mb-2" placeholder=" N° de Série " name="nserie" value="<?php echo $Nserie ?>">
                                 </div>
                                <div class="form-group col-md-6">
                                <label>Nome</label>
                                <input type="text" class="form-control mb-2" placeholder=" Nome " name="nome" value="<?php echo $Nome ?>" disabled>
                                 <input type="hidden" class="form-control mb-2" placeholder=" N° de Série " name="nome" value="<?php echo $Nome ?>">
                                 </div>
                                <div class="form-group col-md-6">
                                <label>Descrição</label>
                                <input type="text" class="form-control mb-2" placeholder=" Descrição " name="descricao" value="<?php echo $Descr ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                <label>Localização</label>
                                <input type="text" class="form-control mb-2" placeholder=" Localização " name="localizacao" value="<?php echo $Local ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                <label>Status</label>
                                <input type="text" class="form-control mb-2" placeholder=" Status " name="status" value="<?php echo $Status ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                <label>Categoria</label>
                                <input type="text" class="form-control mb-2" placeholder=" Categoria " name="categoria" value="<?php echo $Cat ?>" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                <label>Tipo</label>
                                <input type="text" class="form-control mb-2" placeholder=" Tipo " name="tipo" value="<?php echo $Tipo ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                <label>Garantia</label>
                                <input type="text" class="form-control mb-2" placeholder=" Garantia " name="garantia" value="<?php echo $Garan ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                 <label>Proprietário</label>
                                <input type="text" class="form-control mb-2" placeholder=" Proprietário " name="proprietario" value="<?php echo $Prop ?>" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                 <label>Licença</label>
                                <input type="text" class="form-control mb-2" placeholder=" Licença " name="licenca" value="<?php echo $Licen ?>" disabled>
                                </div>
            
                                </div>
                                <br>
                                    <div class="container"></div>
                                    <div class="container col-md-2">   
                                    
                                
                                    <input type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-1)"> 
                            </div> 
                            </form>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
<br/>
    <div class="container">
        <table class="table table-bordered" border="2">
        <thead>
        <tr> 
          <th scope="col">ID EQUIPAMENTO</th>
          <th scope="col">USUÁRIO</th>
          <th scope="col">N° DE SÉRIE</th>
          <th scope="col">DATA E HORA DO INCIDENTE</th>
          <th scope="col">INCIDENTES</th> 
          <th scope="col">PROBLEMAS</th> 
          <th scope="col">SOLUÇÃO APRESENTADA</th>
          <th scope="col">STATUS</th>
        </tr>
        </thead>
        <tbody>
            
        <?php
        $result_auditoria = "SELECT * FROM auditoria WHERE identificador = '$EquipID' AND nomeacao = 'CADASTROU PROBLEMA' OR nomeacao = 'CADASTROU INCIDENTE'";
        $resultado_audit = mysqli_query($conexao, $result_auditoria);
        while($row_audit = mysqli_fetch_assoc($resultado_audit)){
            
              echo "<tr>";
              echo "<td>" . $row_audit['identificador'] . "</td>"; 
              echo "<td>" . $row_audit['usuario'] . "</td>";
              echo "<td>" . $row_audit['nserie'] . "</td>";
              echo "<td>" . $row_audit['datainc'] . "</td>";
              echo "<td>" . $row_audit['incidentes'] . "</td>";
              echo "<td>" . $row_audit['problemas'] . "</td>";
              echo "<td>" . $row_audit['solucao'] . "</td>";
              echo "<td>" . $row_audit['status_prob'] . "</td>";
              echo "</tr>";
        }

        ?>
        
        </tbody>

        </table>
        </div>
</body>

</html>