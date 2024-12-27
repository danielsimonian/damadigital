<?php
session_start();
    require_once "validador_acesso.php";
    require "../connection/conexao.php";

    if ($_POST) {
        $id_user = $_POST['clientes'];
        $servico = $_POST['service'];
        $descricao = $_POST['descricao'];
        $date = $_POST['date'];
        $money = $_POST['money'];

        $moneyConvertido = str_replace(['.', ','], ['', '.'], $money);

        $sql = "INSERT INTO tb_order 
            (
                id_user, 
                service, 
                description, 
                order_date, 
                total_amount
            ) VALUES 
            (
                '$id_user', '$servico', '$descricao', '$date', '$moneyConvertido'
            )";

        $res = mysqli_query($link, $sql);

        if (!$res) {
            echo "Erro na query: " . mysqli_error($link);
            exit;
        }

        if ($res) {
            header('Location: ../views/home.php?cadastro=sucesso');
        } else {
            header('Location: ../views/servico_novo.php?cadastro=fail');
        }
    }

    
?>