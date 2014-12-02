<?php
include_once 'classes/escola.php';

$escola = new Escola();

$escola->mostraCabecalho("Novo registo de Aluno"); /* função para mostrar o cabeçalho da página */
$escola->mostraFormRegistaAluno(); /* função para apresentar o formulário de registo */
$escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */
