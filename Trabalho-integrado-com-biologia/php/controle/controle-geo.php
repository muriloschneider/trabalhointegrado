<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    //try {
        if($acao == 'update') {
            //Atualizar 
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $geo = new Geotecnico ($_GET['id_geo'], $_POST['data_moni'], $_POST['nivel_recal'], $_POST['nivel_liqui'], $_POST['nivel_incli'], $_POST['num_apare'], $_POST['local_apare'], $moni);            
            $geo->update();
            header("Location: ../../view/geo/vermon.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar 
            $moni = new Monitor('','', '', '', '', '');
            $geo = new Geotecnico($_GET['id_geo'],'','','','','','',$moni);
            $geo->delete();
            header("Location: ../../view/geo/vermon.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar 
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $geo = new Geotecnico ($_GET['id_geo'], $_POST['data_moni'], $_POST['nivel_recal'], $_POST['nivel_liqui'], $_POST['nivel_incli'],  $_POST['num_apare'], $_POST['local_apare'], $moni);            
            $geo->create();
            header("Location: ../../view/geo/vermon.php?msg=Monitoramento cadastrado com sucesso!");
        }
    // } catch(Exception $e) {
    //     echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    // }
?>