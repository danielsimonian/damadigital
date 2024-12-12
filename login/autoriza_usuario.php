<?php
require_once "validador_acesso.php";
require "app_help_desk_seguranca/conexao.php";

if($_GET['autorizar'] === 'sim'){
  mysqli_query ($link,"UPDATE tb_user SET perfil = 'adm' WHERE id_user = {$_GET['id_user']}");
  header('Location: autorizar_usuario.php?autorizado=sim');
} else if ($_GET['autorizar'] === 'nao'){
  mysqli_query ($link,"UPDATE tb_user SET perfil = 'usuario' WHERE id_user = {$_GET['id_user']}");
  header('Location: autorizar_usuario.php?autorizado=nao');
} // quem for negado vira usuário
?>