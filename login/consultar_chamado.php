<?php
  require_once "validador_acesso.php";
  require "app_help_desk_seguranca/conexao.php";

  $chamados = mysqli_query($link, "SELECT TB_CHAMADOS.*, TB_USER.nome
  FROM TB_CHAMADOS
  INNER JOIN TB_USER ON TB_CHAMADOS.id_user = TB_USER.id_user");
?>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="./img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            

            
            <div class="card-body">
              
            <!-- Rodamos um foreach passando por todos os chamados -->
              <?php 
                $userPerfil = $_SESSION['perfil'];
                $userId = $_SESSION['id_user'];

                

              foreach($chamados as $chamado){ 
                
                if ($userPerfil != 'adm' && $chamado['id_user'] != $userId) {
                  continue;
              }
                
                ?>
                
              <div class="card mb-3 bg-light">
                <div class="card-body">

                  <!-- Nos 3 itens abaixo aplicamos os valores respectivos em cada um deles -->
                  <h5 class="card-title"><?php echo $chamado['titulo'] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado['categoria'] ?></h6>
                  <p class="card-text"><?php echo $chamado['descricao'] ?></p>
                  <p class="card-text"><strong>Status: </strong><?php echo $chamado['status'] ?></p>
                  <?php if ($userPerfil == 'adm') { ?>
                    <p class="card-text"><strong>Nome do usuário: </strong><?php echo $chamado['nome'] ?></p>
                    <p class="card-text"><strong>ID do usuário: </strong><?php echo $chamado['id_user'] ?></p>
                    <?php } ?>            
                </div>
              </div>
              <?php } ?>
            
              
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>