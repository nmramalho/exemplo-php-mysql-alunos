<?php
/**
 * A classe Aluno permite criar objetos do tipo Aluno.
 *
 * A classe Aluno contém toda a estrutura que permite criar objetos do tipo
 * Aluno. Contém a definição dos atributos do Aluno. 
 * Contém também métodos para obter e definir os seus atributos.
 * 
 * @package ProgramaAlunos
 */
class Aluno
{
    /** 
     * Email do aluno
     * @var String 
     */
    public $email;
    /**
     *Nome do aluno
     * @var type 
     */
    public $nome;
    /**
     * Idade do aluno
     * @var Integer
     */
    public $idade;
    /**
     * Turma do aluno
     * @var String 
     */
    public $turma;
    /**
     * Ano do aluno
     * @var Integer
     */
    public $ano;
    /**
     * Username do aluno
     * @var String 
     */
    public $username;
    /**
     * Pasword do aluno 
     * @var String
     */
    public $pass;
    
    /**
     * Construtor padrão
     */
    function __construct(){
    }
          
   /**
    * Devolve o email do aluno
    * 
    * @return String 
    */
    public function getEmail() {
       return $this->email;
   }

   /**
    * Devolve o nome do aluno
    * 
    * @return String 
    */   
   public function getNome() {
       return $this->nome;
   }

   /**
    * Devolve a idade do aluno
    * 
    * @return Integer 
    */
   public function getIdade() {
       return $this->idade;
   }

    /**
    * Devolve a turma do aluno
    * 
    * @return String
    */
   public function getTurma() {
       return $this->turma;
   }

    /**
    * Devolve o ano
    * 
    * @return Integer 
    */
   public function getAno() {
       return $this->ano;
   }

    /**
    * Devolve o username
    * 
    * @return String 
    */  
   public function getUsername() {
       return $this->username;
   }

    /**
    * Devolve a password
    * 
    * @return String 
    */
   public function getPass() {
       return $this->pass;
   }

   /**
    * Atribuí o email ao aluno
    * 
    * @param String $email
    */
   public function setEmail($email) {
       $this->email = $email;
   }

   /**
    * Atribuí o nome ao aluno
    * 
    * @param String $nome
    */
   public function setNome($nome) {
       $this->nome = $nome;
   }
   
   /**
    * Atribuí a idade ao aluno
    * 
    * @param Integer $idade
    */
   public function setIdade($idade) {
       $this->idade = $idade;
   }

   /**
    * Atribuí a turma ao aluno
    * 
    * @param String $turma
    */  
   public function setTurma($turma) {
       $this->turma = $turma;
   }

   /**
    * Atribuí o ano ao aluno
    * 
    * @param Integer $ano
    */   
   public function setAno($ano) {
       $this->ano = $ano;
   }

   /**
    * Atribuí o username ao aluno
    * 
    * @param String $username
    */   
   public function setUsername($username) {
       $this->username = $username;
   }
   
   /**
    * Atribuí a password ao aluno
    * 
    * @param String $pass
    */
   public function setPass($pass) {
       $this->pass = $pass;
   }

 }
