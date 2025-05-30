<?php

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function campos_em_branco() {
    return empty($_POST['usuario']) || empty($_POST['senha']);
}

function verificar_codigo() {

    if (!isset($_GET['codigo'])) {
        return;
    }

    $codigo = (int)$_GET['codigo'];

    switch ($codigo) {

        case 0:
            $msg = "<h3>Você não tem permissão para acessar a página requisitada</h3>";
            break;

        case 1:
            $msg = "<h3>Usuário ou senha inválidos. Por favor, tente novamente!</h3>";
            break;

        case 2:
            $msg = "<h3>Por favor, preencha todos os campos do form de login</h3>";
            break;

        case 3:
            $msg = "<h3>Erro na estrutura da consulta SQL. Verifique com o suporte ou 
            tente novamente mais tarde</h3>";
            break;

        default:
            $msg = "";
            break;
    }

    echo $msg;

}

function incluir_form_login() {
    session_start();

    if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])) {
        require_once 'form_login.php';
    }
}

?>