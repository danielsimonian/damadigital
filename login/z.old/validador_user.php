<?php
  if(!isset($_SESSION['perfil']) || ($_SESSION['perfil']) != 'adm'){
    header('location: home.php?acessonegado=negado');
  }
?>