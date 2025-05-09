<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03 - Exercício 01</title>
</head>
<body>
    
    <p><a href="index.php">Voltar para Home</a></p>

    <h1>Exercício 01</h1>
    <p>
        Escreva um algoritmo que leia um número digitado pelo usuário e mostre a mensagem 
        Número maior do que 10!”, caso este número seja maior, ou “Número menor ou igual a 10!”, 
        caso este número seja menor ou igual.
    </p>

    <form action="ex01.php" method="post">

        <label for="valor">Valor: </label>
        <input type="number" name="valor" id="valor">

        <button type="submit">Verificar</button>

    </form>

    <?php 
    
    if(!empty($_POST['valor'])) {

        $valor = $_POST['valor'];

        if ($valor > 10) {

            echo "<h3>" . $valor . " é maior que 10!</h3>";
        } else {
            echo "<h3>" . $valor . " é menor ou igual a 10!</h3>";
        }

    }
    
    ?>


</body>
</html>