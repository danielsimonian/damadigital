<?php
session_start();

// Usuários pré-cadastrados
$usuarios = array(
    ['id' => 1, 'email' => 'danielsimonian@gmail.com', 'senha' => '123', 'perfil' => 'administrador'],
    ['id' => 2, 'email' => 'guigui@gmail.com', 'senha' => '456', 'perfil' => 'usuario'],
    ['id' => 3, 'email' => 'fefe@gmail.com', 'senha' => '789', 'perfil' => 'usuario']
);

$usuarioAutenticado = false;
$usuarioId = null;
$perfil = null;

// Recebendo os dados via método GET
$emailUsuario = $_POST['email'];
$senhaUsuario = $_POST['senha'];

// Autenticando o usuário
for ($idx = 0; $idx < count($usuarios); $idx++) {
    if ($emailUsuario == $usuarios[$idx]['email'] && $senhaUsuario == $usuarios[$idx]['senha']) {
        $usuarioAutenticado = true;
        $usuarioId = $usuarios[$idx]['id']; // Captura o ID do usuário autenticado
        $perfil = $usuarios[$idx]['perfil'];
        break;
    }
}

if ($usuarioAutenticado) {
    // Validando a sessão
    $_SESSION['autenticado'] = 'sim';
    $_SESSION['id_usuario'] = $usuarioId; // Armazena o ID do usuário na sessão
    $_SESSION['perfil'] = $perfil;
    header('location: home.php');
} else {
    // Redirecionando para a página de login com erro
    header('location: index.php?login=erro');
}
?>
