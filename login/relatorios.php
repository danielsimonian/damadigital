<?php
  require_once "validador_acesso.php";
  require_once "relatorios_contador.php";
  require_once "validador_user.php";
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
        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <a id="link" href="relatorios_aberto.php">
            <div class="container-card-dan">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/abertos.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p class="text-danger">Aberto (<?php echo $totalAberto?>)</p>
                  </div>
                </div>
              </a>

              <a id="link" href="./relatorios_andamento.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/andamento.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p  class="text-warning">Em Andamento (<?php echo $totalAndamento?>)</p>
                  </div>
                </div>
              </a>

              <a id="link" href="./relatorios_finalizado.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/finalizados.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p  class="text-success">Finalizado (<?php echo $totalFinalizado?>)</p>
                  </div>
                </div>
              </a>
             
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>   
      <script>
          alert('Cadastrado com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } if (isset($_GET['erro']) && $_GET['erro'] === 'erro') { ?>
      <script>
          alert('Erro ao cadastrar!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } if (isset($_GET['acessonegado']) && $_GET['acessonegado']) {?>
      <script>
          alert('Acesso Negado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
  </body>
</html>