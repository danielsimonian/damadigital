<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="card text-bg-light mt-5 h-auto m-auto" style="width: 350px;">
      <div class="card-header text-bg-secondary text-light">
        Login
      </div>
      <div class="card-body text-bg-light">
        <form class="row justify-content-center" action="../models/valida_login.php" method="POST">
          <div class="mb-2 col-11">
            <input class="form-control" name="email" type="email" placeholder="E-mail">
          </div>
          <div class="mb-2 col-11">
            <input class="form-control" name="senha" type="password" placeholder="Senha">
          </div>
          
          <div class="text-end mb-2 col-11">
            <a class="text-primary link-offset-2 link-underline link-underline-opacity-0 small" href="cadastro.php">
              Novo? Cadastre-se
            </a>
          </div>
          <button class="btn btn-outline-secondary col-10" type="submit">
            Entrar
          </button>

            <?php
              //VALIDA SE O PARÂMETRO LOGIN EXISTE E SE FOI AUTENTICADO
              if (isset($_GET['login']) && $_GET['login'] === 'erro') { ?>
                <div class="mt-2 text-center text-danger">
                  Usuário ou senha inválido(s)!
                </div>
                <script>
                  window.history.replaceState(null, null, window.location.pathname);
                </script>
            <?php } 
              //VALIDA SE O USUÁRIO TENTOU ENTRAR EM OUTRA PÁGINA SEM LOGAR
              if (isset($_GET['login']) && $_GET['login'] === 'erro2') { ?>
                <div class="mt-2 text-center text-danger"> Login obrigatório!</div>
                <script>
                  window.history.replaceState(null, null, window.location.pathname);
                </script>
            <?php } ?>  
        </form>
      </div>
    </div>  
  </main>

    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>   
      <script>
        alert('Usuário cadastrado com sucesso!');
        window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>