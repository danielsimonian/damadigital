<?php
session_start();
    require_once "validador_acesso.php";
    require "app_help_desk_seguranca/conexao.php";

    if ($_POST) {
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $descricao = $_POST['descricao'];
        $usuario = $_SESSION['id_user'];
       
        $resultado = mysqli_query($link, "INSERT INTO `tb_chamados`(`titulo`, `categoria`, `descricao`, `status`, `id_user`) VALUES ('$titulo','$categoria','$descricao', 'Aberto', '{$_SESSION['id_user']}');");
        
        if($resultado){
            header('Location: home.php?cadastro=sucesso');
        } else {
            header('Location: abrir_chamado.php?cadastro=fail');
        }   
    }
?>