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

$escola->mostraFormProcuraAlunos(); /* mostrar o formulário de procura de alunos */

/*atribui os valores para aplicar na filtragem da lista*/
$nome = filter_input(INPUT_POST, 'T_procuranome');
$turma = filter_input(INPUT_POST, 'S_turma');

$alunos = $escola->arrayProcuraAlunosPorNomeTurma($nome, $turma);
$escola->mostraTabelaAlunos($alunos);  

$escola->mostraRodape("Programa Alunos"); /* mostrar o rodaé da página da página */
