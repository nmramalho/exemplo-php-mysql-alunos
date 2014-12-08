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
   echo "<h2> SUCESSO: Aluno eliminado com sucesso. </h2>";
   $escola->abrePagina("listaalunosbd.php", "Voltar à lista de alunos");
   $escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página
}
else{
   $escola->mostraCabecalho("Eliminação do Aluno"); // função para mostrar o cabeçalho da página
   echo "<h2> ERRO: Falha na eliminação do aluno! </h2>";
   $escola->abrePagina("paginainicial.php", "Ir para página inicial.");
   $escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página 
}


