<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsão do Tempo</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php
        require 'cep.php';

        if(empty($_POST['cidade']) && empty($_POST['estado']) && empty($_POST['cep']) ) {
            header('location: index.html');
            exit;
        }else if(!empty($_POST['cidade']) && !empty($_POST['estado']) && empty($_POST['cep'])){
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
        }else if(empty($_POST['cidade']) && empty($_POST['estado']) && !empty($_POST['cep'])){
            $endereco = get_endereco($_POST['cep']);
            $cidade = $endereco->localidade;
            $estado = $endereco->uf;
        }else if(!empty($_POST['cidade']) || !empty($_POST['estado']) && !empty($_POST['cep'])){
            header('location: index.html');
            exit;
        }else if(!empty($_POST['cidade']) || !empty($_POST['estado'])){
            header('location: index.html');
            exit;
        }
         
        require 'tempoAtual.php';
        require 'tempoOutrosDias.php';

    ?>
</body>
</html>
