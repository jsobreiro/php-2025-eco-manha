<?php require_once 'lock.php';

    require_once 'functions.php';

    if (form_nao_enviado()) {
        header('location:restrita.php?codigo=0');
        exit;
    }

    if (tarefa_em_branco()) {
        header('location:restrita.php?codigo=2');
        exit;
    }

    $tarefa = $_POST['tarefa']; // tarefa informada via form
    $id_usuario = $_SESSION['id']; // id do usuário registrado na sessão atual

    require_once 'conexao.php';

    $conn = conectar_banco();

    $sql = "INSERT INTO tb_tarefa (tarefa, usuario_id) VALUES (?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header('location:restrita.php?codigo=3');
        exit;
    }

    mysqli_stmt_bind_param($stmt, "si", $tarefa, $id_usuario);

    if(!mysqli_stmt_execute($stmt)){
        header('location:restrita.php?codigo=3');
        exit;
    }

    mysqli_stmt_store_result($stmt); // armazena reusltado executado pelo comando

    if (mysqli_stmt_affected_rows($stmt) <= 0) {
        header('location:restrita.php?codigo=5');
        exit;
    }

    header('location:restrita.php');

?>