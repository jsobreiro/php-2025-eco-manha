<?php

    // função para verificar se o form foi enviado
    // (método de envio = post)
    function form_nao_enviado() {

        // retorna 'true' se chegamos na página
        // via GET (ou seja, diferente de POST);
        // retorna 'false' se chegamos na página
        // via POST
        return $_SERVER['REQUEST_METHOD'] != 'POST';
       
    }


    // função para verificar se os valores digitados no form
    // não são valores numéricos
    function valor_nao_numerico() {

        // se qualquer um dos campos não for um número,
        // a função retornará verdadeiro
        return !is_numeric($_POST['valor1']) || !is_numeric($_POST['valor2']);
    }


?>