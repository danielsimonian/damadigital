<?php
  require_once "validador_acesso.php";
  require "app_help_desk_seguranca/conexao.php";  require_once "validador_user.php";
  
  $chamados = mysqli_query($link, "SELECT * FROM TB_USER WHERE `perfil` = 'administrador'");
?>

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
      <a href="home.php"><button class="btn btn-dark">Voltar</button></a>
    </nav>

    <main>
      <session class="container-tabela">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Usuário</th>
              <th>E-mail</th>
              <th>Perfil</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php          
           

              foreach($chamados as $chamado){ ?>
              <tr>
                  <!-- Nos 3 itens abaixo aplicamos os valores respectivos em cada um deles -->
                  <td><?php echo $chamado['id_user'] ?></td>
                  <td><?php echo $chamado['nome'] ?></td>
                  <td><?php echo $chamado['email'] ?></td>
                  <td><?php echo $chamado['perfil'] ?></td>
                  <td class="acao">
                    <div>
                      <a href="autoriza_usuario.php?id_user=<?php echo $chamado['id_user'] . "&autorizar=sim"?>"><input type="button" value="Sim"></a>
                    </div>
                    <div>
                    <a href="autoriza_usuario.php?id_user=<?php echo $chamado['id_user'] . "&autorizar=nao"?>"><input type="button" value="Não"></a>
                    </div>
                  </td>
              </tr>

              <?php } ?>
              
          </tbody>
        </table>
      </session>
    </main>
    <?php if (isset($_GET['autorizado']) && $_GET['autorizado'] === 'sim') {?>
      <script>
          alert('Autorizado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } if (isset($_GET['autorizado']) && $_GET['autorizado'] === 'nao') {?>
      <script>
          alert('Não Autorizado!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
    
  </body>
</html>