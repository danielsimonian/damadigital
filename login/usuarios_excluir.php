<?php
require_once "validador_acesso.php";
require "app_help_desk_seguranca/conexao.php";

mysqli_query ($link,"DELETE FROM tb_user WHERE ID_USER = {$_GET['id_user']}");

header('Location: usuarios.php?exclui=sucesso')

?>