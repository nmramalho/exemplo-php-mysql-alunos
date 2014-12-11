<?php

include_once 'classes/escola.php';
include_once 'classes/aluno.php';

$escola = new Escola();
$aluno = new Aluno();

/* recebe os dados do formulário */
$aluno->setEmail(filter_input(INPUT_POST, 'T_email'));
$aluno->setNome(filter_input(INPUT_POST, 'T_nome'));
$aluno->setIdade(filter_input(INPUT_POST, 'T_idade'));
$aluno->setTurma(filter_input(INPUT_POST, 'T_turma'));
$aluno->setAno(filter_input(INPUT_POST, 'T_ano'));
$aluno->setUsername(filter_input(INPUT_POST, 'T_username'));
$aluno->setPass(filter_input(INPUT_POST, 'T_pass1'));

$pass2 = filter_input(INPUT_POST, 'T_pass2');

/* verifica se as passwords introduzidas no formulário são iguais*/
if($pass2!=$aluno->getPass()){
    $escola->mostraCabecalho("Registo do Aluno"); /* função para mostrar o cabeçalho da página */
    echo '<div class="alert alert-warning" role="alert"><strong>Atenção! </strong> '
         . 'As passwords devem ser iguais! . </div> '; /* mensagem a informar o utilizador */
    echo "<a href=\"javascript:history.go(-1)\">voltar</a>"; /* ligação para a página anterior */
    $escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */
    exit(); /* termina execução do programa */
}

/* verifica se já existe um registo com o mesmo email ou username recebidos do formulário */
if($escola->emailExiste($aluno->getEmail())|| $escola->usernameExiste($aluno->getUsername())){
    $escola->mostraCabecalho("Registo do Aluno"); /* função para mostrar o cabeçalho da página */
    echo '<div class="alert alert-warning" role="alert"><strong>Atenção! </strong> '
         . 'O username ou email já está registado! . </div> ';/* mensagem a informar o utilizador */
    echo "<a href=\"javascript:history.go(-1)\">voltar</a>"; /* ligação para a página anterior */
    $escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */    
    exit(); /* termina execução do programa */
}

/* insere o aluno na base de dados */
if ($escola->insereAlunoBD($aluno)){   /* se o aluno for inserido com sucesso */
   $escola->mostraCabecalho("Registo do Aluno"); /* função para mostrar o cabeçalho da página */
   echo '<div class="alert alert-success" role="alert"><strong>Sucesso! </strong> '
        . 'Registo efetuado com sucesso. </div> '; /* memsagem de sucesso */
   $escola->abrePagina("login.php", "Ir para página de login.");
   $escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */
}
else{ /* se houver erro na insersão do aluno */
   $escola->mostraCabecalho("Registo do Aluno"); /* função para mostrar o cabeçalho da página */
   echo '<div class="alert alert-danger" role="alert"><strong>Erro! </strong> '
        . 'Falha ao registar aluno! </div> ';/* mensagem de erro */
   echo "<a href=\"javascript:history.go(-1)\">voltar</a>"; /* ligação para a página anterior */
   $escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */
}




