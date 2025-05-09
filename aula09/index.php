<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Home</title>
</head>
<body>

    <h1>Aula 09 - Home</h1>

    <p>
        <a href="clientes.php">Ver clientes cadastrados</a>
    </p>

    <h2>Cadastro de Clientes</h2>

    <form action="salvar.php" method="post">

        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="fone">Fone: </label><br>
        <input type="text" name="fone" id="fone"><br><br>

        <label for="email">E-mail: </label><br>
        <input type="email" name="email" id="email"><br><br>

        <button type="submit">Cadastrar</button>

    </form>
    
</body>
</html>