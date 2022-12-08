<?php
    include_once(__DIR__."/../utils/autoload.php");

    class FreaticoLencol{
        // Atributos    
        private $id;
        private $data_analise;
        private $num_amostra;
        private $relatorio_len;
        private $monitor;

        //Método construtor
        public function __construct($id, $data_analise, $num_amostra, $relatorio_len, Monitor $monitor){
            $this->setId($id);
            $this->setdata_analise($data_analise);
            $this->setnum_amostra($num_amostra);
            $this->setrelatorio_len($relatorio_len);
            $this->setMonitor($monitor);
        }

        //Métodos setters e getters
        
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getdata_analise(){
            return $this->data_analise;
        }

        public function setdata_analise($data_analise){
            $this->data_analise = $data_analise;
        }

        public function getnum_amostra(){
            return $this->num_amostra;
        }

        public function setnum_amostra($num_amostra){
            $this->num_amostra = $num_amostra;
        }
        
        public function getrelatorio_len(){
            return $this->relatorio_len;
        }

        public function setrelatorio_len($relatorio_len){
            $this->relatorio_len = $relatorio_len;
        }
        
        public function getMonitor(){
            return $this->monitor;
        }

        public function setMonitor($monitor){
            $this->monitor = $monitor;
        }

        //Métodos de criação, consulta, atualização e deleção
        public function create(){
            $sql = "INSERT INTO lencol_freatico (data_analise, num_amostra, relatorio_len, id_monitor)
                    VALUES(:data_analise, :num_amostra, :relatorio_len, :id_monitor)";
            $parametros = array(":data_analise"=>$this->getdata_analise(), 
                                ":num_amostra"=>$this->getnum_amostra(),
                                ":relatorio_len"=>$this->getrelatorio_len(), 
                                ":id_monitor"=>$this->getMonitor()->getId());
            return Database::comando($sql, $parametros);
        }

        public function update(){
            $sql = "UPDATE lencol_freatico
                    SET data_analise = :data_analise, num_amostra = :num_amostra, relatorio_len = :relatorio_len
                    WHERE id_lencol = :id_lencol";
            $parametros = array(":data_analise"=>$this->getdata_analise(),
                                ":num_amostra"=>$this->getnum_amostra(),
                                ":relatorio_len"=>$this->getrelatorio_len(),
                                ":id_lencol"=>$this->getId());
            return Database::comando($sql, $parametros);
        }

        public function delete(){
            $sql = "DELETE FROM lencol_freatico WHERE id_lencol = :id_lencol";
            $params = array(
                ":id_lencol" => $this->getId()
            );
            Database::comando($sql, $params);
            return true;
        }
        
        public static function consultar($busca = 0, $pesquisa = ""){
            $sql = "SELECT * FROM lencol_freatico";
            if ($busca > 0) {
                switch($busca){
                    case(1): $sql .= " WHERE id_lencol like :pesquisa"; break;
                    case(2): $sql .= " WHERE data_analise like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(3): $sql .= " WHERE num_amostra like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(4): $sql .= " WHERE relatorio_len like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                    case(5): $sql .= " WHERE id_monitor like :pesquisa"; $pesquisa = "%".$pesquisa."%"; break;
                }
                $params = array(':pesquisa'=>$pesquisa);
            } else {
                $sql .= " ORDER BY id_lencol";
                $params = array();
            }
            return Database::consulta($sql, $params);
        }

        public static function consultarId($id){
            $sql = "SELECT * FROM lencol_freatico WHERE id_lencol = :id_lencol";
            $params = array(':id_lencol'=>$id);
            return Database::consulta($sql, $params);
        }
    }
?>