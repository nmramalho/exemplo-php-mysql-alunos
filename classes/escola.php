<?php
include_once 'configuracao.php';
include_once 'aluno.php';

/**
 * A classe Escola é a classe responsável pelo funcionamento da aplicação. 
 *
 * A classe Escola contém os métodos que permitem a apresentação gráfica da 
 * aplicação e a comunicação com a base de dados.
 * 
 * @package ProgramaAlunos 
 */
class Escola {
    
    /**
     * Atributo ao qual fai ser atribuído um objeto da classe Config para
     * acesso aos parâmetros configuração do site
     * 
     * @var bool
     */
    private $conf;
    
    /** 
     * Var à qual vái ser atribuído um objeto do tipo Aluno.
     * 
     * @var Aluno 
     */
    private $aluno; 
    
    /**
     * Construtor padrão
     */
    function __construct()
    {
        $this->conf = new Config();
        $this->aluno = new Aluno();
    }

    /** 
     * Função para estabelecer a ligação
     * 
     * @access public 
     * @return $ligação Devolve a ligação caso sucesso FALSE caso insucesso.
    */ 
    public function ligaBD() {
 
        /* estabelece a ligação à base de dados */
        $ligacao = new mysqli($this->conf->host, $this->conf->user, $this->conf->password, $this->conf->db);
    
        /* verifica ligação*/
        if ($ligacao->connect_errno) {
            echo("Falha na ligação: " . $ligacao->connect_error);
            return false;
        }

        return $ligacao;
    }   
    
    /**
     * Função para criar o topo das páginas
     *
     * @access public 
     * @param String $titulo Texto a apareçer no topo das páginas
     */
    public function mostraCabecalho($titulo)
    {
    ?>

    <html>
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title><?=$titulo?></title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        </head>
        <body style="text-align: center">
        
        <!-- Cabeçalho -->
        <header class="jumbotron">
            <div class="container">
                <h1><?=$titulo?></h1>
                <p class="lead">Programa para gestão de alunos numa base de dados MySQL</p>
            </div>
        </header>
     
    <div class="container">
    <?php
    }
    
    /**
     * Função para criar o rodaé das páginas
     * 
     * @access public
     * @param String $rodape Texto a aparecer no rodaé das páginas
     */
    public function mostraRodape($rodape)
    {
    ?>
    </div>   
    <!-- Rodapé -->  
    <br>
    <footer class="bs-docs-footer" role="contentinfo">
      <div class="container">
        <p class="text-center"><?=$rodape?></p>
      </div>
    </footer>

    </body>
    </html>
   <?php
    }
    
    /**
     * Função para mostrar o menu da aplicação
     * 
     * @access public
     */
    public function mostraMenu()
    {
    ?>
    
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Alunos</a>
        </div>
        <div>
          <ul class="nav navbar-nav">
            <li><a href="paginainicial.php">Início</a></li>
            <li><a href="listaalunosbd.php">Listar</a></li>
            <li><a href="formnovoaluno.php">Criar</a></li>
            <li><a href="logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <?php
    } 
     
    /**
     * Função para mostrar o formulário de login
     * 
     * @access public
     */
    public function mostraFormLogin()
    {
    ?>
   <link href="css/signin.css" rel="stylesheet">
     <div class="form-group">
      <form class="form-signin" role="form" method="POST" action="paginainicial.php">
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="T_username" id="inputEmail" class="form-control" placeholder="Nome de utilizador" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="T_pass" id="inputPassword" class="form-control" placeholder="Palavra-passe" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <div align="right" class="link-text">
            Ainda não tem uma conta?&nbsp;
            <a href="formregistar.php">Registar</a>
        </div>
      </form>
    </div> <!-- /container -->
  
<?php
    } 

