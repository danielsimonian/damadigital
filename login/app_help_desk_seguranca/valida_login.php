<?php
require 'conexao.php';
session_start();

// Consulta ao banco de dados
$resultado = mysqli_query($link, 'SELECT * FROM TB_USER;');

// Verifica se a consulta retornou algum dado
if (!$resultado) {
    die('Erro ao executar a consulta: ' . mysqli_error($link));
}

// Recebendo os dados via POST
$emailUsuario = $_POST['email'];
$senhaUsuario = md5($_POST['senha']);



// Autenticando o usuário
foreach ($resultado as $usuario) {
    if ($emailUsuario == $usuario['email'] && $senhaUsuario == $usuario['senha']) {
        $usuarioAutenticado = true;
        $_SESSION['autenticado'] = 'sim';  // Definindo a sessão como autenticada
        $_SESSION['id_user'] = $usuario['id_user']; // Armazenando o ID do usuário na sessão
        $_SESSION['perfil'] = $usuario['perfil']; // Armazenando o perfil (Administrador/Usuário) na sessão
        header('Location: home.php');
        exit();
    }
}

if ($usuarioAutenticado) {
    // Validando a sessão
    $_SESSION['autenticado'] = 'sim';
    header('location: home.php');
} else {
    header('location: index.php?login=erro');
}
?>
