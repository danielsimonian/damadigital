<?php
  session_start();

  if(!isset($_SESSION['autenticado'])){
    header('location: index.php?login=erro2');
  }

  if (isset($_SESSION['id_user'])) {
    echo "ID do usuário logado: " . $_SESSION['id_user'];
  } else {
    echo "Usuário não está autenticado.";
  }
?>