<?php
    include_once(__DIR__."../utils/autoload.php");

    class AguaSuper{
        private $id;
        private $dataColeta;
        private $areaColeta;
        private $numAmostra;
        private $resultado;
        private $monitor;

        public function __construct($id, $dataColeta, $areaColeta, $numAmostra, $resultado, Monitor $monitor){
            $this->setId($id);
            $this->setDataColeta($dataColeta);
            $this->setAreaColeta($areaColeta);
            $this->setNumAmostra($numAmostra);
            $this->setResultado($resultado);
            $this->setMonitor($monitor);
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setDataColeta($dataColeta){
            $this->dataColeta = $dataColeta;
        }

        public function setAreaColeta($areaColeta){
            $this->areaColeta = $areaColeta;
        }

        public function setNumAmostra($numAmostra){
            $this->numAmostra = $numAmostra;
        }
        public function setResultado($resultado){
            $this->resultado = $resultado;
        }

        public function setMonitor($monitor){
            $this->monitor = $monitor;
        }

        public function getId(){
            return $this->id;
        }

        public function getDataColeta(){
            return $this->dataColeta;
        }

        public function getAreaColeta(){
            return $this->areaColeta;
        }
        
        public function getNumAmostra(){
            return $this->numAmostra;
        }
        
        public function getResultado(){
            return $this->resultado;
        }
        
        public function getMonitor(){
            return $this->monitor;
        }
        
        public function create(){
            $sql = 'INSERT INTO aguas_sup (data_coleta, area_coleta, num_amostra, resultado, id_monitor)
                    VALUES(:data_coleta, :area_coleta, :num_amostra, :resultado, :id_monitor)';
            $parametros = array(":data_coleta"=>$this->getDataColeta(),
                                ":area_coleta"=>$this->getAreaColeta(), 
                                ":num_amostra"=>$this->getNumAmostra(), 
                                ":resultado"=>$this->getResultado(), 
                                ":id_monitor"=>$this->getMonitor()->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM aguas_sup ";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE id_super = :pesquisa"; break;
                    case(2): $sql .= " WHERE data_coleta LIKE :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE area_coleta LIKE :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE num_amostra LIKE :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE resultado LIKE :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= "ORDER BY id_monitor";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public function update(){
            $sql = "UPDATE aguas_sup
                    SET data_coleta = :data_coleta, area_coleta = :area_coleta, num_amostra = :num_amostra, resultado = :resultado, id_monitor = :id_monitor
                    WHERE id_super = :id_super";
            $parametros = array(":data_coleta"=>$this->getDataColeta(),
                                ":area_coleta"=>$this->getAreaColeta(), 
                                ":num_amostra"=>$this->getNumAmostra(), 
                                ":resultado"=>$this->getResultado(), 
                                ":id_monitor"=>$this->getMonitor()->getId(), 
                                ":id_super"=>$this->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM aguas_sup 
                    WHERE id_super = :id_super";
            $parametros = array(
                ":id_super" => $this->getId()
            );
            Database::comando($sql, $parametros);
            return true;
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM aguas_sup WHERE id_super = :id_super";
            $params = array(':id_super'=>$id);
            return Database::consulta($sql, $params);
        }
    }
?>