<?php
session_start();
include('conexao.php');

?>


<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA DE CONFIGURAÇÃO - NEOTECH PROVEDOR</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">CADASTRO DE USUÁRIOS</h3>
                    <img src="img/logo.png">
                  

                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label class="label">Nome</label>
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label">Usuário</label>
                                    <input name="usuario" type="text" class="input is-large" placeholder="Usuário">

                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label">Senha</label>
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth is-success">Cadastrar</button>
                            <br>
                            <input type="button" class="button is-block is-link is-large is-fullwidth is-info" value="Voltar" onClick="history.go(-1)"> 
                        </br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>