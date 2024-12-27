<?php
require_once "../models/validador_acesso.php";
require_once "../connection/conexao.php";

$idOrder = $_GET['id_order'];
$idUser = $_GET['id_user'];

mysqli_query ($link, "DELETE FROM tb_order WHERE id_order =" . $idOrder);

header("Location: ../views/servico_cliente.php?id_user= $idUser &exclui=sucesso");

?>