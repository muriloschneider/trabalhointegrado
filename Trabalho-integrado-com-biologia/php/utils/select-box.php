<?php 
    function selectBox($tabela, $rows, $id=null) {
        $str = "<option value='0'>Selecione</option>";
        $sql = "SELECT * FROM ".$tabela;
        $dados = Database::consulta($sql);
        foreach($dados as $linha) {
            if($id == $linha[$rows[0]])
                $str .= "<option selected value='".$linha[$rows[0]]."'>".$linha[$rows[1]]."</option>";
            else
                $str .= "<option value='".$linha[$rows[0]]."'>".$linha[$rows[1]]."</option>";
        }
        return $str;
    }
?>