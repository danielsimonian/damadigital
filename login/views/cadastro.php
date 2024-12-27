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
      <a class="navbar-brand" href="index.php">
        <img src="../img/dama/logo_dama_branco.png" width="90" height="" class="d-inline-block align-top" alt="">
      </a>
    </div>
  </nav>
  <main class="container">
    <section class="card text-bg-light mt-5 h-auto m-auto" style="width: 350px;">
      <div class="text-center card-header text-bg-secondary text-light">
        Cadastrar novo cliente
      </div>
      <div class="card-body text-bg-light">
        <form class="row justify-content-center" action="../models/registra_cadastro.php" method="POST">
          <div class="mb-2 col-11">
            <input class="form-control" name="name" type="text" placeholder="Nome">
          </div>
          <div class="mb-2 col-11">
            <input class="form-control" name="tel" type="tel" placeholder="Celular com DDD" maxLength="11">
          </div>
          <div class="mb-2 col-11">
            <input class="form-control" name="email" type="email" placeholder="E-mail">
          </div>
          <div class="mb-2 col-11">
            <input class="form-control" name="password" type="password" placeholder="Senha">
          </div>
          <div class="form-group mb-2 col-11">
                <select class="form-control" name="profile" required>
                  <option disabled selected value="" style="text-align: center;">Selecione o perfil</option>
                  <option name="cliente" value="cliente">Cliente</option>
                  <option name="adm" value="adm">Administrador</option>
                </select>
              </div>
          <button class="btn btn-outline-secondary col-10" type="submit">
            Cadastrar
          </button>
      </div>  
    </section>
  
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'email') { ?>   
      <script>
          alert('E-mail já cadastrado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'tel') { ?>   
      <script>
          alert('Celular já cadastrado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
  </main>  
</body>
</html>