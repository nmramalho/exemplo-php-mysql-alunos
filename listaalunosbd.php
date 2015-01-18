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

/*atribui os valores para aplicar na filtragem da lista*/
$nome = filter_input(INPUT_POST, 'T_procuranome');
$turma = filter_input(INPUT_POST, 'S_turma');

$escola->mostraFormProcuraAlunos($nome, $turma); /* mostrar o formulário de procura de alunos */

//$alunos = $escola->arrayProcuraAlunosPorNomeTurma($nome, $turma);

$registosPorPágina = 3;

$pagina = filter_input(INPUT_GET, 'pagina'); /* recebe o email do aluno a editar */
$alunos = $escola->arrayProcuraAlunosPorNomeTurmaPaginado($nome, $turma, $registosPorPágina, $pagina);

//$escola->mostraTabelaAlunos($alunos); 

$totalAlunos = $escola->totalDeAlunos();
$totalPaginas = ceil($totalAlunos / $registosPorPágina);

$escola->mostraTabelaAlunosPaginada($alunos, $totalPaginas);  

$escola->mostraRodape("Programa Alunos"); /* mostrar o rodaé da página da página */
