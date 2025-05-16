<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Clientes Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    
    <h1>Aula 09 - Clientes Cadastrados</h1>

    <?php

        require_once 'menu.php';

        // incluir arquivo de validacoes
        require_once 'validacoes.php';

        // incluir arquivo de conexão
        require_once 'conexao.php';

        // receber a conexão com BD
        $conn = conectar_banco();

        // Cria a query (o comando select)
        $query = "SELECT * FROM tb_clientes";

        // recebe o retorno do select (se o comando retornou algo)
        $resultado = mysqli_query($conn, $query);

        // recebe o número de linhas afetdadas pelo comando select
        $linhas_afetadas = mysqli_affected_rows($conn);

        // verificar numero de linhas afetadas:
        verificar_select($linhas_afetadas);        

        // Passando pelas validações acima, prosseguimos:
        // enquanto houver registros armazenados em 'resultado', vamos
        // criar um array associativo para cada registro retornado.
        // mostraremos na tela, o array associativo a cada iteração do laço
        echo "<h2>Clientes Cadastrados:</h2>";

        // montar o cabeçalho da tabela 
        echo '<table class="table table-hover">';
        echo    '<tr class="table-info">';
        echo        "<th>ID #</th>";
        echo        "<th>Nome</th>";
        echo        "<th>Telefone</th>";
        echo        "<th>E-mail</th>";
        echo        "<th>Ações</th>";
        echo    "</tr>";

        while($cliente = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";
            echo    "<td>" . $cliente['id']    . "</td>";
            echo    "<td>" . $cliente['nome']  . "</td>";
            echo    "<td>" . $cliente['fone']  . "</td>";
            echo    "<td>" . $cliente['email'] . "</td>";
            echo    "<td>";
            echo        '<a class="btn btn-sm btn-outline-danger"  href="excluir.php?id=' . $cliente['id'] . '">Excluir</a> ';
            echo        '<a class="btn btn-sm btn-outline-warning" href="editar.php?id='  . $cliente['id'] . '">Editar</a>';
            echo    "</td>";
            echo "</tr>";

        }

        // fecha a tabela
        echo "</table>";

        mysqli_close($conn); // encerra a conexão com o banco

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>