<?php
if(!isset($_SESSION)){
session_start();
}
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
		<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
		<link rel="icon" href="img/logo.png">



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
	
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h3>LOCALIZAÇÃO DOS EQUIPAMENTOS</h3>
		</div>
		<div id='map' style='width: 1200px; height: 1000px;'></div>
			<script>
			mapboxgl.accessToken = 'pk.eyJ1IjoiamVhbm1pY2hlbG5ldG8iLCJhIjoiY2tnNnk2enp0MDIyMjJza2NmamJ6ZDZ6cCJ9.i56u2yJWHp36FAfgGSCQPA';
				var map = new mapboxgl.Map({
				container: 'map',
				style: 'mapbox://styles/mapbox/streets-v11'
				});

				var nav = new mapboxgl.NavigationControl();
                 map.addControl(nav, 'top-left');


                 map.addControl(new mapboxgl.GeolocateControl({
				positionOptions: {
					enableHighAccuracy: true
						},
						trackUserLocation: true
						}));


					</script>


		</div>

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