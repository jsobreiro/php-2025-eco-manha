<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Aula 09 - Home</h1>

    <?php require_once 'menu.php'; ?>

    <h2>Cadastro de Clientes</h2>

    <form action="salvar.php" method="post">

        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="fone">Fone: </label><br>
        <input type="text" name="fone" id="fone"><br><br>

        <label for="email">E-mail: </label><br>
        <input type="email" name="email" id="email"><br><br>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>