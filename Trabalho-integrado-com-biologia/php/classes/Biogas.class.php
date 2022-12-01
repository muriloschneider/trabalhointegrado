<?php
    include_once (__DIR__ ."/../utils/autoload.php");
    class Biogas {
            
        private $id;
        private $data_moni;
        private $relatorio;
        private $monitor;

        public function __construct($id, $data_moni, $relatorio, Monitor $monitor) {
            $this->setId($id);
            $this->setDatamoni($data_moni);
            $this->setRelatorio($relatorio);
            $this->setMonitor($monitor);
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }     

        public function getDatamoni() {
            return $this->data_moni;
        }

        public function setDatamoni($data_moni) {
            $this->data_moni = $data_moni;
        }
        
        public function getRelatorio() {
            return $this->relatorio;
        }

        public function setRelatorio($relatorio) {
            $this->relatorio = $relatorio;
        }

        public function getMonitor() {
            return $this->monitor;
        }

        public function setMonitor($monitor) {
            $this->monitor = $monitor;
        }

        public function create(){
            $sql = 'INSERT INTO aterro.biogas (data_moni, relatorio, id_monitor) 
            VALUES (:data_moni, :relatorio, :id_monitor)';
            $parametros = array(":data_moni"=>$this->getDatamoni(),
                                ":relatorio"=>$this->getRelatorio(),
                                ":id_monitor"=>$this->getMonitor()->getId());
            return Database::comando($sql,$parametros);
        }

        public function delete(){
            $sql = 'UPDATE aterro.biogas SET status = :status
            WHERE id_biogas = :id_biogas';
            $parametros = array(":id_biogas"=>$this->getId());
            return Database::comando($sql,$parametros);
        }

        public function update(){
            $sql = 'UPDATE aterro.biogas 
            SET data_moni = :data_moni, relatorio = :relatorio, id_monitor = :id_monitor, nivel_incli = :nivel_incli, local_apare = :local_apare
            WHERE id_biogas = :id_biogas';
            $parametros = array(":data_moni"=>$this->getDatamoni(),
                                ":relatorio"=>$this->getRelatorio(),
                                ":id_monitor"=>$this->getMonitor()->getId(),
                                ":id_biogas"=>$this->getId());
            return Database::comando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM biogas";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE id_biogas like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(2): $sql .= " WHERE data_moni like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(3): $sql .= " WHERE relatorio like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(4): $sql .= " WHERE id_monitor like :procurar"; $procurar = "%".$procurar."%"; break;
                }
            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return Database::consulta($sql, $parametros);
        }
    }
?>