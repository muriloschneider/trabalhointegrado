<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Monitor {
        
        private $id;
        private $nome;
        private $cpf;
        private $login;
        private $senha;
        private $contato;

        public function __construct($id, $nome, $cpf, $login, $senha, $contato) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setCpf($cpf);
            $this->setLogin($login);
            $this->setSenha($senha);
            $this->setContato($contato);
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }     

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getLogin() {
            return $this->login;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getContato() {
            return $this->contato;
        }

        public function setContato($contato) {
            $this->contato = $contato;
        }

        public function create(){
            $sql = 'INSERT INTO monitor (nome_moni, cpf_moni, login_moni, senha_moni, contato_moni) 
                    VALUES (:nome_moni, :cpf_moni, :login_moni, :senha_moni, :contato_moni)';
            $parametros = array(":nome_moni"=>$this->getNome(),
                                ":cpf_moni"=>$this->getCpf(),
                                ":login_moni"=>$this->getLogin(),
                                ":senha_moni"=>$this->getSenha(),
                                ":contato_moni"=>$this->getContato());
            Database::comando($sql,$parametros);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM monitor 
                    WHERE id_moni = :id_moni";
            $params = array(
                ":id_moni" => $this->getId()
            );
            session_start();
            $_SESSION['id_moni'] = "";
            Database::comando($sql, $params);
            return true;
        }

        public function update(){
            $sql = 'UPDATE monitor SET nome_moni = :nome_moni, cpf_moni = :cpf_moni, login_moni = :login_moni, senha_moni = :senha_moni, contato_moni = :contato_moni
                    WHERE id_moni = :id_moni';
            $parametros = array(":nome_moni"=>$this->getNome(),
                                ":cpf_moni"=>$this->getCpf(),
                                ":login_moni"=>$this->getLogin(),
                                ":senha_moni"=>$this->getSenha(),
                                ":contato_moni"=>$this->getContato(),
                                ":id_moni"=>$this->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM monitor ";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= "WHERE id_moni like :pesquisa"; break;
                    case(2): $sql .= "WHERE nome_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= "WHERE cpf_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= "WHERE login_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= "WHERE senha_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(6): $sql .= "WHERE contato_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= "ORDER BY id_moni";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM monitor WHERE id_moni = :id_moni";
            $params = array(':id_moni'=>$id);
            return Database::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($login, $senha){
            $sql = "SELECT id_moni FROM monitor WHERE login_moni = :login_moni AND senha_moni = :senha_moni";
            $params = array(
                ':login_moni' => $login,
                ':senha_moni' => $senha
            );
            session_start();
            if (Database::consulta($sql, $params)) {
                $_SESSION['id_moni'] = Database::consulta($sql, $params)[0]['id_moni'];
                return true;
            } else {
                $_SESSION['id_moni'] = "";
                return false;
            }
        }
    }
?>