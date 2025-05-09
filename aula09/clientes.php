<!DOCTYPE html>
<html lang="pt-br">
<head>
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

        // zero linhas afetdas = não há registros na tebela
        if ($linhas_afetadas == 0) {
            exit("<h3>Não há clientes para exibir</h3>");
        }

        // se numro de linhas afetadas for negativo, há erro no sql
        if ($linhas_afetadas < 0) {
            exit("<h3>Não foi possível realizar a consulta no banco</h3>");
        }

        // Passando pelas validações acima, prosseguimos:
        // enquanto houver registros armazenados em 'resultado', vamos
        // criar um array associativo para cada registro retornado.
        // mostraremos na tela, o array associativo a cada iteração do laço
        echo "<h2>Clientes Cadastrados:</h2>";
        while($cliente = mysqli_fetch_assoc($resultado)) {

            echo "ID #: "       . $cliente['id']    . "<br>";
            echo "Nome: "       . $cliente['nome']  . "<br>";
            echo "Telefone: "   . $cliente['fone']  . "<br>";
            echo "E-mail: "     . $cliente['email'] . "<br>";

        }

        mysqli_close($conn); // encerra a conexão com o banco

    ?>

</body>
</html>