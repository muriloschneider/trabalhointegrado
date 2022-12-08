<?php
    include_once(__DIR__."/../utils/autoload.php");

    class Main{

        public static function Buscar()
        {
            $sql = "select t.dt, sum(t.quant) as total 
            from (select data_coleta as dt, count(*) as quant
                    from aguas_sup ap
                   union
                  select data_coleta as dt, count(*) as quant
                    from aguas_sub ab
                    union
                  select data_moni as dt, count(*) as quant
                    from biogas ab
                    union
                  select data_analise as dt, count(*) as quant
                    from lencol_freatico ab
                    union
                  select data_amostra as dt, count(*) as quant
                    from pressao_sonora ab
                    union
                  select data_analise as dt, count(*) as quant
                    from qualidade_ar ab) t
          group by t.dt;";
            $params = array();
            return Database::Listar($sql,$params);
        }

    }
    
?>