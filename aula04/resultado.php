<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 04 - Resultado da Pesquisa</title>
</head>
<body>
    
    <h1>Resultado da Pesquisa</h1>

    <?php 
    
    // se parametro 'cliente' foi enviado 
    // (não está vazio) via GET
    if(!empty($_GET['cliente'])) {

        $cliente = $_GET['cliente'];

        // array de clientes
        /*
        $clientes[] = "João Silva"; // 0
        $clientes[] = "Maria Souza"; // 1
        $clientes[] = "José Oliveira"; // 2
        $clientes[] = "João Soares; // 3
        */

        // outra maneira de criar o mesmo array:
        $clientes = [
            "João Silva",
            "Maria Souza",
            "José Oliveira",
            "João Soares"
        ];


        $encontrou = false; // nesse momento, não encontramos nada

        // criar foreach para percorrer o aray Clientes
        foreach ($clientes as $clienteAtual) {

            // verificar se o nome que digitamos no
            // form, está contido dentro do nome
            // do 'clienteAtual'
            if (str_contains($clienteAtual, $cliente)) {
                echo "Cliente encontrado: " . $clienteAtual . "<br>";
                $encontrou = true; // encontrou um cliente ao menos
            }
        }

        if (!$encontrou) { // se não encontrou nenhum cliente
            echo "<h4>Nenhum cliente encontrado com o nome " . 
            $cliente . "</h4>";
        }


    } else {

        echo "<h3>Nenhum dado foi enviado para pesquisa</h3>";
    }
    
    ?>

    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

</body>
</html>