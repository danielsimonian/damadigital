<?php
  require_once "../models/validador_acesso.php";
  require "../connection/conexao.php";

  $idCliente = $_GET['id_user'];

  $sql = "SELECT * FROM tb_user WHERE id_user = " . $idCliente;
  $res = mysqli_query($link, $sql);
  $cliente = mysqli_fetch_assoc($res);

  if($_POST){
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    mysqli_query ($link, "UPDATE tb_user SET `name` = '$name', `tel` = '$tel', `email` = '$email' WHERE id_user =" . $idCliente);
    header ('Location: clientes_info.php?id_user=' . $idCliente . '&cadastro=sucesso');
  }

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
      <h5>Editar cadastro de<br></h5><h1 class="text-light"><?php echo strtoupper($cliente['name']); ?></h1>
    </section>
    <section class="card text-bg-light mt-5 h-auto m-auto" style="width: 350px;">
    <div class="card-header text-bg-secondary text-light">
        Cadastro
      </div>
      <div class="card-body text-bg-light">
        <form class="row justify-content-center" action="" method="POST">
          <div class="mb-2 col-11">
            <input class="form-control" name="name" type="text" value="<?php echo $cliente['name'];?>">
          </div>
          <div class="mb-2 col-11">
            <input class="form-control" name="tel" type="tel" value="<?php echo $cliente['tel'];?>">
          </div>
          <div class="mb-2 col-11">
            <input class="form-control" name="email" type="email" value="<?php echo $cliente['email'];?>">
          </div>
          <button class="btn btn-outline-secondary col-10" type="submit">
            Editar
          </button>
      </div>  
    </section>
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