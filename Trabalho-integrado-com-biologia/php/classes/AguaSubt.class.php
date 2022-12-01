<?php
    include_once(__DIR__."../utils/autoload.php");

    class AguaSubt{
        private $id;
        private $numPoco;
        private $numAmostra;
        private $dataColeta;
        private $resultado;
        private $idMonitor;
        public function __construct($id, $numPoco, $numAmostra, $dataColeta, $resultado, $idMonitor){
            $this->setId($id);
            $this->setNumPoco($numPoco);
            $this->setNumAmostra($numAmostra);
            $this->setDataColeta($dataColeta);
            $this->setResultado($resultado);
            $this->setIdMonitor($idMonitor);
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setNumPoco($numPoco){
            if($numPoco <> 0)
                $this->numPoco = $numPoco;
            else
                throw new Exception("Insira o número do poço monitorado, por favor.");
        }
        public function setNumAmostra($numAmostra){
            if($numAmostra <> 0)
                $this->numAmostra = $numAmostra;
            else
                throw new Exception("Insira o número da amostra coletada, por favor.");
        }
        public function setDataColeta($dataColeta){
            if($dataColeta <> "")
                $this->dataColeta = $dataColeta;
            else
                throw new Exception("Insira a data em que a coleta foi realizada, por favor.");
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
        public function getNumPoco(){ return $this->numPoco; }
        public function getNumAmostra(){ return $this->numAmostra; }
        public function getDataColeta(){ return $this->dataColeta; }
        public function getResultado(){ return $this->resultado; }
        public function getIdMonitor(){ return $this->idMonitor; }

        public function create(){
            $sql = "INSERT INTO aguas_sub (num_poco_moni, num_amostra, data_coleta, resultado, id_monitor)
                    VALUES(:numPoco, :numAmostra, :dataColeta, :resultado, :idMonitor)";
            $par = array(":numPoco"=>$this->getNumPoco(), ":numAmostra"=>$this->getNumAmostra(), ":dataColeta"=>$this->getDataColeta(),
                        ":resultado"=>$this->getResultado(), ":idMonitor"=>$this->getIdMonitor());
            return Database::comando($sql, $par);
        }

        public static function consultar($tipo, $info){
            $sql = "SELECT * FROM aguas_sub";
            switch($tipo){
                case(1): $sql .= " WHERE id_subt = :info"; break;
                case(2): $sql .= " WHERE num_poco_moni LIKE :info"; $info .= "%"; break;
                case(3): $sql .= " WHERE num_amostra LIKE :info"; $info .= "%"; break;
                case(4): $sql .= " WHERE data_coleta LIKE :info"; $info = "%".$info."%"; break;
                case(5): $sql .= " WHERE resultado LIKE :info"; $info = "%".$info."%"; break;
                case(6): $sql .= " WHERE id_monitor = :info"; break;
            }
            $par = array(":info"=>$info);
            return Database::consulta($sql, $par);
        }

        public function update(){
            $sql = "UPDATE aguas_sub
                    SET num_poco_moni = :numPoco, num_amostra = :numAmostra, data_coleta = :dataColeta, resultado = :resultado
                    WHERE id_subt = :id";
            $par = array(":numPoco"=>$this->getNumPoco(), ":numAmostra"=>$this->getNumAmostra(),
                        ":dataColeta"=>$this->getDataColeta(), ":resultado"=>$this->getResultado(), ":id"=>$this->getId());
            return Database::comando($sql, $par);
        }

        public static function delete($id){
            $sql = "DELETE FROM aguas_sub WHERE id_subt = :id";
            $par = array(":id"=>$id);
            return Database::comando($sql, $par);    
        }
    }
?>