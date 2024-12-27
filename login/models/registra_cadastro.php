<?php
    require "../connection/conexao.php";


    if ($_POST) {
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $profile = $_POST['profile'];

        
        $sqlmail = 'SELECT email FROM tb_user WHERE email = "' . $email . '"; ';
        $resultmail = mysqli_query($link, $sqlmail);

        $sqltel = 'SELECT tel FROM tb_user WHERE tel = "' . $tel . '"; ';
        $resulttel = mysqli_query($link, $sqltel);

        if (mysqli_num_rows($resultmail) > 0) {
            echo('Usuário já cadastrado!');
            header('Location: ../views/cadastro.php?erro=email');

        } else if (mysqli_num_rows($resulttel) > 0) {
            echo('Usuário já cadastrado!');
            header('Location: ../views/cadastro.php?erro=tel');

        } else {
            mysqli_query($link, "INSERT INTO `tb_user`(`name`, `tel`, `email`, `password`, `profile`) VALUES ('$name', '$tel', '$email', '$password', '$profile')");
            header('Location: ../views/home.php?cadastro=sucesso');
        }
    }
?>