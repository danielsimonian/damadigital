<?php
  require_once "validador_acesso.php";
?>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="img/dama/logo_dama_branco.png" width="90" height="" class="d-inline-block align-top" alt="">
    </a>
  </nav>
  <main>
    <section class="section">
      <a id="link" href="abrir_chamado.php">
      <div class="container-card-dan">
        <div id="card-dan" class="card-dan card-header">
          <div class="card-dan-img">
            <img src="img/icons/project.png" width="70" height="70">
          </div>
          <div class="text-dark">
            <p>Meus Projetos</p>
          </div>
        </div>
      </a>
      <a id="link" href="abrir_chamado.php">
      <div class="container-card-dan">
        <div id="card-dan" class="card-dan card-header">
          <div class="card-dan-img">
            <img src="img/icons/project.png" width="70" height="70">
          </div>
          <div class="text-dark">
            <p>Meus Projetos</p>
          </div>
        </div>
      </a>
      <a id="link" href="abrir_chamado.php">
      <div class="container-card-dan">
        <div id="card-dan" class="card-dan card-header">
          <div class="card-dan-img">
            <img src="img/icons/project.png" width="70" height="70">
          </div>
          <div class="text-dark">
            <p>Meus Projetos</p>
          </div>
        </div>
      </a>
      <a id="link" href="abrir_chamado.php">
      <div class="container-card-dan">
        <div id="card-dan" class="card-dan card-header">
          <div class="card-dan-img">
            <img src="img/icons/project.png" width="70" height="70">
          </div>
          <div class="text-dark">
            <p>Meus Projetos</p>
          </div>
        </div>
      </a>
    </section>
<!-- CLIENTES ATÉ AQUI! -->
<?php
  $usuarioPerfil = $_SESSION['perfil'];
  if ($usuarioPerfil == 'adm'){?>
  
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
</main>
        
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>