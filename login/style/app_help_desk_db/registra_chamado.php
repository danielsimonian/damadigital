<?php
    require_once "validador_acesso.php";

    

    //Organizando os dados, retirando | dos possíveis valores
    $titulo = str_replace('|', '-', $_POST['titulo']);
    $categoria = str_replace('|', '-', $_POST['categoria']);
    $descricao = str_replace('|', '-', $_POST['descricao']);
    $idUser = str_replace('|', '-', $_SESSION['id_usuario']);
    $perfil = str_replace('|', '-', $_SESSION['perfil']);
    
    //Concatenando os valores de cada parâmetro, separado por |
    $dados = $idUser . '|' . $perfil . '|' . $titulo . '|' . $categoria . '|' . $descricao . PHP_EOL;

    //Abrindo o arquivo e armazenando em uma variável
    $arquivo = fopen('../../../app_help_desk_seguranca/registros.hd','a');
    
    //Escrevendo no arquivo
    fwrite($arquivo, $dados);
    //Fechando o arquivo
    fclose($arquivo);

    //Redirecionando o arquivo e passando os dados para efetivar um aviso com alert em javascript
    header('location: abrir_chamado.php?cadastro=efetuado')
?>