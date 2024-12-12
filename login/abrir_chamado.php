<?php
  require_once "validador_acesso.php";
  require "app_help_desk_seguranca/conexao.php";
?>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="./img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <a href="home.php"><button class="btn btn-dark">Voltar</button></a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
              <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'efetuado') { ?>
              <div style="color: green;">
                <script>
                  alert('Chamado cadastrado com sucesso!')
                </script>
              </div>
            <?php } ?>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method = 'POST' action="registra_chamado.php">
                    <div class="form-group">
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Título">
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="categoria" class="form-control">
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea maxlength="50" name="descricao" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a href="./home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'fail') { ?>   
      <script>
          alert('Não Cadastrado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>
  </body>
</html>