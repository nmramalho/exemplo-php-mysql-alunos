<?php
include_once 'classes/escola.php';

session_name('s'); /* atribui um nome à sessão */
session_start();  /* inicia ou resume a sessão */

$escola = new Escola();

if (!$escola->verificaSessao()){ /* verifica se a sessão está iniciada */
    exit();
}

$escola->mostraCabecalho("Editar registo de Aluno"); /* mostrar o cabeçalho da página */
$escola->mostraMenu(); /* mostrar o menu da aplicação */

$email = filter_input(INPUT_GET, 'email'); /* recebe o email do aluno a editar */

$aluno = $escola->encontraAlunoPorEmail($email); /* Develve os dados do aluno com base no email */

$escola->mostraFormEditaAluno($aluno); /* apresentar o formulário criar para aluno */

$escola->mostraRodape("Programa Alunos"); /* mostrar o rodaé da página da página */

