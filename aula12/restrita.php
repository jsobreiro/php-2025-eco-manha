<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 13 - Lista Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">

    <h1>Aula 13 - Lista de Tarefas</h1>

    <nav>
        <a href="index.php">Home</a> | 
        <a href="restrita.php">Área Restrita</a> | 
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h2>

    <form action="cadastrar_tarefa.php" method="post">
        <p>
            <label for="tarefa">Nova Tarefa: </label>
            <input type="text" name="tarefa" id="tarefa"> 
            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
        </p>
    </form>

    <?php

    require_once 'functions.php';

    verificar_codigo();

    // armazenar localmente o id do usuário que está na sessão
    $id = $_SESSION['id'];

    // exibir todas as tarefas vinculadas a este usuario
    $sql = "    SELECT id_tarefa, tarefa FROM tb_tarefa
                INNER JOIN tb_usuarios
                ON tb_tarefa.usuario_id = tb_usuarios.id 
                WHERE usuario_id= $id";
    
    require_once 'conexao.php';

    $conn = conectar_banco();

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) <= 0) {
        exit ("<h3>Não há tarefas cadastradas ainda!</h3>");
    }

    echo "<h3>Lista de Tarefas:</h3>";

    echo "<ol>";
    while($tarefa = mysqli_fetch_assoc($resultado)) {

        $id_tarefa    = $tarefa['id_tarefa'];
        $tarefa_atual = $tarefa['tarefa'];

        echo    "<li>" ;
        echo        "<p>" . $tarefa_atual . " | ";
        echo    '<a class="btn btn-outline-danger btn-sm" 
                    style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                    href="excluir_tarefa.php?id_tarefa='.$id_tarefa.'"> X </a></p>';
        echo    "</li>";
    }
    echo "<ol>";
    
    ?>
    
</body>
</html>