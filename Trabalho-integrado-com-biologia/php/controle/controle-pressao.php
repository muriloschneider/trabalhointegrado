<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    try {
        if($acao == 'update') {
            //Atualizar 
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $pressao = new Pressao ($_GET['id_pressao'], $_POST['area_moni'], $_POST['data_amostra'], $_POST['hora_moni'], $_POST['num_deci'], $_POST['relatorio'], $moni);            
            $pressao->update();
            header("Location: ../../view/pressao-sonora/vermon.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar 
            $moni = new Monitor('','', '', '', '', '');
            $pressao = new Pressao($_GET['id_pressao'],'','','','','',$moni);
            $pressao->delete();
            header("Location: ../../view/pressao-sonora/vermon.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar 
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $pressao = new Pressao($_GET['id_pressao'], $_POST['area_moni'], $_POST['data_amostra'], $_POST['hora_moni'], $_POST['num_deci'], $_POST['relatorio'], $moni);
            $pressao->create();
            header("Location: ../../view/pressao-sonora/vermon.php?msg=Monitoramento cadastrado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>