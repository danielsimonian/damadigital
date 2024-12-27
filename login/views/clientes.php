<?php
  require_once "../models/validador_acesso.php";
  require "../connection/conexao.php";

  $cliente = mysqli_query($link, "SELECT * FROM tb_user WHERE profile = 'cliente'");

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
      <h1>Clientes</h1>
    </section>
    <section>
      <div class="container">
        <div class="row g-2 justify-content-center">
          <?php 
            $userPerfil = $_SESSION['profile'];

            if ($userPerfil = 'cliente') {
              foreach($cliente as $clientes){
              
      
              ?>
              <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <a class="text-dark link-offset-2 link-underline link-underline-opacity-0" href="clientes_info.php?id_user=<?php echo $clientes['id_user']?>">
                  <div class="card h-100 btn btn-light">
                    <div class="card-body row text-center align-items-center">
                      <div class="col-9 col-sm-9 col-md-12 order-md-2">
                        <h5><?php echo $clientes['name'] ?></h5>
                        <p class="card-text"><?php echo $clientes['email'] ?></p>
                      </div>
                      <div class="col-3 col-sm-3 col-md-12 order-md-1 text-center p-1 align-self-center" style="">
                        <img class="w-50" src="../img/icons/profile-he.png" alt="">
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php }} ?>   
          </div>
        </div>
      </section>
    </main>
    <?php if (isset($_GET['exclui']) && $_GET['exclui'] === 'sucesso') {?>
      <script>
          alert('Usuário excluido com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
  </body>
</html>