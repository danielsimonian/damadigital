<?php
    require "app_help_desk_seguranca/conexao.php";


    if ($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $perfil = $_POST['perfil'];

        
        $sql = 'SELECT email FROM TB_USER WHERE email = "' . $email . '"; ';
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo('Usuário já cadastrado!');
            header('Location: cadastro.php?cadastro=erro&erro=email');
        } else {
            mysqli_query($link, "INSERT INTO `tb_user`(`nome`, `email`, `senha`, `perfil`) VALUES ('$nome','$email','$senha','$perfil')");
            header('Location: index.php?cadastro=sucesso');
    }
    

    }
?>