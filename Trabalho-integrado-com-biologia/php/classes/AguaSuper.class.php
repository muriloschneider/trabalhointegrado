<?php
    include_once(__DIR__."../utils/autoload.php");

    class AguaSuper{
        private $id;
        private $dataColeta;
        private $areaColeta;
        private $numAmostra;
        private $resultado;
        private $idMonitor;
        public function __construct($id, $dataColeta, $areaColeta, $numAmostra, $resultado, $idMonitor){
            $this->setId($id);
            $this->setDataColeta($dataColeta);
            $this->setAreaColeta($areaColeta);
            $this->setNumAmostra($numAmostra);
            $this->setResultado($resultado);
            $this->setIdMonitor($idMonitor);
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setDataColeta($dataColeta){
            if($dataColeta <> "")
                $this->dataColeta = $dataColeta;
            else
                throw new Exception("Insira a data em que a coleta foi realizada, por favor.");
        }
        public function setAreaColeta($areaColeta){
            if($areaColeta <> "")
                $this->areaColeta = $areaColeta;
            else
                throw new Exception("Insira a área em que a coleta foi realizada, por favor.");
        }
        public function setNumAmostra($numAmostra){
            if($numAmostra <> 0)
                $this->numAmostra = $numAmostra;
            else
                throw new Exception("Insira o número da amostra coletada, por favor.");
        }
        public function setResultado($resultado){
            if($resultado <> "")
                $this->resultado = $resultado;
            else
                throw new Exception("Insira o resultado da análise da amostra, por favor.");
        }
        public function setIdMonitor($idMonitor){
            $this->idMonitor = $idMonitor;
        }

        public function getId(){ return $this->id; }
        public function getDataColeta(){ return $this->dataColeta; }
        public function getAreaColeta(){ return $this->areaColeta; }
        public function getNumAmostra(){ return $this->numAmostra; }
        public function getResultado(){ return $this->resultado; }
        public function getIdMonitor(){ return $this->idMonitor; }
        
        public function create(){
            $sql = "INSERT INTO aguas_sup (data_coleta, area_coleta, num_amostra, resultado, id_monitor)
                    VALUES(:dataColeta, :areaColeta, :numAmostra, :resultado, :idMonitor)";
            $par = array(":dataColeta"=>$this->getDataColeta(), ":areaColeta"=>$this->getAreaColeta(),
                        ":numAmostra"=>$this->getNumAmostra(), ":resultado"=>$this->getResultado(), ":idMonitor"=>$this->getIdMonitor());
        }
    }
?>