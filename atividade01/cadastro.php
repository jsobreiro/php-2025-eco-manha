<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 01 - Cadastro</title>
</head>
<body>

    <h1>Atividade 01 - Aparelho Cadastrado</h1>

    <?php

    // VERIFICAR SE A PÁGINA FOI ACESSADA VIA FORM
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // receber os dados
        $nome        = $_POST['nome'];
        $consumo_max = $_POST['consumo_max'];
        $horas       = $_POST['horas'];
        $dias        = $_POST['dias'];
        $valor_kwh   = $_POST['valor_kwh'];

        // calculos

        // consumo diário
        $x = $consumo_max / 1000;
        $consumo_dia = $x * $horas;

        // consumo mensal
        $consumo_mes = $consumo_dia * $dias;

        // consumo do aparelho em R$
        $consumo_real = $consumo_mes * $valor_kwh;

        // categoria de consumo
        if ($consumo_real <= 5) {
            $categoria = "Baixa";
        
        } else if ($consumo_real <= 10) {
            $categoria = "Moderada";

        } else {
            $categoria = "Elevada";
        }

        echo "Nome do aparelho: " . $nome . "<br>";
        echo "Consumo máximo em Watts: " . $consumo_max . "w<br>";
        echo "Qtde hora o aparelho fica ligado no dia: " . $horas . "<br>";
        echo "Qtde dias o aparelho fica ligado no mês: " . $dias . "<br>";
        echo "Valor do Kilowatt/Hora: R$ " . $valor_kwh . "<br>";
        echo "Consumo diário do aparelho: " . $consumo_dia . "w<br>";
        echo "Consumo mensal do aparelho: " . $consumo_mes . "w<br>";
        echo "Consumo em R$: " . $consumo_real . "<br>";
        echo "Categoria de consumo: " . $categoria . "<br>";

    } else {

        echo "<h2>Formulário não preenchido!</h2>";

    }

    ?>

    <a href="index.php">Voltar à Home</a>

</body>
</html>