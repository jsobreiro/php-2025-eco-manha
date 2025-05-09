<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03 - Exemplo 01</title>
</head>
<body>
    
    <p><a href="index.php">Voltar para Home</a></p>

    <h1>Exemplo 01</h1>
    <p>
        Informe um valor inteiro, entre 1 e 100, para 
        veririficar se ele é par ou ímpar:
    </p>

    <form action="exemplo01.php" method="post">

        <label for="valor">Valor: </label>
        <input type="number" name="valor" id="valor"
        min="1" max="100" required>

        <button type="submit">Verificar</button>
    
    </form>

    <?php

        /* Abaixo, será verificado se o campo
        'valor', enviado via POST, NÃO está vazio */

        if (!empty($_POST['valor'])) {

            // Se não está vazio, significa que
            // a página RECEBEU o campo de formulário

            // armazenamos o campo recebido numa variável
            $valor = $_POST['valor'];

            // verificar se é par ou ímpar:
            if ($valor % 2 == 0) {

                echo "<h3>" . $valor. " é par!</h3>";

            } else {

                echo "<h3>" . $valor. " é ímpar!</h3>";
            }

        }

    ?>

</body>
</html>