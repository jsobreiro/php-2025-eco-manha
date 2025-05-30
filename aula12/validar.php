<?php
    require_once 'functions.php'; // incluir arquivo de funções

    // se chegamos aqui via GET (form não foi enviado)
    if (form_nao_enviado()) {
        header('location:index.php?codigo=0'); // sem permissão de acesso
        exit;
    }

    // se o form foi enviado, verificamos agora se há algum campo em branco
    if (campos_em_branco()) {
        header('location:index.php?codigo=2'); // campos em branco no form
        exit;
    }

    // passando pelas validações acima, prosseguimos:

    // receber dados do form
    $usuario    = $_POST['usuario'];
    $senha      = $_POST['senha'];

    // incluir arquivo de conexão com o BD
    require_once 'conexao.php';

    // receber conexão ativa com o BD atual
    $conn = conectar_banco();

    // criar query (consulta) à tabela tb_usuaris com base no usuário e senha informados
    $query = "SELECT * FROM tb_usuarios WHERE usuario LIKE ? AND senha LIKE ?";
    
    // criar um statement (declaração) antes de executaros um SELECT
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) { // se houver algum problema com a conslta acima, retorna para a home
        header('location:index.php?codigo=3'); // codigo para erros de sql
        exit;
    }

    // prosseguimos com o bind (associação) das variáveis no nosso statemant
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);

    // executa comando preparado (stmt)
    $resultado = mysqli_stmt_execute($stmt);

    if (!$resultado) {
        header('location:index.php?codigo=3'); // codigo para erros de sql
        exit;
    }

    // registrar numero de linhas afetadas pelo comando sql executado
    mysqli_stmt_store_result($stmt);

    // armazena o numero de linhas afetadas pelo comand sql executado
    $linhas = mysqli_stmt_num_rows($stmt);

    // verificar se usuário e senha estão incorretos:
        // se usuario e senha corresponderem a algum registro na tabela, 
        // as linhas afetadas serão maiores que zero.
        // se o numero de linahs afetadas for menor ou igual a zero, signficina que
        // não há usuario e senha informados salvos na tabela do BD
    if ($linhas <= 0) {

        header('location:index.php?codigo=1'); 
        // codigo 1 = usuario ou senha inválidos
        exit;
    }

    // iniciar a sessão
    session_start();
    // registrar as variáveis de sessão
    $_SESSION['usuario']    = $usuario;
    $_SESSION['senha']      = $senha;

    // redirecionar para a página restrita
    header('location:restrita.php');

?>