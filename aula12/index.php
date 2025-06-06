<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12 - Sistema de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">

    <h1>Aula 12 - Sistema de Login</h1>

    <nav>
        <a href="index.php">Home</a> | 
        <a href="restrita.php">Área Restrita</a>
    </nav>
    
    <h4>Bem-vindo ao nosso pequeno site!</h4>
    
    <?php 
        require_once 'functions.php';
        verificar_codigo();

        incluir_form_login();
    ?>

    
</body>
</html>