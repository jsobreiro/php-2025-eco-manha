<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 01 - Home</title>
</head>
<body>

    <h1>Atividade 01 - Home</h1>

    <h2>Cadastro de Eletrônico</h2>

    <form action="cadastro.php" method="post">

    <p>
        <label for="nome">Produto:</label><br>
        <input type="text" name="nome" id="nome" 
        placeholder="Digite o nome do produto" required>
    </p>

    <p>
        <label for="consumo_max">Consumo em Watts:</label><br>
        <input type="number" name="consumo_max" id="consumo_max"
        placeholder="Consumo em Watts" min="1" required>
    </p>

    <p>
        <label for="horas">Qtde horas que o aparelho fica ligado no dia:</label><br>
        <input type="number" name="horas" id="horas" 
        placeholder="Horas / Dia" min="1" max="24" required>
    </p>

    <p>
        <label for="dias">Qtde dias que o aparelho fica ligado no mês:</label><br>
        <input type="number" name="dias" id="dias" 
        placeholder="Dias / Mês" min="1" max="31" required>
    </p>

    <p>
        <label for="valor_kwh">Valor do Kilowatt/Hora:</label><br>
        <input type="number" name="valor_kwh" id="valor_kwh" 
        placeholder="Valor Kilowatt/Hora" step="0.01" min="0.01" required>
    </p>

    <button type="submit">Cadastrar</button>


    </form>
    
</body>
</html>