<?php
  require_once "validador_acesso.php";
  require "app_help_desk_seguranca/conexao.php";
  require_once "validador_user.php";

  $chamados = mysqli_query($link, "SELECT tb_chamados.*, tb_user.*
  FROM tb_chamados
  INNER JOIN tb_user ON tb_chamados.id_user = tb_user.id_user");
?>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <link rel="stylesheet" href="css/style.css">
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
              <th>Status</th>
              <th>Título</th>
              <th>Categoria</th>
              <th>Descrição</th>
              <th>ID</th>
              <th>Nome</th>
              <th>Perfil</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php          

              foreach($chamados as $chamado){ ?>

              <tr>
                  <!-- Nos 3 itens abaixo aplicamos os valores respectivos em cada um deles -->
                  <td><?php echo $chamado['id_chamado'] ?></td>
                  <td   class="
                      <?php
                        // Verifique o status e aplique a classe correspondente
                        if ($chamado['status'] === 'Aberto') {
                          echo 'status-aberto';
                        } elseif ($chamado['status'] === 'Finalizado') {
                          echo 'status-finalizado';
                        } elseif ($chamado['status'] === 'Em Andamento') {
                          echo 'status-andamento';
                        }
                      ?>
                    "><?php echo $chamado['status'] ?></td>
                  <td><?php echo $chamado['titulo'] ?></td>
                  <td><?php echo $chamado['categoria'] ?></td>
                  <td><?php echo $chamado['descricao'] ?></td>
                  <td><?php echo $chamado['id_user'] ?></td>
                  <td><?php echo $chamado['nome'] ?></td>
                  <td><?php echo $chamado['perfil'] ?></td>
                  <td class="acao">
                <div>
                  <a href="editar_chamado_edit.php?id_chamado=<?php echo $chamado['id_chamado']?>"><input type="button" value="Editar"></a>
                </div>
                <div>
                <a href="excluir_chamado.php?id_chamado=<?php echo $chamado['id_chamado']?>"><input type="button" value="Excluir"></a>
                </div>
              </td>
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