  /**
    * Função para mostrar o formulário de registo de um novo aluno
    * 
    * @access public
    */ 
   public function mostraFormRegistaAluno(){
     ?>
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-offset-3" >
            <form class="form-horizontal" role="form" method="POST" action="registaalunobd.php">
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                        <input type="email" name="T_email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_nome" class="form-control" id="inputNome" placeholder="Nome completo" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputIdade" class="col-sm-2 control-label">Idade</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_idade" class="form-control" id="inputIdade" placeholder="Idade (Exemplo:16)" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputTurma" class="col-sm-2 control-label">Turma</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_turma" class="form-control" id="inputTurma" placeholder="Turma (Exemplo: E)" required>
                    </div>
                </div>       

                 <div class="form-group">
                    <label for="inputAno" class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_ano" class="form-control" id="inputAno" placeholder="Ano (Exemplo: 12)" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_username" class="form-control" id="inputUsername" placeholder="Username (Exemplo: apires)" required>
                    </div>
                </div>       

                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="T_pass1" class="form-control" id="inputPassword" placeholder="Palavra-passe" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputConfPassword" class="col-sm-2 control-label">Confirmar password</label>
                    <div class="col-sm-3">
                        <input type="password" name="T_pass2" class="form-control" id="inputConfPassword" placeholder="Confirmar palavra-passe" required>
                    </div>
                </div>  

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-group-justified">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
    
<?php
 
   }
     
   /**
    * Função para mostrar o formulário de criação de um aluno
    * 
    * @access public
    */ 
     public function mostraFormNovoAluno(){
     ?>
     
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-offset-3" >
            <form class="form-horizontal" role="form" method="POST" action="inserealunobd.php">
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                        <input type="email" name="T_email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_nome" class="form-control" id="inputNome" placeholder="Nome completo" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputIdade" class="col-sm-2 control-label">Idade</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_idade" class="form-control" id="inputIdade" placeholder="Idade (Exemplo:16)" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputTurma" class="col-sm-2 control-label">Turma</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_turma" class="form-control" id="inputTurma" placeholder="Turma (Exemplo: E)" required>
                    </div>
                </div>       

                 <div class="form-group">
                    <label for="inputAno" class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_ano" class="form-control" id="inputAno" placeholder="Ano (Exemplo: 12)" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_username" class="form-control" id="inputUsername" placeholder="Username (Exemplo: apires)" required>
                    </div>
                </div>       

                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="T_pass1" class="form-control" id="inputPassword" placeholder="Palavra-passe" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputConfPassword" class="col-sm-2 control-label">Confirmar password</label>
                    <div class="col-sm-3">
                        <input type="password" name="T_pass2" class="form-control" id="inputConfPassword" placeholder="Confirmar palavra-passe" required>
                    </div>
                </div>  

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-group-justified">Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
 
<?php
   }
   
   /**
    * Função para mostrar o formulário para edição de dados de um aluno
    * 
    * @access public
    * @param Aluno $aluno
   */
   public function mostraFormEditaAluno(Aluno $aluno){
     ?> 
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-offset-3" >
            <form class="form-horizontal" role="form" method="POST" action="editaalunobd.php">
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-3">
                        <input type="email" name="T_email" class="form-control" id="inputEmail" value="<?=$aluno->getEmail()?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_nome" class="form-control" id="inputNome" value="<?=$aluno->getNome()?>" required>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="inputIdade" class="col-sm-2 control-label">Idade</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_idade" class="form-control" id="inputIdade" value="<?=$aluno->getIdade()?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputTurma" class="col-sm-2 control-label">Turma</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_turma" class="form-control" id="inputTurma" value="<?=$aluno->getTurma()?>" required>
                    </div>
                </div>       

                 <div class="form-group">
                    <label for="inputAno" class="col-sm-2 control-label">Ano</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_ano" class="form-control" id="inputAno" value="<?=$aluno->getAno()?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-3">
                        <input type="text" name="T_username" class="form-control" id="inputUsername" value="<?=$aluno->getUsername()?>" required>
                    </div>
                </div>       

                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-3">
                        <input type="password" name="T_pass1" class="form-control" id="inputPassword" value="<?=$aluno->getPass()?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputConfPassword" class="col-sm-2 control-label">Confirmar password</label>
                    <div class="col-sm-3">
                        <input type="password" name="T_pass2" class="form-control" id="inputConfPassword" placeholder="Confirmar palavra-passe" required>
                    </div>
                </div>  

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-group-justified">Gravar alterações</button>
                    </div>
                </div>
                
                <!-- Email original do aluno para a procura do registo na bd -->
                <input name="H_email" type="hidden" value="<?=$aluno->getEmail()?>">
                
            </form>
        </div>
    </div>
</div>   
    <?php
    } 
   
