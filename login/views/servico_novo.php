<?php
  require_once "../models/validador_acesso.php";
  require_once "../connection/conexao.php";

  //carregar todos os clientes do banco
  $sql = "SELECT name, id_user FROM tb_user WHERE profile = 'cliente'";
  $res = mysqli_query($link, $sql);

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
  <nav class="bg-dark">
    <div class="">
      <div>
        <a class="navbar-brand" href="home.php">
            <img src="../img/dama/logo_dama_branco.png" width="90" class="d-inline-block align-top" alt="">
        </a>
      </div>
      <div class="text-light">
          <?php echo ($_SESSION['name'] . ",&nbsp"); ?><a class="link-offset-2 link-underline link-underline-opacity-0" href="../models/logoff.php">logoff</a>
      </div>
    </div>
  </nav>
  
  <main class="container">
    <section class="card text-bg-light mt-5 h-auto m-auto" style="width: 500px;">
      <div class="text-center card-header text-bg-secondary text-light">
        Cadastrar novo serviço

        <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'efetuado') { ?>
          <div style="color: green;">
            <script>
              alert('Chamado cadastrado com sucesso!')
            </script>
          </div>
        <?php } ?>

      </div>

      <div class="card-body text-bg-light">
        <form class="row justify-content-center" action="../models/cadastra_servico.php" method="POST">

        <div class="mb-2 col-11">
            <select name="clientes" class="form-control">
              <option disabled selected readonly>Selecione um cliente</option>
              <?php
                

                while ($cliente = mysqli_fetch_assoc($res)) {
                  echo "<option value=" . strtolower($cliente['id_user']) . ">" . $cliente['name'] . "</option>";
                }
              ?>
            </select>
          </div>
          
          <div class="mb-2 col-11">
            <input name="service" type="text" class="form-control" placeholder="Serviço">
          </div>

          <div class="mb-2 col-11">
            <textarea maxlength="50" name="descricao" class="form-control" rows="3" placeholder="Descrição do serviço"></textarea>
          </div>

          <div class="mb-2 col-11">
            <input name="date" type="date" class="form-control" placeholder="Data">
          </div>

          <div class="mb-2 col-11 input-wrapper">
            <input name="money" class="form-control" type="text" id="money" placeholder="0,00">
          </div>

          <div class="row">
            <div class="mt-3 col-12 text-center">
              <button class="w-50 btn btn-outline-secondary" type="submit">Cadastrar</button>
            </div>
          </div>
        </form>
    </section>
  </main>

    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'fail') { ?>   
      <script>
          alert('Não Cadastrado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>
    <script src="../js/script.js"></script>
  </body>
</html>


