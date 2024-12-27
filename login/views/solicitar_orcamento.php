<?php
  require_once "../models/validador_acesso.php";
  require "../connection/conexao.php";

  $chamados = mysqli_query($link, "SELECT tb_chamados.*, tb_user.nome
  FROM tb_chamados
  INNER JOIN tb_user ON tb_chamados.id_user = tb_user.id_user");

?>

<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <title>Dama Digital</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/jpg" href="../img/dama/favicon.ico"/>
  </head>
<body class="bg-secondary">
  <nav class="navbar bg-dark">
    <div class="ms-2">
      <a class="navbar-brand" href="home.php">
        <img src="../img/dama/logo_dama_branco.png" width="90" class="d-inline-block align-top" alt="">
      </a>
    </div>
    <div class="me-2">
      <ul class="navbar-nav">
        <li class="text-light">
          <?php echo ($_SESSION['nome'] . ",&nbsp"); ?>
        </li>
        <li class="text-light">
          <a class="link-offset-2 link-underline link-underline-opacity-0" href="../models/logoff.php">logoff</a>
        </li>
      </ul>
    </div>
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