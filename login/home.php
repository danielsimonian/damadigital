<?php
  require_once "validador_acesso.php";
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
      <a href="logoff.php"><button class="btn btn-dark">Sair</button></a>
    </nav>

    <div class="container">    
      <div class="row">
        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <a id="link" href="abrir_chamado.php">
            <div class="container-card-dan">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/formulario_abrir_chamado.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p>Abrir Chamado</p>
                  </div>
                </div>
              </a>
              <a id="link" href="./consultar_chamado.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/formulario_consultar_chamado.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p>Consultar Chamado</p>
                  </div>
                </div>
              </a>
              <?php
                $usuarioPerfil = $_SESSION['perfil'];

                if ($usuarioPerfil == 'adm'){?>

              <a id="link" href="./editar_chamado.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/editar-arquivo.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p>Editar Chamado</p>
                  </div>
                </div>
              </a>
              <a id="link" href="./autorizar_usuario.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/autorizacao.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p>Autorizar</p>
                  </div>
                </div>
              </a>
              <a id="link" href="./usuarios.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/usuarios.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p>Usuários</p>
                  </div>
                </div>
              </a>
              <a id="link" href="./relatorios.php">
                <div class="card-dan card-header">
                  <div class="card-dan-img">
                    <img src="./img/relatorio.png" width="70" height="70">
                  </div>
                  <div class="card-dan-p">
                    <p>Relatórios</p>
                  </div>
                </div>
              </a>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>   
      <script>
          alert('Cadastrado com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>
    
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'erro') { ?>
      <script>
          alert('Erro ao cadastrar!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>

    <?php if (isset($_GET['acessonegado']) && $_GET['acessonegado'] === 'negado') { ?>   
      <script>
          alert('Acesso Negado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>
  </body>
</html>