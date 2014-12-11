<?php
include_once 'classes/escola.php';

session_name('s'); //atribui um nome à sessão
session_start();  //inicia ou resume a sessão

$escola = new Escola();

if (!$escola->verificaSessao()){
    exit;
}

$escola = new Escola();
$aluno = new aluno();

$email = filter_input(INPUT_GET, 'email');
 
if ($escola->eliminaAlunoBD($email)){
   $escola->mostraCabecalho("Eliminação do Aluno"); // função para mostrar o cabeçalho da página
   echo '<div class="alert alert-success" role="alert"><strong>Sucesso! </strong> Aluno eliminado com sucesso. </div> ';
   $escola->abrePagina("listaalunosbd.php", "Voltar à lista de alunos");
   $escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página
}
else{
   $escola->mostraCabecalho("Eliminação do Aluno"); // função para mostrar o cabeçalho da página
   echo '<div class="alert alert-danger" role="alert"><strong>Erro! </strong> Falha na eliminação do aluno. </div> ';
   $escola->abrePagina("paginainicial.php", "Ir para página inicial.");
   $escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página 
}


