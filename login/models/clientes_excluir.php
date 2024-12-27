<?php
require_once "../models/validador_acesso.php";
require_once "../connection/conexao.php";

$idCliente = $_GET['id_user'];

print_r ($idCliente);

mysqli_query ($link, "DELETE FROM tb_user WHERE id_user =" . $idCliente);

header('Location: ../views/clientes.php?exclui=sucesso');

?>