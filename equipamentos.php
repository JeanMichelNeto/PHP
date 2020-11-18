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
    <title>SISTEMA DE EQUIPAMENTOS - NEOTECH PROVEDOR</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">CADASTRO DE EQUIPAMENTOS</h3>
                    <img src="img/logo.png">
                     <?php
                    if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                    ?>

                     <?php
                    if(isset($_SESSION['equipamento_existe'])):
                    ?>

                    <div class="notification is-info">
                        <p>Equipamento informado já cadastrado!. Informe outra e tente novamente.</p>
                    </div>
                    
                    <?php
                    endif;
                    unset($_SESSION['equipamento_existe']);
                    ?>

                    <div class="box">
                        <form action="equip.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label class="label">N° Série</label>
                                    <input name="nserie" type="text" class="input is-large" placeholder="N° de Série" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label class="label">Nome</label>
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome">
                                </div>
                                 <div class="control">
                                    <label class="label">Descrição</label>
                                    <input name="descricao" type="text" class="input is-large" placeholder="Descrição">
                                </div>
                                <div class="control">
                                    <label class="label">Localização</label>
                                    <input name="localizacao" type="text" class="input is-large" placeholder="Localização">
                                </div>
                                <div class="control">
                                    <label class="label">Categoria</label>
                                    <input name="categoria" type="text" class="input is-large" placeholder="Categoria">
                                </div>
                                 <div class="control">
                                    <label class="label">Tipo</label>
                                    <input name="tipo" type="text" class="input is-large" placeholder="Tipo">
                                </div>
                                <div class="control">
                                    <label class="label">Garantia</label>
                                    <input name="garantia" type="text" class="input is-large" placeholder="Garantia">
                                </div>
                                <div class="control">
                                    <label class="label">Proprietário</label>
                                    <input name="proprietario" type="text" class="input is-large" placeholder="Proprietário">
                                </div>
                                 <div class="control">
                                    <label class="label">Licença</label>
                                    <input name="licenca" type="text" class="input is-large" placeholder="Licença">
                                </div>
                                <div class="control">
                                    <label class="label">Status</label>
                                    <input name="status" type="text" class="input is-large" placeholder="Status">
                                </div>
                                  </br>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth is-success">Cadastrar</button>
                            <br>
                            <input type="button" class="button is-block is-link is-large is-fullwidth is-info" value="Voltar" onClick="history.go(-1)"> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>