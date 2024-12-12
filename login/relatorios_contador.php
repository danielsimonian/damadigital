<?php
require "app_help_desk_seguranca/conexao.php";

$totalAberto = 0;
$totalAndamento = 0;
$totalFinalizado = 0;

$sql = "SELECT status FROM TB_CHAMADOS";
$res = $link->query($sql);

if($res) {
    while ($row = $res->fetch_assoc()){
        switch ($row['status']) {
            case 'Aberto':
                $totalAberto++;
                break;
            case 'Em Andamento':
                $totalAndamento++;
                break;
            case 'Finalizado':
                $totalFinalizado++;
                break;
        }
    }
}

?>