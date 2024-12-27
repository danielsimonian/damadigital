<?php
  require_once "../models/validador_acesso.php";
  require "../connection/conexao.php";

  $idCliente = $_GET['id_user'];

  $sql = "SELECT * FROM tb_user WHERE id_user = " . $idCliente;
  $res = mysqli_query($link, $sql);
  $cliente = mysqli_fetch_assoc($res);
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
    <div class="">
      <a href="../models/logoff.php"><button class="btn btn-dark">Sair</button></a>
    </div>
  </nav>
  <main class="container">
    <section class="section text-center m-4">
      <h1 class="text-light"><?php echo strtoupper($cliente['name']); ?></h1>
    </section>
    <section class="d-flex flex-wrap justify-content-center section border border-light rounded p-4 gap-3">
      <?php
        $usuarioPerfil = $_SESSION['profile'];
        if ($usuarioPerfil == 'adm'){
//HOME ADM      ?>
              <div class="card btn btn-light justify-content-center" style="width:200px;height:200px">
                <a href="servico_cliente.php?id_user=<?php echo $idCliente ?>" class="text-dark link-offset-2 link-underline link-underline-opacity-0">
                  <div class="card-body d-flex flex-column justify-content-center">
                    <div>
                      <img src="../img/icons/clientes.png" width="70" height="70">
                    </div>
                    <div class="mt-2">
                      Serviços
                    </div>
                  </div>
                </a>
              </div>

              <div class="card btn btn-light justify-content-center" style="width:200px;height:200px">
                <a href="clientes_edit.php?id_user=<?php echo $idCliente?>" class="text-dark link-offset-2 link-underline link-underline-opacity-0">
                  <div class="card-body d-flex flex-column justify-content-center">
                    <div>
                      <img src="../img/icons/novo-servico.png" width="70" height="70">
                    </div>
                    <div class="mt-2">
                      Editar Cadastro
                    </div>
                  </div>
                </a>
              </div>

              <div class="card btn btn-light justify-content-center" style="width:200px;height:200px">
                <a href="../models/clientes_excluir.php?id_user=<?php echo $idCliente; ?>" class="text-dark link-offset-2 link-underline link-underline-opacity-0">
                  <div class="card-body d-flex flex-column justify-content-center">
                    <div>
                      <img src="../img/icons/deletar-usuario.png" width="70" height="70">
                    </div>
                    <div class="mt-2">
                      Excluir Cliente
                    </div>
                  </div>
                </a>
              </div>
          
        <?php } ?>

    </section>

</main>
        
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>   
      <script>
          alert('Cadastrado com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script> 
    <?php } ?>
    
    <?php if (isset($_GET['cadastro']) && $_GET['cadatro'] === 'erro') { ?>
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