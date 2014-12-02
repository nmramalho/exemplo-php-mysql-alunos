<?php
include_once 'classes/escola.php';

session_name('s'); /* atribui um nome à sessão */
session_start();  /* inicia ou resume a sessão */

$escola = new Escola();

if (!$escola->verificaSessao()){ /* verifica se a sessão está iniciada */
    exit();
}

$escola->mostraCabecalho("Lista de Alunos"); /* mostrar o cabeçalho da página */
$escola->mostraMenu();

$escola->mostraFormProcuraNome(); /* mostrar o formulário de procura por nome */

$nome = filter_input(INPUT_POST, 'T_procuranome');

/* verifica se houve procura por nome */
if ($nome){
    $alunos = $escola->arrayProcuraAlunosPorNome($nome);
    $escola->mostraTabelaAlunos($alunos);
}
else{
    $escola->mostraTabelaTodosAlunos();
}

$escola->mostraRodape("Programa Alunos"); /* mostrar o rodaé da página da página */