   /**
    * Função para apresentar os dados de um aluno
    * 
    * @access public
    * @param Aluno $aluno
    */
   public function mostraDadosAluno(Aluno $aluno){
     ?>
    
    <table class="table-condensed" align="center">
        <tr>
            <th data-field="email">Email</th>
            <td><?=$aluno->getEmail()?></td>
        </tr>
        <tr>   
            <th data-field="nome">Nome</th>
            <td><?=$aluno->getNome()?></td>
        </tr>
        <tr>   
            <th data-field="idade">Idade</th>
            <td><?=$aluno->getIdade()?></td>
        </tr>
        <tr>   
            <th data-field="turma">Turma</th>
            <td><?=$aluno->getTurma()?></td>
        </tr>
        <tr>   
            <th data-field="ano">Ano</th>
            <td><?=$aluno->getAno()?></td>
        </tr>
        <tr>   
            <th data-field="username">Username</th>
            <td><?=$aluno->getUsername()?></td>
        </tr>
        <tr>   
            <th data-field="password">Turma</th>  
            <td><?=$aluno->getPass()?></td>
        </tr>
    </table>
    <br>
    <p>
        <a href="formeditar.php?email=<?=$aluno->email?>">
            <button type="button" class="btn btn-primary btn-sm">Editar dados</button>
        </a>
    </p>
    
    <?php
    }   
    
    /**
     * Função para mostrar o formulário para procurar alunos por nome.
     * 
     *@access public
     */
    public function mostraFormProcuraNome()
    {
    ?>
    
    <form class="form-inline" role="form" method="POST" action="listaalunosbd.php">
        <div class="form-group">
            <label class="sr-only">Nome</label>
            <p class="form-control-static">Nome</p>
        </div>
        <div class="form-group">
            <label for="inputNome" class="sr-only">Nome</label>
            <input type="text" name="T_procuranome" class="form-control" id="inputNome" placeholder="Introduza um nome">
        </div>
        <button type="submit" class="btn btn-default">Procurar</button>
    </form>

    <?php
    } 
          
    /** Função para verificar os dados do utilizador para o login. Vai verificar
     * na base de dados se o utilizardor e palavra passe coincidem.
     * 
     * @access public
     * @param String $username Nome de utilizador para o login
     * @param String $pass Palavra passe para o login
     * @return boolean Devolve true caso o username e pass coincidam.
     */
    public function verificaUsernamePass($username, $pass){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno WHERE "       //consulta para verificar o nome de utilizador e palavra passe na bd
                             ." username='$username' AND "
                             ." pass = '$pass'";

        if (!$resultado = $ligacao->query($consulta)) {
            echo " Falha na consulta: ". $ligacao->error;
            $ligacao->close(); // fecha a ligação
            return false;
        }

         if ($resultado->num_rows > 0){ // verifica de o resultado devolve linhas
            $ligacao->close();  // fecha a ligação
            return true;
        }
    }
    
    /**
     * Função para inserção de um aluno na base de dados
     * 
     * @access public
     * @param Aluno $aluno 
     * @return boolean Devolve TRUE caso sucesso, FALSE caso insucesso
     */
    public function insereAlunoBD(Aluno $aluno) {
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

       $consulta = "INSERT INTO aluno"
                    ."(email, nome, idade, turma, ano, username, pass) VALUES "
                    ."('$aluno->email','$aluno->nome', '$aluno->idade', "
                    ." '$aluno->turma','$aluno->ano', '$aluno->username', '$aluno->pass')";


       if (!$ligacao->query($consulta)) {
            echo " Falha na consulta: ". $ligacao->error;
            $ligacao->close(); // fecha a ligação
            return false;
        }

        $ligacao->close();
       return true;
   }
  
