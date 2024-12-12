<?php
  require_once "validador_acesso.php";
  require "app_help_desk_seguranca/conexao.php";
  require_once "validador_user.php";

  $chamados = mysqli_query($link, "SELECT TB_CHAMADOS.*, TB_USER.* 
  FROM TB_CHAMADOS
  INNER JOIN TB_USER ON TB_CHAMADOS.id_user = TB_USER.id_user
  WHERE TB_CHAMADOS.status = 'Em Andamento'");
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
      <a href="relatorios.php"><button class="btn btn-dark">Voltar</button></a>
    </nav>

    <main>
      <session class="container-tabela">
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Status</th>
              <th>Título</th>
              <th>Categoria</th>
              <th>Descrição</th>
              <th>ID</th>
              <th>Nome</th>
              <th>Perfil</th>
            </tr>
          </thead>
          <tbody>
            <?php          

              foreach($chamados as $chamado){ ?>

              <tr>
                  <!-- Nos 3 itens abaixo aplicamos os valores respectivos em cada um deles -->
                  <td><?php echo $chamado['id_chamado'] ?></td>
                  <td class=""><?php echo $chamado['status'] ?></td>
                  <td><?php echo $chamado['titulo'] ?></td>
                  <td><?php echo $chamado['categoria'] ?></td>
                  <td><?php echo $chamado['descricao'] ?></td>
                  <td><?php echo $chamado['id_user'] ?></td>
                  <td><?php echo $chamado['nome'] ?></td>
                  <td><?php echo $chamado['perfil'] ?></td>
                  
              </tr>
              <?php } ?>
          </tbody>
        </table>
      </session>
    </main>
    <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso') { ?>   
      <script>
          alert('Edição realizada com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } if (isset($_GET['exclui']) && $_GET['exclui'] === 'sucesso') { ?>
      <script>
          alert('Cadastro excluído com sucesso!');
          window.history.replaceState(null, null, window.location.pathname);
      </script>
    <?php } ?>
    <script src="./js/script.js"></script>
  </body>
</html>