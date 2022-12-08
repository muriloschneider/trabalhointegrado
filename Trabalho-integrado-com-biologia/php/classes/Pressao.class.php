<?php

include_once (__DIR__ ."/../utils/autoload.php");

    class Pressao{
        private $id;
        private $area;
        private $dataAmostra;
        private $horaMoni;
        private $numDeci;
        private $relatorio;
        private $monitor;

        

        public function __construct($id, $area, $dataAmostra, $horaMoni, $numDeci, $relatorio, Monitor $monitor) {
            $this->setId($id);
            $this->setArea($area);
            $this->setDataAmostra($dataAmostra);
            $this->setHoraMoni($horaMoni);
            $this->setNumDeci($numDeci);
            $this->setRelatorio($relatorio);
            $this->setMonitor($monitor);
        }  

        //Métodos Getters e Setters
        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getArea() {
            return $this->area;
        }

        public function setArea($area) {
            $this->area = $area;
        }

        public function getDataAmostra() {
            return $this->dataAmostra;
        }

        public function setDataAmostra($dataAmostra){
            $this->dataAmostra = $dataAmostra;
        }

        public function getHoraMoni() {
            return $this->horaMoni;
        }

        public function setHoraMoni($horaMoni) {
            $this->horaMoni = $horaMoni;
        }

        public function getNumDeci() {
            return $this->numDeci;
        }

        public function setNumDeci($numDeci){
            $this->numDeci = $numDeci;
        }

        public function getRelatorio() {
            return $this->relatorio;
        }

        public function setRelatorio($relatorio){
            $this->relatorio = $relatorio;
        }

        public function getMonitor(){
            return $this->monitor;
        }

        public function setMonitor($monitor){
            $this->monitor = $monitor;
        }


        //Método toString para exibir os dados do objeto
        public function __toString() {
            $str = "<br>[Pressão Sonora]<br>".
                    "<br>id: ".$this->getId().
                    "<br>Área de monitoramento: ".$this->getArea().
                    "<br>Data da amostra: ".$this->getDataAmostra().
                    "<br>Hora de monitoramento: ".$this->getHoraMoni().
                    "<br>Número de decibéis: ".$this->getNumDeci().
                    "<br>Relatório: ".$this->getRelatorio();
                    "<br>Id do monitor:".$this->getMonitor();
            return $str;
        }

        public function create(){
            $sql = 'INSERT INTO pressao_sonora (area_moni, data_amostra, hora_moni, num_deci, relatorio, id_monitor) 
                    VALUES (:area_moni, :data_amostra, :hora_moni, :num_deci, :relatorio, :id_monitor)';
            $parametros = array(":area_moni"=>$this->getArea(),
                                ":data_amostra"=>$this->getDataAmostra(),
                                ":hora_moni"=>$this->getHoraMoni(),
                                ":num_deci"=>$this->getNumDeci(),
                                ":relatorio"=>$this->getRelatorio(),
                                ":id_monitor"=>$this->getMonitor()->getId());
            Database::comando($sql,$parametros);
            return true;
        }

        public function update() {
                $sql = "UPDATE pressao_sonora SET area_moni = :area_moni, data_amostra = :data_amostra, hora_moni = :hora_moni, num_deci = :num_deci, relatorio = :relatorio WHERE id_pressao = :id_pressao";
                $params = array(":area_moni" => $this->getArea(),
                                ":data_amostra" => $this->getDataAmostra(),
                                ":hora_moni" => $this->getHoraMoni(),
                                ":num_deci" => $this->getNumDeci(),
                                ":relatorio" => $this->getRelatorio(),
                                ":id_pressao" => $this->getId());
                Database::comando($sql, $params);
                return true;
        }

        public function delete(){
            $sql = "DELETE FROM pressao_sonora WHERE id_pressao = :id_pressao";
            $params = array(
                ":id_pressao" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
        }

       
        //Métodos de consulta
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM pressao_sonora";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE id_pressao like :pesquisa"; break;
                    case(2): $sql .= " WHERE area_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE data_amostra like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE hora_moni like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE relatorio like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY id_pressao";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM pressao_sonora WHERE id_pressao = :id_pressao";
            $params = array(':id_pressao'=>$id);
            return Database::consulta($sql, $params);
        }
    } 
?>