<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class Geotecnico {
        // Atributos
        private $id;
        private $moni_geo;
        private $nivel_recal;
        private $nivel_liqui;
        private $nivel_incli;
        private $num_apare;
        private $local_apare;
        private $monitor;

        //Método construtor
        public function __construct($id, $moni_geo, $nivel_recal, $nivel_liqui, $nivel_incli, $num_apare, $local_apare, Monitor $monitor) {
            $this->setId($id);
            $this->setMonigeo($moni_geo);
            $this->setNivelrecal($nivel_recal);
            $this->setNivelliqui($nivel_liqui);
            $this->setNivelincli($nivel_incli);
            $this->setNumapare($num_apare);
            $this->setLocalapare($local_apare);
            $this->setMonitor($monitor);
        }

        //Métodos setters e getters
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }     

        public function getMonigeo() {
            return $this->moni_geo;
        }

        public function setMonigeo($moni_geo) {
            $this->moni_geo = $moni_geo;
        }
        
        public function getNivelrecal() {
            return $this->nivel_recal;
        }

        public function setNivelrecal($nivel_recal) {
            $this->nivel_recal = $nivel_recal;
        }

        public function getNivelliqui() {
            return $this->nivel_liqui;
        }

        public function setnivelliqui($nivel_liqui) {
            $this->nivel_liqui = $nivel_liqui;
        }

        public function getNivelincli() {
            return $this->nivel_incli;
        }

        public function setNivelincli($nivel_incli) {
            $this->nivel_incli = $nivel_incli;
        }

        public function getNumapare() {
            return $this->num_apare;
        }

        public function setNumapare($num_apare) {
            $this->num_apare = $num_apare;
        }

        public function getLocalapare() {
            return $this->local_apare;
        }

        public function setLocalapare($local_apare) {
            $this->local_apare = $local_apare;
        }

        public function getMonitor() {
            return $this->monitor;
        }

        public function setMonitor($monitor) {
            $this->monitor = $monitor;
        }

        //Métodos de criação, consulta, atualização e exclusão
        public function create(){
            $sql = 'INSERT INTO aterro.geotecnico (data_moni_geo, nivel_recal, nivel_liqui, nivel_incli, num_apare, local_apare, id_monitor) 
            VALUES (:data_moni_geo, :nivel_recal, :nivel_liqui, :nivel_incli, :num_apare, :local_apare, :id_monitor)';
            $parametros = array(":data_moni_geo"=>$this->getMonigeo(),
                                ":nivel_recal"=>$this->getNivelrecal(),
                                ":nivel_liqui"=>$this->getNivelliqui(),
                                ":nivel_incli"=>$this->getNivelincli(),
                                ":num_apare"=>$this->getNumapare(),
                                ":local_apare"=>$this->getLocalapare(),
                                ":id_monitor"=>$this->getMonitor()->getId());
            return Database::comando($sql,$parametros);
        }

        public function delete(){
            $sql = "DELETE FROM aterro.geotecnico WHERE id_geo = :id_geo";
            $params = array(
                ":id_geo" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
        }

        public function update(){
            $sql = 'UPDATE aterro.geotecnico 
            SET data_moni_geo = :data_moni_geo, nivel_recal = :nivel_recal, nivel_liqui = :nivel_liqui, nivel_incli = :nivel_incli, num_apare = :num_apare, local_apare = :local_apare
            WHERE id_geo = :id_geo';
            $parametros = array(":data_moni_geo"=>$this->getMonigeo(),
                                ":nivel_recal"=>$this->getNivelrecal(),
                                ":nivel_liqui"=>$this->getNivelliqui(),
                                ":nivel_incli"=>$this->getNivelincli(),
                                ":num_apare"=>$this->getNumapare(),
                                ":local_apare"=>$this->getLocalapare(),
                                ":id_geo"=>$this->getId());
            return Database::comando($sql,$parametros);
        }

        public static function consultar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM geotecnico";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE id_geo like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(2): $sql .= " WHERE data_moni_geo like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(3): $sql .= " WHERE nivel_recal like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(4): $sql .= " WHERE nivel_liqui like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(5): $sql .= " WHERE nivel_incli like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(6): $sql .= " WHERE num_apare like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(7): $sql .= " WHERE local_apare like :procurar"; $procurar = "%".$procurar."%"; break;
                    case(8): $sql .= " WHERE id_monitor like :procurar"; $procurar = "%".$procurar."%"; break;
                }
            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return Database::consulta($sql, $parametros);
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM geotecnico WHERE id_geo = :id_geo";
            $params = array(':id_geo'=>$id);
            return Database::consulta($sql, $params);
        }
    }
?>