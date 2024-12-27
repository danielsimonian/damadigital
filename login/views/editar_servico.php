<?php
  require_once "../models/validador_acesso.php";
  require_once "../connection/conexao.php";

  $idCliente = $_GET['id_user'];
  $sql = "SELECT * FROM tb_user WHERE id_user=" . $idCliente;
  $res = mysqli_query($link, $sql);
  $cliente = mysqli_fetch_assoc($res);

  $idOrder = $_GET['id_order'];
  $sqlOrder = "SELECT * FROM tb_order WHERE id_order = " . $idOrder;
  $resOrder = mysqli_query($link, $sqlOrder);
  $order = mysqli_fetch_assoc($resOrder);

  if($_POST){
    $service = $_POST['service'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $money = $_POST['money'];
    

    mysqli_query ($link, "UPDATE tb_order SET `service` = '$service', `description` = '$description', `order_date` = '$date', `total_amount` = '$money' WHERE id_order =" . $idOrder);
    header ('Location: servico_cliente.php?id_user=' . $idCliente . '&cadastro=sucesso');
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
      <div class="text-light">
          <?php echo ($_SESSION['name'] . ",&nbsp"); ?><a class="link-offset-2 link-underline link-underline-opacity-0" href="../models/logoff.php">logoff</a>
      </div>
    </div>
  </nav>
  
  <main class="container">
    <section class="card text-bg-light mt-5 h-auto m-auto" style="width: 500px;">
      <div class="text-center card-header text-bg-secondary text-light">
        Editar serviço

        <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'efetuado') { ?>
          <div style="color: green;">
            <script>
              alert('Chamado cadastrado com sucesso!')
            </script>
          </div>
        <?php } ?>

      </div>

      <div class="card-body text-bg-light">
        <form class="row justify-content-center" action="" method="POST">

        <div class="mb-2 col-11">
            <select name="clientes" class="form-control">
              <option disabled selected readonly><?php echo $cliente['name'] ?></option>
            </select>
          </div>
          
          <div class="mb-2 col-11">
            <input value="<?php echo $order['service'] ?>" name="service" type="text" class="form-control" placeholder="Serviço">
          </div>

          <div class="mb-2 col-11">
            <textarea maxlength="50" name="description" class="form-control" rows="3" placeholder="Descrição do serviço"><?php echo $order['description'] ?></textarea>
          </div>

          <div class="mb-2 col-11">
            <input value="<?php echo $order['order_date'] ?>" name="date" type="date" class="form-control" placeholder="Data">
          </div>

          <div class="mb-2 col-11 input-wrapper">
            <input value="<?php echo $order['total_amount'] ?>" name="money" class="form-control" type="text" id="money" placeholder="0,00">
          </div>

          <div class="row">
            <div class="mt-3 col-6 text-center">
              <button class="w-50 btn btn-outline-secondary" type="submit">Editar</button>
            </div>
            <div class="mt-3 col-6 text-center">
              <a href="../models/servico_excluir.php?id_order=<?php echo $idOrder ?>&id_user=<?php echo $idCliente ?>"><input type="button" class="w-50 btn btn-danger" value="Excluir"></a>
            </div>
          </div>
        </form>
    </section>
  </main>
    <script src="../js/script.js"></script>
  </body>
</html>


