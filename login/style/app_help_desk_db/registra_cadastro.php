<?php
    require "app_help_desk_seguranca/conexao.php";


    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $perfil = $_POST['perfil'];

        mysqli_query($link, "INSERT INTO `tb_user`(`nome`, `email`, `senha`, `perfil`) VALUES ('$nome','$email','$senha','$perfil')");

    }
    header('Location: index.php?cadastro=sucesso');


?>