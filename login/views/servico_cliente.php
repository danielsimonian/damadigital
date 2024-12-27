<?php
  require_once "../models/validador_acesso.php";
  require "../connection/conexao.php";

  $idCliente = $_GET['id_user'];
  $sql = "SELECT * FROM tb_order WHERE id_user = " . $idCliente;
  $res = mysqli_query($link, $sql);  

  $nomeCliente = "SELECT name FROM tb_user WHERE id_user = " . $idCliente;
  $resNome = mysqli_query($link, $nomeCliente);
  $cliente = mysqli_fetch_assoc($resNome);

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
    <section class="section text-center m-4">
      <h1>Serviços de <?php echo $cliente['name']; ?></h1>
    </section>
    
    <section>
      <div class="container">
        <div class="row g-2 justify-content-center">

          <?php
            while ($servicos = mysqli_fetch_assoc($res)) {
          ?>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
              <a class="text-dark link-offset-2 link-underline link-underline-opacity-0" href="editar_servico.php?id_order=<?php echo $servicos['id_order']?>&id_user=<?php echo $idCliente ?>">
                <div class="card h-100 btn btn-light">
                    <div class="card-body row text-center align-items-center">
                      <div class="col-9 col-sm-9 col-md-12 order-md-2">
                        <h5><?php echo $servicos['service'] ?></h5>
                        <p class="card-text"><?php echo $servicos['description'] ?></p>
                      </div>
                      <div class="col-3 col-sm-3 col-md-12 order-md-1 text-center p-1 align-self-center" style="">
                        <img class="w-50" src="../img/icons/profile-he.png" alt="">
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>   
          </div>
        </div>
      </section>
  </main>
            
  <?php if (isset($_GET['exclui']) && $_GET['exclui'] === 'sucesso') { ?>   
      <script>
          alert('Serviço excluido com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>
    
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>   
      <script>
          alert('Serviço editado com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>

  </body>
</html>