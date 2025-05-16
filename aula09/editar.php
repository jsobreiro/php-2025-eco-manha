<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 2 - Editar Cliente</title>
</head>
<body>
    
    <h1>Aula 09 - Parte 2 - Editar Cliente</h1>

    <p>
        <a href="index.php">Home</a> | 
        <a href="clientes.php">Clientes Cadastrados</a>
    </p>

    <?php

    require_once 'validacoes.php';

    id_nao_enviado(); // verifica se o id do cliente foi enviado

    // se o id foi enviado para esta página, armazenamos ele numa variável
    $id = (int)$_GET['id'];

    require_once 'conexao.php'; // inclui o arquivo de conexão

    $conn = conectar_banco(); // recebe conexão ativa com o BD

    // montamos o select para buscar dados do cliente especifico
    $query = "SELECT * FROM tb_clientes WHERE id = $id";

    // executa o comando sql e armazena o resultado em $resultado
    $resultado = mysqli_query($conn, $query);

    // recebemos o numero de linhas afetadas pelo comand sql
    $linhas_afetadas = mysqli_affected_rows($conn);

    // verificamos o valor das linhas afetadas
    verificar_select($linhas_afetadas);

    // se estiver tudo certo, convertemos o resultado num
    // array associativo chamado 'cliente'
    $cliente = mysqli_fetch_assoc($resultado);

    // Abaixo, montaremos um form html, inserindo no atributo
    // 'value' de cada input, o valor correspondente do array
    // '$cliente'. No caso do id, usaremos um campo oculto 
    // (hidden) e usaremos o valor de '$id' para este campo

    ?>

    <h2>Editar Cliente</h2>

    <form action="editado.php" method="post">

        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome"
        value="<?= $cliente['nome']; ?>"><br><br>

        <label for="fone">Fone: </label><br>
        <input type="text" name="fone" id="fone"
        value="<?= $cliente['fone']; ?>"><br><br>

        <label for="email">E-mail: </label><br>
        <input type="email" name="email" id="email"
        value="<?= $cliente['email']; ?>"><br><br>

        <input type="hidden" name="id" value="<?= $id; ?>">

        <button type="submit">Editar</button>

    </form>
    
</body>
</html>