<?php
/**
 * A classe Config contém os parâmetros configuração da aplicação.
 *
 * A classe Congig contém os atributos de configuração que permitem identificar 
 * o servidor, base de dados, utilizador, pawword e outros paâmetros de 
 * configuração.
 * 
 * @package ProgramaAlunos
 */
class Config {
    
    /** Nome do site     */
    public $sitename ='Programa Alunos'; 
    
    /** Descrição do site */
    public $sitedesc ='Gestão de Alunos'; 
    
    /** Endereço do servidor de base de dados */
    public $host ='localhost';
    
    /** Nome de utilizador para o acesso à base dados */
    public $user ='root';
    
    /** Palavra passe para acesso à base de dados */
    public $password ='1234';
    
    /** Nome da base de dados */
    public $db ='escola';
}