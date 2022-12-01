<?php
    include_once(__DIR__."../utils/autoload.php");

    class LencolFreatico{
        private $id;
        private $dataAnalise;
        private $numAmostra;
        private $relatorio;
        private $idMonitor;
        public function __construct($id, $dataAnalise, $numAmostra, $relatorio, $idMonitor){
            $this->setId($id);
            $this->setDataAnalise($dataAnalise);
            $this->setNumAmostra($numAmostra);
            $this->setRelatorio($relatorio);
            $this->setIdMonitor($idMonitor);
        }

        public function setId($id){
            $this->id = $id;
        }
        public function setDataAnalise($dataAnalise){
            if($dataAnalise <> "")
                $this->dataAnalise = $dataAnalise;
            else
                throw new Exception("Insira a data em que a análise foi realizada, por favor.");
        }
        public function setNumAmostra($numAmostra){
            if($numAmostra <> 0)
                $this->numAmostra = $numAmostra;
            else
                throw new Exception("Insira o número da amostra coletada, por favor.");
        }
        public function setRelatorio($relatorio){
            if($relatorio <> "")
                $this->relatorio = $relatorio;
            else
                throw new Exception("Insira o relatório do lençol freático, por favor.");
        }
        public function setIdMonitor($idMonitor){
            $this->idMonitor = $idMonitor;
        }

        public function getId(){ return $this->id; }
        public function getDataAnalise(){ return $this->dataAnalise; }
        public function getNumAmostra(){ return $this->numAmostra; }
        public function getRelatorio(){ return $this->relatorio; }
        public function getIdMonitor(){ return $this->idMonitor; }

        public function create(){
            $sql = "INSERT INTO lencol_freatico (data_analise, num_amostra, relatorio_len, id_monitor)
                    VALUES(:dataAnalise, :numAmostra, :relatorio, :idMonitor)";
            $par = array(":dataAnalise"=>$this->getDataAnalise(), ":numAmostra"=>$this->getNumAmostra(),
                        ":relatorio"=>$this->getRelatorio(), ":idMonitor"=>$this->getIdMonitor());
            return Database::comando($sql, $par);
        }

        public static function consultar($tipo, $info){
            $sql = "SELECT * FROM lencol_freatico";
            switch($tipo){
                case(1): $sql .= " WHERE id_lencol = :info"; break;
                case(2): $sql .= " WHERE data_analise LIKE :info"; $info = "%".$info."%"; break;
                case(3): $sql .= " WHERE num_amostra LIKE :info"; $info .= "%"; break;
                case(4): $sql .= " WHERE relatorio_len LIKE :info"; $info = "%".$info."%"; break;
                case(5): $sql .= " WHERE id_monitor = :info"; break;
            }
            $par = array(":info"=>$info);
            return Database::consulta($sql, $par);
        }

        public function update(){
            $sql = "UPDATE lencol_freatico
                    SET data_analise = :dataAnalise, num_amostra = :numAmostra, relatorio_len = :relatorio
                    WHERE id_lencol = :id";
            $par = array(":dataAnalise"=>$this->getDataAnalise(), ":numAmostra"=>$this->getNumAmostra(),
                        ":relatorio"=>$this->getRelatorio(), ":id"=>$this->getId());
            return Database::comando($sql, $par);
        }

        public static function delete($id){
            $sql = "DELETE FROM lencol_freatico WHERE id_lencol = :id";
            $par = array(":id"=>$id);
            return Database::comando($sql, $par);
        }
    }
?>