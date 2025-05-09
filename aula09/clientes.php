<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 3px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Clientes Cadastrados</title>
</head>
<body>
    
    <h1>Aula 09 - Clientes Cadastrados</h1>

    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

    <?php

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
        echo "<table>";
        echo    "<tr>";
        echo        "<th>ID #</th>";
        echo        "<th>Nome</th>";
        echo        "<th>Telefone</th>";
        echo        "<th>E-mail</th>";
        echo    "</tr>";

        while($cliente = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";
            echo    "<td>" . $cliente['id']    . "</td>";
            echo    "<td>" . $cliente['nome']  . "</td>";
            echo    "<td>" . $cliente['fone']  . "</td>";
            echo    "<td>" . $cliente['email'] . "</td>";
            echo "</tr>";

        }

        // fecha a tabela
        echo "</table>";

        mysqli_close($conn); // encerra a conexão com o banco

    ?>

</body>
</html>