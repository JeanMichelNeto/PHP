<?php
if(!isset($_SESSION)){
session_start();
}
include('conexao.php');


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
                <a href="painel.php"><img src="img/logo.png" width="100" id="dashboard"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Usuários<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="cadastro.php">Novo</a></li>
                            <li><a href="edit_user.php">Gerenciar</a></li>
                            <li><a href="logs_user.php">Logs</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Rotas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="rotas.php">Novo</a></li>
                            <li><a href="edit_rota.php">Gerenciar</a></li>
                            <li><a href="logs_rota.php">Logs</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipamentos<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="equipamentos.php">Novo</a></li>
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
        <div class="container">
        <table class="table table-bordered" border="2">
        <thead>
        <tr> 
          <th scope="col">ID EQUIPAMENTO</th>
          <th scope="col">USUÁRIO QUE REALIZOU A AÇÃO</th>
          <th scope="col">NOME</th> 
          <th scope="col">N° DE SÉRIE</th> 
          <th scope="col">AÇÃO REALIZADA</th> 
          <th scope="col">DATA LOG</th> 
        </tr>
        </thead>
        <tbody>
            
        <?php
        $result_auditoria = "SELECT * FROM auditoria WHERE tabela = 'EQUIPAMENTO'";
        $resultado_audit = mysqli_query($conexao, $result_auditoria);
        while($row_audit = mysqli_fetch_assoc($resultado_audit)){
            
              echo "<tr>";
              echo "<td>" . $row_audit['identificador'] . "</td>"; 
              echo "<td>" . $row_audit['usuario'] . "</td>";
              echo "<td>" . $row_audit['nome'] . "</td>";
              echo "<td>" . $row_audit['nserie'] . "</td>";
              echo "<td>" . $row_audit['nomeacao'] . "</td>";
              echo "<td>" . $row_audit['dataauditoria'] . "</td>";
              echo "</tr>";
        }

        ?>
        
        </tbody>

        </table>
    </div>
    </body>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>