<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 - PHP</title>
</head>
<body>
    
    <!-- este é um comentário em HTML -->
    <h1>Aula 02 - PHP</h1>

    <?php
    
        // comando básico de saída
        echo "<p>Hello, World!!!</p>";

        // declaração de variáveis
        $aluno = "Jason Sobreiro"; // string
        $rgm = 949596; // int

        echo "\n\tAluno: " . $aluno . "<br>"; // concatenação
        echo "\n\tRGM: $rgm"; // interpolação

        // \n = quebra a linha para o interpretador
        // \t = tabulação de dados para o intepretador

    ?>

</body>
</html>