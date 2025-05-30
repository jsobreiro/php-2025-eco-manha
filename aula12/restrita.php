<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12 - Página Restrita</title>
</head>
<body>

    <h1>Aula 12 - Página Restrita</h1>

    <nav>
        <a href="index.php">Home</a> | 
        <a href="restrita.php">Área Restrita</a> | 
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h2>

    <h3>Se você está vendo esta página é porque está logado corretamete</h3>
    
</body>
</html>