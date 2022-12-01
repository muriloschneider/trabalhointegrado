<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Usuario{
        private $id;
        private $nome;
        private $email;
        private $telefone;
        private $senha;
        private $foto;

        public function __construct($id, $nome, $email, $telefone, $senha, $foto) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setEmail($email);
            $this->setTelefone($telefone);
            $this->setSenha($senha);
            $this->setFoto($foto);

        }  
        

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function getFoto() {
            return $this->foto;
        }
        
        public function setId($id) {
            $this->id = $id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }
        
         public function setFoto($foto) {
            $this->foto = $foto;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Usuário]<br>".
                    "<br>ID do Usuário: ".$this->getId().
                    "<br>Nome: ".$this->getNome().
                    "<br>Email: ".$this->getEmail().
                    "<br>Telefone: ".$this->getTelefone().
                    "<br>Senha: ".$this->getSenha().
                    "<br>Foto: ".$this->getFoto();

            return $str;
        }

        //Métodos de persistência
        public function create() {
            if(!Usuario::autenticarEmail($this->getEmail())) {
                $sql = "INSERT INTO Usuario (usuaNome, usuaEmail, usuaTelefone, usuaSenha, usuaFoto) VALUES (:usuaNome, :usuaEmail, :usuaTelefone, :usuaSenha, :usuaFoto)";
                // echo $sql; 
                // echo '<br>';
                // die;
                $params = array(
                    ":usuaNome" => $this->getNome(),
                    ":usuaEmail" => $this->getEmail(),
                    ":usuaTelefone" => $this->getTelefone(),
                    ":usuaSenha" => $this->getSenha(),
                    ":usuaFoto" => $this->getFoto()
                );
                // print_r ($params);
                // die;
                Database::comando($sql, $params);
                return true;
            } else {
                return false;
            }
        }

        public function update() {
            if(!Usuario::autenticarEmail($this->getEmail())) {
                $sql = "UPDATE Usuario SET usuaNome = :usuaNome, usuaEmail = :usuaEmail, usuaTelefone = :usuaTelefone, usuaSenha = :usuaSenha, usuaFoto = :usuaFoto WHERE usuaId = :usuaId";
                $params = array(
                    ":usuaId" => $this->getId(),
                    ":usuaNome" => $this->getNome(),
                    ":usuaEmail" => $this->getEmail(),
                    ":usuaTelefone" => $this->getTelefone(),
                    ":usuaSenha" => $this->getSenha(),
                    ":usuaFoto" => $this->getFoto()
                );
                Database::comando($sql, $params);
                return true;
            } else {
                return false;
            }
        }

        public function delete(){
            $sql = "DELETE FROM Usuario WHERE usuaId = :usuaId";
            $params = array(
                ":usuaId" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Usuario";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE usuaId like :pesquisa"; break;
                    case(2): $sql .= " WHERE usuaNome like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE usuaEmail like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE usuaTelefone like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE usuaSenha like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY usuaId";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id){
            $sql = "SELECT * FROM Usuario WHERE usuaId = :usuaId";
            $params = array(':usuaId'=>$id);
            return Database::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($email, $senha){
            $sql = "SELECT usuaId FROM Usuario WHERE usuaEmail = :usuaEmail AND usuaSenha = :usuaSenha";
            $params = array(
                ':usuaEmail' => $email,
                ':usuaSenha' => $senha
            );
            session_start();
            if (Database::consulta($sql, $params)) {
                $_SESSION['usuaId'] = Database::consulta($sql, $params)[0]['usuaId'];
                return true;
            } else {
                $_SESSION['usuaId'] = "";
                return false;
            }
        }
        
        public static function autenticarEmail($email){
            $sql = "SELECT usuaId FROM Usuario WHERE usuaEmail = :usuaEmail";
            $params = array(
                ':usuaEmail' => $email
            );
            if (Database::consulta($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>