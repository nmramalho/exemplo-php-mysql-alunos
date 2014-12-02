<?php

session_name('s'); //atribui um nome à sessão
session_start();  //inicia ou resume a sessão


include_once 'classes/escola.php';

$escola = new Escola();

if (!$escola->verificaSessao()){
    exit;
}

$escola->mostraCabecalho(" Logout"); // função para mostrar o cabeçalho da página da página

$escola->terminaSessao();