<?php

include_once (__DIR__ ."/../utils/autoload.php");

    class Sonora{
        private $id_pressao;
        private $area_moni;
        private $email;
        private $telefone;
        private $senha;
        private $foto;

        public function __construct($id_pressao, $area_moni, $email, $telefone, $senha, $foto) {
            $this->setid_pressao($id_pressao);
            $this->setarea_moni($area_moni);
            $this->setEmail($email);
            $this->setTelefone($telefone);
            $this->setSenha($senha);
            $this->setFoto($foto);

        }  
        

        //Métodos Getters e Setters
        public function getid_pressao() {
            return $this->id_pressao;
        }

        public function getarea_moni() {
            return $this->area_moni;
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
        
        public function setid_pressao($id_pressao) {
            $this->id_pressao = $id_pressao;
        }

        public function setarea_moni($area_moni) {
            $this->area_moni = $area_moni;
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
                    "<br>id_pressao do Usuário: ".$this->getid_pressao().
                    "<br>area_moni: ".$this->getarea_moni().
                    "<br>Email: ".$this->getEmail().
                    "<br>Telefone: ".$this->getTelefone().
                    "<br>Senha: ".$this->getSenha().
                    "<br>Foto: ".$this->getFoto();

            return $str;
        }

        //Métodos de persistência
        public function create() {
            if(!Usuario::autenticarEmail($this->getEmail())) {
                $sql = "INSERT INTO Usuario (usuaarea_moni, usuaEmail, usuaTelefone, usuaSenha, usuaFoto) VALUES (:usuaarea_moni, :usuaEmail, :usuaTelefone, :usuaSenha, :usuaFoto)";
                // echo $sql; 
                // echo '<br>';
                // die;
                $params = array(
                    ":usuaarea_moni" => $this->getarea_moni(),
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
                $sql = "UPDATE Usuario SET usuaarea_moni = :usuaarea_moni, usuaEmail = :usuaEmail, usuaTelefone = :usuaTelefone, usuaSenha = :usuaSenha, usuaFoto = :usuaFoto WHERE usuaid_pressao = :usuaid_pressao";
                $params = array(
                    ":usuaid_pressao" => $this->getid_pressao(),
                    ":usuaarea_moni" => $this->getarea_moni(),
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
            $sql = "DELETE FROM Usuario WHERE usuaid_pressao = :usuaid_pressao";
            $params = array(
                ":usuaid_pressao" => $this->getid_pressao()
            );
            Database::comando($sql, $params);
            return true;
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM Usuario";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE usuaid_pressao like :pesquisa"; break;
                    case(2): $sql .= " WHERE usuaarea_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE usuaEmail like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE usuaTelefone like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE usuaSenha like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY usuaid_pressao";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarData($id_pressao){
            $sql = "SELECT * FROM Usuario WHERE usuaid_pressao = :usuaid_pressao";
            $params = array(':usuaid_pressao'=>$id_pressao);
            return Database::consulta($sql, $params);
        }


        //Métodos de autenticação
        public static function autenticar($email, $senha){
            $sql = "SELECT usuaid_pressao FROM Usuario WHERE usuaEmail = :usuaEmail AND usuaSenha = :usuaSenha";
            $params = array(
                ':usuaEmail' => $email,
                ':usuaSenha' => $senha
            );
            session_start();
            if (Database::consulta($sql, $params)) {
                $_SESSION['usuaid_pressao'] = Database::consulta($sql, $params)[0]['usuaid_pressao'];
                return true;
            } else {
                $_SESSION['usuaid_pressao'] = "";
                return false;
            }
        }
        
        public static function autenticarEmail($email){
            $sql = "SELECT usuaid_pressao FROM Usuario WHERE usuaEmail = :usuaEmail";
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