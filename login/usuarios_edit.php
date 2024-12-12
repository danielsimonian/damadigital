<?php
  require_once "validador_acesso.php";
  require "app_help_desk_seguranca/conexao.php";

  $sql = "SELECT * FROM tb_user WHERE ID_user = {$_GET['id_user']}";
  $res = $link->query($sql);
  $row = $res->fetch_object();

  
    if($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $perfil = $_POST['perfil'];

        mysqli_query ($link, "UPDATE TB_USER SET `nome` = '$nome', `email` = '$email', `perfil` = '$perfil' WHERE ID_USER = {$_GET['id_user']}"); 
        header ('Location:usuarios.php?cadastro=sucesso');
    
      }
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

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Editar Usuário
              <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'efetuado') { ?>
              <div style="color: green;">
                <script>
                  alert('Chamado cadastrado com sucesso!')
                </script>
              </div>
            <?php } ?>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method = 'POST' action="">
                    <div class="form-group">
                        <label>ID</label>
                        <input readonly name="id_user" type="text" class="form-control" value="<?php print trim($row->id_user);?>">
                    </div>

                    <div class="form-group">
                      <label>Nome</label>
                      <input name="nome" type="text" class="form-control" value="<?php print trim($row->nome);?>">
                    </div>

                    <div class="form-group">
                      <label>E-mail</label>
                      <input name="email" type="text" class="form-control" value="<?php print trim($row->email);?>">
                    </div>

                    <div class="form-group">
                      <label>Perfil</label>
                      <div class="form-group">
                        <select class="form-control" name="perfil" id="" required>
                          <option disabled selected value="" style="text-align: center;">Selecione o nível</option>
                          <option name="usuario" value="usuario">Usuário</option>
                          <option name="administrador" value="administrador">Administrador</option>
                        </select>
                      </div>
                    </div>

    

                    <div class="row mt-5">
                      <div class="col-6">
                        <a href="./home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Editar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>