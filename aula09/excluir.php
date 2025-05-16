<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 09 - Parte 2 - excluir cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    
    <h1>Aula 09 - Parte 2 - Excluir Cliente</h1>

    <?php

    require_once 'menu.php';

    require_once 'validacoes.php';

    id_nao_enviado(); // verifica se o id do cliente foi enviado

    // se o id foi enviado para esta página, armazenamos ele numa variável
    $id = (int)$_GET['id'];

    require_once 'conexao.php'; // inclui o arquivo de conexão

    $conn = conectar_banco(); // recebe conexão ativa com o BD

    // Cria comando sql para deletar o cliente específico
    $sql = "DELETE FROM tb_clientes WHERE id = ?";

    // prepara a declaração (statement) de intenção de execução
    $stmt = mysqli_prepare($conn, $sql);

    // verifica se há erros no sql
    if (!$stmt) {
        exit("<h3>Erro na preparação do comando SQL</h3>");
    }

    // associamos o parametro id (que é um inteiro), ao stmt
    // criado acima (ou seja, substituimos a ? pelo valor de $id)
    mysqli_stmt_bind_param($stmt, 'i', $id);

    // verifica se ocorre algum erro ao executar o comando sql
    if (!mysqli_stmt_execute($stmt)) {
        exit("<h3>Erro ao excluir cliente no BD: " 
        . mysqli_stmt_error($stmt) . "</h3>");
    }

    // verificar se realmente houve exclusão de cliente no bd
    if (mysqli_affected_rows($conn) <= 0){
        exit("<h3>Erro ao excluir cliente no BD: Id inválido!</h3>"); 
    }

    echo "<h3>Cliente excluído com sucesso!</h3>";

    mysqli_stmt_close($stmt); // encerra ações possíveis com esse stmt
    mysqli_close($conn); // encerrar conexão com o banco de dados 

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>