<?php
    include_once(__DIR__."/../utils/autoload.php");

    class AguaSubt{
        //Atributos
        private $id;
        private $numPoco;
        private $numAmostra;
        private $dataColeta;
        private $resultado;
        private $monitor;

        //Método construtor
        public function __construct($id, $numPoco, $numAmostra, $dataColeta, $resultado, Monitor $monitor){
            $this->setId($id);
            $this->setNumPoco($numPoco);
            $this->setNumAmostra($numAmostra);
            $this->setDataColeta($dataColeta);
            $this->setResultado($resultado);
            $this->setMonitor($monitor);
        }

        //Métodos setters e getters
        public function setId($id){
            $this->id = $id;
        }
        public function setNumPoco($numPoco){
            $this->numPoco = $numPoco;
        }

        public function setNumAmostra($numAmostra){
            $this->numAmostra = $numAmostra;
        }

        public function setDataColeta($dataColeta){
            $this->dataColeta = $dataColeta;
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
        
        public function getNumPoco(){
            return $this->numPoco;
        }
        
        public function getNumAmostra(){
            return $this->numAmostra;
        }
        
        public function getDataColeta(){
            return $this->dataColeta;
        }
        
        public function getResultado(){
            return $this->resultado;
        }
        
        public function getMonitor(){
            return $this->monitor;
        }

        //Métodos de criação, consulta, atualização e exclusão
        public function create(){
            $sql = "INSERT INTO aguas_sub (num_poco_moni, num_amostra, data_coleta, resultado, id_monitor)
                    VALUES(:numPoco, :numAmostra, :dataColeta, :resultado, :idMonitor)";
            $parametros = array(":numPoco"=>$this->getNumPoco(), 
                                ":numAmostra"=>$this->getNumAmostra(), 
                                ":dataColeta"=>$this->getDataColeta(),
                                ":resultado"=>$this->getResultado(), 
                                ":idMonitor"=>$this->getMonitor()->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM aguas_sub ";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE id_subt = :pesquisa"; break;
                case(2): $sql .= " WHERE num_poco_moni LIKE :pesquisa"; $pesquisa .= "%"; break;
                case(3): $sql .= " WHERE num_amostra LIKE :pesquisa"; $pesquisa .= "%"; break;
                case(4): $sql .= " WHERE data_coleta LIKE :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                case(5): $sql .= " WHERE resultado LIKE :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                case(6): $sql .= " WHERE id_monitor = :pesquisa"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= "ORDER BY data_coleta DESC";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM aguas_sub WHERE id_subt = :id_subt";
            $params = array(':id_subt'=>$id);
            return Database::consulta($sql, $params);
        }

        public function update(){
            $sql = "UPDATE aguas_sub
                    SET num_poco_moni = :numPoco, num_amostra = :numAmostra, data_coleta = :dataColeta, resultado = :resultado
                    WHERE id_subt = :id";
            $parametros = array(":numPoco"=>$this->getNumPoco(),
                                ":numAmostra"=>$this->getNumAmostra(),
                                ":dataColeta"=>$this->getDataColeta(),
                                ":resultado"=>$this->getResultado(),
                                ":id"=>$this->getId());
            Database::comando($sql, $parametros);
            return true;
        }

        public function delete(){
            $sql = "DELETE FROM aguas_sub WHERE id_subt = :id";
            $parametros = array(":id"=>$this->getId());
            Database::comando($sql, $parametros);
            return true;    
        }
    }
?>