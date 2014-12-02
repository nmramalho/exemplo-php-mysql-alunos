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

$aluno->setEmail(filter_input(INPUT_POST, 'T_email'));
$aluno->setNome(filter_input(INPUT_POST, 'T_nome'));
$aluno->setIdade(filter_input(INPUT_POST, 'T_idade'));
$aluno->setTurma(filter_input(INPUT_POST, 'T_turma'));
$aluno->setAno(filter_input(INPUT_POST, 'T_ano'));
$aluno->setUsername(filter_input(INPUT_POST, 'T_username'));
$aluno->setPass(filter_input(INPUT_POST, 'T_pass1'));

$pass2 = filter_input(INPUT_POST, 'T_pass2');
$email = filter_input(INPUT_POST, 'H_email');
 
if($pass2!=$aluno->pass){
    echo "As passwords devem ser iguais! ";
    echo "<a href=\"javascript:history.go(-1)\">voltar</a>";
    exit();
}
          
if ($escola->editaAlunoBD($aluno, $email)){
   $escola->mostraCabecalho("Edição do Aluno"); // função para mostrar o cabeçalho da página
   echo "<h2> SUCESSO: Aluno editado com sucesso. </h2>";
   $escola->abrePagina("paginainicial.php", "Ir para página inicial.");
   $escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página
}
else{
   $escola->mostraCabecalho("Edição do Aluno"); // função para mostrar o cabeçalho da página
   echo "<h2> ERRO: Falha na edição do aluno! </h2>";
   echo "<a href=\"javascript:history.go(-1)\">voltar</a>";
   $escola->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página 
}

