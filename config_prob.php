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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">

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
                        </ul>
                    </li>
                    
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuração<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="configuracao.php">Configurar Equipamento</a></li>
                            <li><a href="logs_config.php">Logs</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Incidentes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="config_incidentes.php">Reportar Incidente</a></li>
                            <li><a href="logs_inc.php">Logs</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Problemas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="config_prob.php">Reportar Problema</a></li>
                            <li><a href="logs_prob.php">Logs</a></li>
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
        <h4 align="center">Pesquisar Problema</h4>
        <form class="form-inline" method="post" action="pesquisar_problemas.php?edit=" align="center">
          <div class="form-group mb-2">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Equipamento</label>
            <input type="text" class="form-control" placeholder="Digite o Nome ou Problema do Equipamento" name="problemas">
          </div>
          <button type="submit" class="btn btn-primary mb-2">Buscar</button>
        </form>
        <div class="container">
        <table class="table">
        <thead>
        <tr> 
          <th scope="col">ID Equipamento</th> 
          <th scope="col">N° Série</th> 
          <th scope="col">Nome</th>
            <th scope="col">Problemas</th>
           <th scope="col">Descrição</th> 
          <th scope="col">Localização</th>
           <th scope="col">Status</th>  
          <th scope="col">Data e Hora Cadastro</th>
          <th scope="col">Cadastrar Problemas</th>
        </tr>
        </thead>
        <tbody>
            
        <?php
        $result_equip = "SELECT * FROM equipamentos";
        $resultado_equip = mysqli_query($conexao, $result_equip);
        while($row_equip = mysqli_fetch_assoc($resultado_equip)){
            
              echo "<tr>";
              echo "<td>" . $row_equip['idequipamento'] . "</td>"; 
              echo "<td>" . $row_equip['nserie'] . "</td>";
              echo "<td>" . $row_equip['nome'] . "</td>";
              echo "<td>" . $row_equip['problemas'] . "</td>";
              echo "<td>" . $row_equip['descricao'] . "</td>";
              echo "<td>" . $row_equip['localizacao'] . "</td>";
              echo "<td>" . $row_equip['status'] . "</td>";
              echo "<td>" . $row_equip['data_cadastro'] . "</td>";
              echo '<td><a href="problemas.php?edit='.$row_equip['idequipamento'].'""><i class="material-icons">add_box</i></td>';
              echo "</tr>";
        }

        ?>
        
        </tbody>

        </table>

        
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