<?php
include_once 'classes/escola.php';

session_name('s'); /* atribui um nome à sessão */
session_start();  /* inicia ou resume a sessão */

$escola = new Escola();

/* leitura dos valores passados através do formuláro de login */
$username = filter_input(INPUT_POST, 'T_username');
$pass = filter_input(INPUT_POST, 'T_pass');  

if($username){ /* verifica se a variàvel está inicializada */
    if ($username && $pass){ /* verifica se houve tentativa de login */
        if ($escola->verificaUsernamePass($username,$pass)){ /* verifica se o utilizador esta registado na base de dados */
           $_SESSION["utilizadorValido"] = $username;  /* cria uma variável de sessão com o nome do utilizador */
        }
    else{ // login falhado
        $escola->mostraCabecalho(" !! Problema !! "); /* mostrar o cabeçalho da página */
        echo "\n A autenticação falhou, é necessário estar autenticado para ver esta página!";
        $escola->abrePagina("login.php", "Login"); /* função para criar uma hiperligação */
        $escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */
        exit();
        }
    }
}

if (!$escola->verificaSessao()){ /* verificar se a sessão está iniciada */
    exit();
}
    
$escola->mostraCabecalho("Início"); /* função para mostrar o cabeçalho da página */
$escola->mostraMenu(); /* função para mostrar o menu da aplicação */



/* Aceder aos dados do aluno que tem sessão iniciada */
$aluno = $escola->encontraAlunoPorUsername($_SESSION['utilizadorValido']);

echo "<br><br><h3> Sessão iniciada por  ". $aluno->getNome() ."</h3><br>";

/* Mostrar os dados do aluno */
$escola->mostraDadosAluno($aluno);

$escola->mostraRodape("Programa Alunos"); /* função para mostrar o rodaé da página da página */

