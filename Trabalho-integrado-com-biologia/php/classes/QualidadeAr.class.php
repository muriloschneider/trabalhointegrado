<?php
    include_once (__DIR__ ."/../utils/autoload.php");

    class QualidadeAr{
        private $id;
        private $dataAnalise;
        private $relatorio;
        private $monitor;
        public function __construct($id, $dataAnalise, $relatorio, Monitor $monitor){
            $this->setId($id);
            $this->setDataAnalise($dataAnalise);
            $this->setRelatorio($relatorio);
            $this->setMonitor($monitor);
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setDataAnalise($dataAnalise){
            $this->dataAnalise = $dataAnalise;
        }

        public function setRelatorio($relatorio){
            $this->relatorio = $relatorio;
        }

        public function setMonitor($monitor){
            $this->monitor = $monitor;
        }

        public function getId(){
            return $this->id;
        }

        public function getDataAnalise(){
            return $this->dataAnalise;
        }

        public function getRelatorio(){
            return $this->relatorio;
        }

        public function getMonitor(){
            return $this->monitor;
        }

        public function create(){
            $sql = 'INSERT INTO qualidade_ar (data_analise, relatorio_analise, id_monitor)
                    VALUES(:dataAnalise, :relatorio, :idMonitor)';
            $parametros = array(":dataAnalise"=>$this->getDataAnalise(),
                                ":relatorio"=>$this->getRelatorio(), 
                                ":idMonitor"=>$this->getMonitor()->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        public static function consultar($tipo, $info){
            $sql = "SELECT * FROM qualidade_ar";
            switch($tipo){
                case(1): $sql .= " WHERE id_ar = :info"; break;
                case(2): $sql .= " WHERE data_analise LIKE :info"; $info = "%".$info."%"; break;
                case(3): $sql .= " WHERE relatorio_analise LIKE :info"; $info = "%".$info."%"; break;
                case(4): $sql .= " WHERE id_monitor = :info"; break;
            }
            $parametros = array(":info"=>$info);
            return Database::consulta($sql, $parametros);
        }

        public function update(){
            $sql = "UPDATE qualidade_ar
                    SET data_analise = :dataAnalise, relatorio_analise = :relatorio
                    WHERE id_ar = :id";
            $parametros = array(":dataAnalise"=>$this->getDataAnalise(), 
                                ":relatorio"=>$this->getRelatorio(), 
                                ":id_ar"=>$this->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM qualidade_ar 
                    WHERE id_ar = :id_ar";
            $parametros = array(
                ":id_ar" => $this->getId()
            );
            Database::comando($sql, $parametros);
            return true;
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM qualidade_ar WHERE id_ar = :id_ar";
            $params = array(':id_ar'=>$id);
            return Database::consulta($sql, $params);
        }
    }
?>