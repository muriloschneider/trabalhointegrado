<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");

    try {
        if($acao == 'update') {
            //Atualizar relatório
            $moni = new Monitor($_GET['id_monitor'], '', '', '', '', '');
            $pressao = new Pressao ($_GET['id_pressao'], $_GET['area_moni'], $_GET['data_amostra'], $_GET['hora_moni'], $_GET['num_deci'], $_GET['relatorio'], $moni);
            $pressao->update();
            header("Location: ../../view/pressao-sonora/pressao-monitora.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar relatório
            $moni = new Monitor('','', '', '', '', '');
            $pressao = new Pressao($_GET['id_pressao'],'','','','','',$moni);
            $pressao->delete();
            header("Location: ../../view/pressao-sonora/pressao-monitora.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar relatório
            $moni = new Monitor($_GET['id_monitor'], '', '', '', '', '');
            $pressao = new Pressao('', $_GET['area_moni'], $_GET['data_amostra'], $_GET['hora_moni'], $_GET['num_deci'], $_GET['relatorio'], $moni);
            $pressao->create();
            header("Location: ../../view/pre/visualizar-consulta.php?msg=Relatório cadastrado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>