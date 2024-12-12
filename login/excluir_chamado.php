<?php
require_once "validador_acesso.php";
require "app_help_desk_seguranca/conexao.php";

mysqli_query ($link,"DELETE FROM `tb_chamados` WHERE ID_CHAMADO = {$_GET['id_chamado']}");

header('Location: editar_chamado.php?exclui=sucesso')

?>