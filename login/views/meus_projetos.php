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
  <nav class="bg-dark">
    <div class="">
      <div>
        <a class="navbar-brand" href="home.php">
            <img src="../img/dama/logo_dama_branco.png" width="90" class="d-inline-block align-top" alt="">
        </a>
      </div>
      <div class="text-light">
          <?php echo ($_SESSION['nome'] . ",&nbsp"); ?><a class="link-offset-2 link-underline link-underline-opacity-0" href="../models/logoff.php">logoff</a>
      </div>
    </div>
  </nav>
  <main class="container">
    <section class="section text-center m-4">
      <h1>Meus Projetos</h1>
    </section>
    <section>
      <div class="container">
        <div class="row g-2 justify-content-center">
          <?php 
            $userPerfil = $_SESSION['perfil'];
            $userId = $_SESSION['id_user'];
            foreach($chamados as $chamado){
              if ($userPerfil != 'adm' && $chamado['id_user'] != $userId) {
                continue;
              }?>
              <div class="col-12 col-md-3">
                <div class="card">
                  <div class="card-body">
                    <h5><?php echo $chamado['titulo'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado['categoria'] ?></h6>
                    <p class="card-text"><?php echo $chamado['descricao'] ?></p>
                    <p class="card-text"><strong>Status: </strong><?php echo $chamado['status'] ?></p>
                    <?php if ($userPerfil == 'adm') { ?>
                      <p class="card-text"><strong>Nome do usuário: </strong><?php echo $chamado['nome'] ?></p>
                      <p class="card-text"><strong>ID do usuário: </strong><?php echo $chamado['id_user'] ?></p>
                    <?php } ?>   
                  </div>
                </div>
              </div>
            <?php } ?>   
          </div>
        </div>
      </section>
    </main>
  </body>
</html>