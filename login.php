<?php
include_once 'classes/escola.php';

$escola = new Escola();

$escola->mostraCabecalho("Login"); // função para mostrar o cabeçalho da página

$escola->mostraFormLogin(); // função para apresentar o formulário de login

$escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página