<?php
    include_once(__DIR__."../utils/autoload.php");

    class LiquidoLix{
        private $id;
        private $moniChorume;
        private $quantChorume;
        private $quantAgua;
        private $idMonitor;
        public function __construct($id, $moniChorume, $quantChorume, $quantAgua, $idMonitor){
            $this->setId($id);
            $this->setMoniChorume($moniChorume);
            $this->setQuantChorume($quantChorume);
            $this->setQuantAgua($quantAgua);
            $this->setIdMonitor($idMonitor);
        }

        public function setId($id){ $this->id = $id; }
        public function setMoniChorume($moniChorume){ $this->moniChorume = $moniChorume; }
        public function setQuantChorume($quantChorume){ $this->quantChorume = $quantChorume; }
        public function setQuantAgua($quantAgua){ $this->quantAgua = $quantAgua; }
        public function setIdMonitor($idMonitor){ $this->idMonitor = $idMonitor; }

        public function getId(){ return $this->id; }
        public function getMoniChorume(){ return $this->moniChorume; }
        public function getQuantChorume(){ return $this->quantChorume; }
        public function getQuantAgua(){ return $this->quantAgua; }
        public function getIdMonitor(){ return $this->idMonitor; }

        public function create(){
            $sql = "INSERT INTO liquidos_lixiviados (moni_chorume, quanti_chorume, quanti_agua, monitor_id_moni)
                    VALUES(:moniChorume, :quantChorume, :quantAgua, :idMonitor)";
            $par = array(":moniChorume"=>$this->getMoniChorume(), ":quantChorume"=>$this->getQuantChorume(),
                        ":quantAgua"=>$this->getQuantAgua(), ":idMonitor"=>$this->getIdMonitor());
            return Database::comando($sql, $par);
        }
        
        public static function consultar($tipo, $info){
            $sql = "SELECT * FROM liquidos_lixiviados";
            switch($tipo){
                case(1): $sql .= " WHERE id_liqui = :info"; break;
                case(2): $sql .= " WHERE moni_chorume LIKE :info"; $info = "%".$info."%"; break;
                case(3): $sql .= " WHERE quanti_chorume LIKE :info"; $info .= "%"; break;
                case(4): $sql .= " WHERE quanti_agua LIKE :info"; $info .= "%"; break;
                case(5): $sql .= " WHERE monitor_id_moni = :info"; break;
            }
            $par = array(":info"=>$info);
            return Database::consulta($sql, $par);
        }

        public function update(){
            $sql = "UPDATE liquidos_lixiviados
                    SET moni_chorume = :moniChorume, quanti_chorume = :quantChorume, quanti_agua = :quantAgua
                    WHERE id_liqui = :id";
            $par = array(":moniChorume"=>$this->getMoniChorume(), ":quantChorume"=>$this->getQuantChorume(),
                        ":quantAgua"=>$this->getQuantAgua(), ":id"=>$this->getId());
            return Database::comando($sql, $par);
        }

        public static function delete($id){
            $sql = "DELETE FROM liquidos_lixiviados WHERE id_liqui = :id";
            $par = array(":id"=>$id);
            return Database::comando($sql, $par);
        }
    }
?>