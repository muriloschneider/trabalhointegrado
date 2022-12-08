<?php
    include_once (__DIR__."/../../php/utils/autoload.php");
    header('Content-Type: application/json');

    $var = Main::Buscar();
        if ($var) {
            echo json_encode($var);
        }else {
            echo "Nenhum registro encontrado";
        }
?>