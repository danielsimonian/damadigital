<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="./img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-login">
        <div class="card">
          <div class="card-header">
            Cadastre-se
          </div>
          <div class="card-body">
            <form action="registra_cadastro.php" method="POST">
              <div class="form-group">
                <input name="nome" type="text" class="form-control" placeholder="Nome Completo" required>
              </div>
              <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="E-mail" required>
              </div>
              <div class="form-group">
                <input name="senha" type="password" class="form-control" placeholder="Senha" required>
              </div>
              <div class="form-group">
                <select class="form-control" name="perfil" id="" required>
                  <option disabled selected value="" style="text-align: center;">Selecione o nível</option>
                  <option name="usuario" value="usuario">Usuário</option>
                  <option name="administrador" value="administrador">Administrador</option>
                </select>
              </div>
              <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'erro') { ?>   
      <script>
          alert('E-mail já existente!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
</body>
</html>