    /**
     * Função para eliminar de um aluno na base de dados através do email
     * 
     * @access public
     * @param String $email 
     * @return boolean Devolve TREU caso sucesso, FALSE caso insucesso
     */
    public function eliminaAlunoBD($email) {
   
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

       $consulta = "DELETE FROM aluno WHERE email='$email' ";


        if (!$ligacao->query($consulta)) {
            echo " Falha na consulta: ". $ligacao->error;
            $ligacao->close(); // fecha a ligação
            return false;
        }

        if ($ligacao->affected_rows > 0){ // verifica de o resultado devolve linhas
            $ligacao->close();  // fecha a ligação
            return true;
        }      
        
       $ligacao->close();
       return false;

  }
  
  
     /**
     * Função para edição de um aluno na base de dados. A procura do registo é efetuada por email
     * 
     * @access public
     * @param Aluno $aluno
     * @param String $email
     * @return boolean Devolve TREU caso sucesso, FALSE caso insucesso
     */
    public function editaAlunoBD(Aluno $aluno, $email) {
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

       $consulta = "UPDATE aluno SET  email='$aluno->email', "
                                  . " nome='$aluno->nome', "
                                  . " idade='$aluno->idade', "
                                  . " turma='$aluno->turma', "
                                  . " ano='$aluno->ano', "
                                  . " username='$aluno->username', "
                                  . " pass='$aluno->pass' "
                    . " WHERE email='$email'";
               
       if (!$ligacao->query($consulta)) {
            echo " Falha na consulta: ". $ligacao->error;
            $ligacao->close(); // fecha a ligação
            return false;
        }

        $ligacao->close();
       return true;

  }
  
