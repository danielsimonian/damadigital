<?php
  require_once "validador_acesso.php";
  require_once "app_help_desk_seguranca/conexao.php";
  require_once "validador_user.php";

  $sql = "SELECT * FROM tb_chamados WHERE ID_CHAMADO = {$_GET['id_chamado']}";
  $res = $link->query($sql);
  $row = $res->fetch_object();

  
    if($_POST){
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];

        mysqli_query ($link, "UPDATE TB_CHAMADOS SET `titulo` = '$titulo', `categoria` = '$categoria', `descricao` = '$descricao', `status` = '$status' WHERE ID_CHAMADO = {$_GET['id_chamado']}"); 
        header ('Location: editar_chamado.php?cadastro=sucesso');
    
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
              Abertura de chamado
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
                      <label>Título</label>
                      <input name="titulo" type="text" class="form-control" value="<?php print trim($row->titulo);?>">
                    </div>
                    <div class="form-group">
                      <label>Categoria</label>
                      <select name="categoria" class="form-control">
                        <option value="<?php print trim($row->categoria);?>"><?php print trim($row->categoria);?></option>
                        <option>Criação Usuário</option>
                        <option>Impressora</option>
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Rede</option>
                        
                      </select>
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea name="descricao" class="form-control" rows="3" value=""><?php print trim($row->descricao);?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control">
                        <option value="<?php print trim($row->status);?>"><?php print trim($row->status);?></option>
                        <option>Aberto</option>
                        <option>Em Andamento</option>
                        <option>Finalizado</option>                       
                      </select>
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