<?php require_once 'lock.php';

    if (!isset($_GET['id_tarefa']))  {
        header('location:restrita.php');
        exit; // impede que outro trecho de códig seja executado após o redirecionamento
    }

    $id_tarefa = (int)$_GET['id_tarefa']; // força o parâmetro a ser int

    $sql = "DELETE FROM tb_tarefa WHERE id_tarefa = $id_tarefa";

    require_once 'conexao.php';

    $conn = conectar_banco();

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) <= 0) {
        header('location:restrita.php?codigo=4');
        exit;
    }

    header('location:restrita.php');

?>