<?php
    include_once (__DIR__ ."/../utils/autoload.php");
    class Biogas {
        // Atributos
        private $id;
        private $dataMoni;
        private $relatorio;
        private $monitor;

        //Método construtor
        public function __construct($id, $dataMoni, $relatorio, Monitor $monitor) {
            $this->setId($id);
            $this->setDataMoni($dataMoni);
            $this->setRelatorio($relatorio);
            $this->setMonitor($monitor);
        }

        //Métodos setters e getters
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }     

        public function getDataMoni() {
            return $this->dataMoni;
        }

        public function setDataMoni($dataMoni) {
            $this->dataMoni = $dataMoni;
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

        //Métodos de criação, exclusão, atualização e consulta
        public function create(){
            $sql = 'INSERT INTO biogas (data_moni, relatorio, id_monitor) 
            VALUES (:data_moni, :relatorio, :id_monitor)';
            $parametros = array(":data_moni"=>$this->getDatamoni(),
                                ":relatorio"=>$this->getRelatorio(),
                                ":id_monitor"=>$this->getMonitor()->getId());
            Database::comando($sql,$parametros);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM biogas WHERE id_biogas = :id_biogas";
            $params = array(
                ":id_biogas" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
        }

        public function update(){
            $sql = 'UPDATE biogas 
            SET data_moni = :data_moni, relatorio = :relatorio
            WHERE id_biogas = :id_biogas';
            $parametros = array(":data_moni"=>$this->getDatamoni(),
                                ":relatorio"=>$this->getRelatorio(),
                                ":id_biogas"=>$this->getId());
            Database::comando($sql,$parametros);
            return true;
        }

        public static function consultar($buscar = 0, $procurar = ""){
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

        public static function consultarId($id){
            $sql = "SELECT * FROM biogas WHERE id_biogas = :id_biogas";
            $params = array(':id_biogas'=>$id);
            return Database::consulta($sql, $params);
        }
    }
?>