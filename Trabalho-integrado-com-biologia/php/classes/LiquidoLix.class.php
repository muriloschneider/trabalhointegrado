<?php
    include_once(__DIR__."/../utils/autoload.php");

    class LiquidoLix{
        // Atributos
        private $id;
        private $moniChorume;
        private $quantChorume;
        private $quantAgua;
        private $monitor;

        //Método construtor
        public function __construct($id, $moniChorume, $quantChorume, $quantAgua, Monitor $monitor){
            $this->setId($id);
            $this->setMoniChorume($moniChorume);
            $this->setQuantChorume($quantChorume);
            $this->setQuantAgua($quantAgua);
            $this->setMonitor($monitor);
        }

        //Métodos setters e getters
        public function setId($id){
            $this->id = $id;
        }

        public function setMoniChorume($moniChorume){
            $this->moniChorume = $moniChorume;
        }
        
        public function setQuantChorume($quantChorume){
            $this->quantChorume = $quantChorume;
        }
        
        public function setQuantAgua($quantAgua){
            $this->quantAgua = $quantAgua;
        }
        
        public function setMonitor($monitor){
            $this->monitor = $monitor;
        }

        public function getId(){
            return $this->id;
        }
        
        public function getMoniChorume(){
            return $this->moniChorume;
        }
        
        public function getQuantChorume(){
            return $this->quantChorume;
        }
        
        public function getQuantAgua(){
            return $this->quantAgua;
        }
        
        public function getMonitor(){
            return $this->monitor;
        }

        //Métodos de criação, consulta, atualização e deleção
        public function create(){
            $sql = "INSERT INTO liquidos_lixiviados (moni_chorume, quanti_chorume, quanti_agua, monitor_id_moni)
                    VALUES(:moniChorume, :quantChorume, :quantAgua, :monitor)";
            $parametros = array(":moniChorume"=>$this->getMoniChorume(), 
                         ":quantChorume"=>$this->getQuantChorume(),
                         ":quantAgua"=>$this->getQuantAgua(), 
                         ":monitor"=>$this->getMonitor()->getId());
            return Database::comando($sql, $parametros);
        }
        
        public static function consultar($tipo, $info){
            $sql = "SELECT * FROM liquidos_lixiviados";
            if($tipo > 0){
                switch($tipo){
                    case(1): $sql .= " WHERE id_liqui = :info"; break;
                    case(2): $sql .= " WHERE moni_chorume LIKE :info"; $info = "%".$info."%"; break;
                    case(3): $sql .= " WHERE quanti_chorume LIKE :info"; $info .= "%"; break;
                    case(4): $sql .= " WHERE quanti_agua LIKE :info"; $info .= "%"; break;
                    case(5): $sql .= " WHERE monitor_id_moni = :info"; break;
                }
            }
            if($tipo > 0)
                $parametros = array(":info"=>$info);
            else
                $parametros = array();
            return Database::consulta($sql, $parametros);
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM liquidos_lixiviados WHERE id_liqui = :id_liqui";
            $params = array(':id_liqui'=>$id);
            return Database::consulta($sql, $params);
        }

        public function update(){
            $sql = "UPDATE liquidos_lixiviados
                    SET moni_chorume = :moniChorume, quanti_chorume = :quantChorume, quanti_agua = :quantAgua
                    WHERE id_liqui = :id";
            $parametros = array(":moniChorume"=>$this->getMoniChorume(),
                         ":quantChorume"=>$this->getQuantChorume(),
                         ":quantAgua"=>$this->getQuantAgua(),
                         ":id"=>$this->getId());
            return Database::comando($sql, $parametros);
        }

        public function delete(){
            $sql = "DELETE FROM liquidos_lixiviados WHERE id_liqui = :id";
            $parametros = array(":id"=>$this->getId());
            return Database::comando($sql, $parametros);
        }
    }
?>