    /**
     * Função para devolver um aluno e respetivos dados com base no email
     *
     * @access public 
     * @param String $email Nome do utilizador a encontrar
     * @return boolean|\Aluno Devolve um aluno com os respetivos dados
     */
    public function encontraAlunoPorEmail($email){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno WHERE email='$email'";

        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); /* fecha a ligação */
            return false;
        }

        if (!$resultado->num_rows){
            $ligacao->close(); /* fecha a ligação */
            return false;
        }
        
        $aluno = new Aluno();
         
        /* percorrer os registos (linhas) da tabela*/
        $row = $resultado->fetch_assoc();  
        
        /* fetch associative array */
        $aluno->setEmail($row["email"]);
        $aluno->setNome($row["nome"]);
        $aluno->setIdade($row["idade"]);
        $aluno->setTurma($row["turma"]);
        $aluno->setAno($row["ano"]);
        $aluno->setUsername($row["username"]);
        $aluno->setPass($row["pass"]);
        
        $resultado->free();  /* liberta o resultado*/
        $ligacao->close();  /* fecha a licgaçao */
        
        return $aluno;     /* devolve o arrau de aluno */
    }
  
    /**
     * Função para devolver um aluno e respetivos dados com base no username
     *
     * @access public
     * @param String $username Nome do utilizador a encontrar
     * @return boolean|\Aluno Devolve um aluno com os respetivos dados
     */
    public function encontraAlunoPorUsername($username){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno WHERE username='$username'";

        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); /* fecha a ligação */
            return false;
        }

        if (!$resultado->num_rows){
            $ligacao->close(); /* fecha a ligação */
            return false;
        }
        
        $aluno = new Aluno();
         
        /* percorrer os registos (linhas) da tabela*/
        $row = $resultado->fetch_assoc();  
        
        /* fetch associative array */
        $aluno->setEmail($row["email"]);
        $aluno->setNome($row["nome"]);
        $aluno->setIdade($row["idade"]);
        $aluno->setTurma($row["turma"]);
        $aluno->setAno($row["ano"]);
        $aluno->setUsername($row["username"]);
        $aluno->setPass($row["pass"]);
        
        $resultado->free();  /* liberta o resultado*/
        $ligacao->close();  /* fecha a licgaçao */
        
        return $aluno;     /* devolve o arrau de aluno */
    }
    
    /**
     * Função para verificar se um email já está registado
     *
     * @access public  
     * @return boolean Devolve TRUE caso sucesso e FALSE caso insucesso
     */
    public function emailExiste($email){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno WHERE email='$email'";

        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); /* fecha a ligação */
            return false;
        }

        if (!$resultado->num_rows){
            $ligacao->close(); /* fecha a ligação */
            return false;
        }
      
        $resultado->free();  /* liberta o resultado*/
        $ligacao->close();  /* fecha a licgaçao */ 
        return true;     /* devolve o arrau de aluno */
    }

    /**
     *  Função para verificar se um username já está registado
     * 
     * @access public
     * @param String $username
     * @return boolean Devolve TRUE caso sucesso e FALSE caso insucesso
     */
    public function usernameExiste($username){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno WHERE username='$username'";

        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); /* fecha a ligação */
            return false;
        }

        if (!$resultado->num_rows){
            $ligacao->close(); /* fecha a ligação */
            return false;
        }
      
        $resultado->free();  /* liberta o resultado*/
        $ligacao->close();  /* fecha a licgaçao */ 
        return true;     /* devolve o arrau de aluno */
    } 
    
    
  
    /**
     * Função que devolve um array de objetos do tipo Aluno existentes na tabela 
     * aluno da base de dados
     * 
     * @access public 
     * @return boolean|\Aluno Devolve array de alunos caso sucesso e 
     * FALSE caso insucesso
     */
    public function arrayComTodosOsAlunos(){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno";

        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); // fecha a ligação
            return false;
        }

        $alunos = array();
         
        /* percorrer os registos (linhas) da tabela*/
         while ($row = $resultado->fetch_assoc()){    /* fetch associative array */
             $tempAluno = new Aluno();
             $tempAluno->setEmail($row["email"]);
             $tempAluno->setNome($row["nome"]);
             $tempAluno->setIdade($row["idade"]);
             $tempAluno->setTurma($row["turma"]);
             $tempAluno->setAno($row["ano"]);
             $tempAluno->setUsername($row["username"]);
             $tempAluno->setPass($row["pass"]);
             $alunos[] = $tempAluno;
             }
    
        $resultado->free();  /* liberta o resultado*/
        $ligacao->close();  /* fecha a licgaçao */
        return $alunos;     /* devolve o arrau de aluno */
    }

     /**
     * Função que devolve um array de objetos do tipo Aluno que têm a string 
     * recebida na função no nome 
     *  
     * @access public
     * @return boolean|\Aluno Devolve array de alunos caso sucesso e 
     * FALSE caso insucesso
     */
    public function arrayProcuraAlunosPorNome($nome){
 
        /* estabelece ligação à base de dados*/
        $ligacao = $this->ligaBD(); 

        /* verifica se houve erro na ligação */
        if (!$ligacao){ 
            return false;
        }

        $consulta = "SELECT * FROM aluno WHERE nome LIKE '%$nome%'";

        if (!$resultado = $ligacao->query($consulta)) {
            echo(" Falha na consulta: ". $ligacao->error);
            $ligacao->close(); // fecha a ligação
            return false;
        }

        $alunos = array();
         
        /* percorrer os registos (linhas) da tabela*/
         while ($row = $resultado->fetch_assoc()){    /* fetch associative array */
             $tempAluno = new Aluno();
             $tempAluno->setEmail($row["email"]);
             $tempAluno->setNome($row["nome"]);
             $tempAluno->setIdade($row["idade"]);
             $tempAluno->setTurma($row["turma"]);
             $tempAluno->setAno($row["ano"]);
             $tempAluno->setUsername($row["username"]);
             $tempAluno->setPass($row["pass"]);
             $alunos[] = $tempAluno;
             }
    
        $resultado->free();  /* liberta o resultado*/
        $ligacao->close();  /* fecha a licgaçao */
        return $alunos;     /* devolve o arrau de aluno */
    }

    
    
    
    
    /**
     * Função para mostar uma tabela com todos os registos de alunos
     * 
     * @access public
     */
    public function mostraTabelaTodosAlunos(){

        $alunos = $this->arrayComTodosOsAlunos();
 
       /* criação do cabeçalho da tabela de resultados */
        ?>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Turma</th>
                    <th>Ano</th>
                    <th>Username</th>
                    <th>Pass</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <?php
            
        /* preenchimento das linhas da tabela*/
        foreach ($alunos as $aluno){
            ?>
            <tbody>
                <tr>
                    <td> <?=$aluno->email?> </td>
                    <td> <?=$aluno->nome?> </td>
                    <td> <?=$aluno->idade?> </td>
                    <td> <?=$aluno->turma?> </td>
                    <td> <?=$aluno->ano?> </td>
                    <td> <?=$aluno->username?> </td>
                    <td> <?=$aluno->pass?> </td>
                    <td><a class="glyphicon glyphicon-remove" href="eliminaalunobd.php?email=<?=$aluno->email?>"> Remover</a></td>
                    <td><a class="glyphicon glyphicon-edit" href="formeditar.php?email=<?=$aluno->email?>"> Editar</a></td>
                </tr>   
            </tbody>
        <?php
        }
        ?>
        </table>    
        <?php
        
       
    }

   
     /**
      * Função para mostrar os alunos recebidos num array
      * 
      * @access public
      * @param Array $alunos
      */
    public function mostraTabelaAlunos($alunos){

     /* criação do cabeçalho da tabela de resultados */
        ?>
        <table align="center">
            <tr>
                <td>Email</td>
                <td>Nome</td>
                <td>Idade</td>
                <td>Turma</td>
                <td>Ano</td>
                <td>Username</td>
                <td>Pass</td>
                <td>Operações</td>
            </tr>
            <?php
            
        /* preenchimento das linhas da tabela*/
        foreach ($alunos as $aluno){
            ?>
            <tr>
                <td> <?=$aluno->email?> </td>
                <td> <?=$aluno->nome?> </td>
                <td> <?=$aluno->idade?> </td>
                <td> <?=$aluno->turma?> </td>
                <td> <?=$aluno->ano?> </td>
                <td> <?=$aluno->username?> </td>
                <td> <?=$aluno->pass?> </td>
                <td><a href="eliminaalunobd.php?email=<?=$aluno->email?>">Remover</a>&nbsp;</td>
                <td><a href="formeditar.php?email=<?=$aluno->email?>">Editar</a></td>
            </tr>   
        
        <?php
        }
        ?>
        </table>    
        <?php
        
       
    }
 
    /**
     * Função para criar um link para uma determinada página
     * 
     * @access public
     * @param String $endereco endereço da ágina a abrir
     * @param String $titulo texto a atribuir ao endereço
     */
    public function abrePagina ($endereco, $titulo) {

    ?>
      <a href="<?=$endereco?>"><?=$titulo?></a>
    <?php
    }
   
   /**
     * Verifica se existe sessão iniciada através variável de sessão
     * $_SESSION['utilizadorValido']. 
     * 
     * @return boolean Devolve TRUE caso sucesso e FALSE caso insucesso
     */
    public function estaComSessaoAberta(){
       
        if (!isset($_SESSION['utilizadorValido'])){ //verifica de existe um utilizador registado
            return false;
        }
        return true;
    }
 
    /**
     * Verifica se existe sessão iniciada através variável de sessão
     * $_SESSION['utilizadorValido']. Cria página de erro caso a sessão não 
     * esteja iiciada
     * 
     * @access public
     * @return boolean Devolve TRUE caso sucesso e FALSE caso insucesso
     */
    public function verificaSessao(){
       
        if (!isset($_SESSION['utilizadorValido'])){ //verifica de existe um utilizador registado
            $this->mostraCabecalho("Problema"); // função para mostrar o cabeçalho da página
            echo "Utilizador não Autenticado !!";
            $this->abrePagina ("login.php", "Login");
            $this->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página
            return false;
        }
      
        return true;
       
      }
      
    /**
     * Função para terminar a sessão. Vai desregistar a variável de sessão $_SESSION['utilizadorValido']
     * 
     * @access public
     */
    public function terminaSessao(){
    
        echo "Até à proxima ". $_SESSION['utilizadorValido'];
        unset($_SESSION['utilizadorValido']); //---> desregista a variável de sessão
        session_unset();//--------------------------> desregista todas as variàveis
        session_destroy(); //-----------------------> destroi a sessão
        echo "<br> A sua sessão foi terminada.<br>";
        $this->abrePagina("login.php", "Ir para página de login");
        $this->mostraRodape("Programa Alunos"); // função para mostrar o rodaé da página da página    
    
        
    }

 }