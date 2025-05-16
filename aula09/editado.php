<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 2 - Cliente Editado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">

    <h1>Aula 09 - Parte 2 - Editar Cliente</h1>

    <?php

    require_once 'menu.php';

    // incluir arquivo com as funções de validação
    require_once 'validacoes.php';

    // verificar se chegamos na página via GET
    if (form_nao_enviado()) {
        exit("<h3>Form de edição de dados de cliente não enviado.</h3>");
    }

    // verificar se há campos em branco no form
    if (ha_campos_em_branco($_POST)) {
        exit("<h3>Por favor, preencha todos os campos do form ao editar 
        dados do cliente</h3>");
    }

    // armazenamos dados enviados via POST em variáveis locais
    $nome   = $_POST['nome'];
    $fone   = $_POST['fone'];
    $email  = $_POST['email'];
    $id     = (int)$_POST['id'];

    // se nenhum erro acima foi detectado, prosseguimos:
    require_once 'conexao.php';

    $conn = conectar_banco();

    $sql = "UPDATE tb_clientes SET nome = ?, fone = ?, email = ? 
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt){
        exit ("</h3>Erro no preparo da consulta SQL</h3>");
    }

    mysqli_stmt_bind_param($stmt, "sssi", $nome, $fone, $email, $id);

    if (!mysqli_stmt_execute($stmt)){
        exit("<h3>Erro ao executar edição: " . mysqli_stmt_error($stmt) . "</h3>");
    }

    echo "<h3>Dados do cliente editados com sucesso!</h3>";

    mysqli_stmt_close($stmt);
    mysqli_close($conn);    
 
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>