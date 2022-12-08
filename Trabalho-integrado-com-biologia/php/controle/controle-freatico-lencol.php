<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    try {
        if($acao == 'update') {
            //Atualizar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $lencol = new FreaticoLencol($_GET['id_lencol'], $_POST['data_analise'], $_POST['num_amostra'], $_POST['relatorio_len'], $moni);
            $lencol->update();
            header("Location: ../../view/freatico-lencol/vermon.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar
            $moni = new Monitor('','', '', '', '', '');
            $lencol = new FreaticoLencol($_GET['id_lencol'], '', '', '', $moni);
            $lencol->delete($_GET['id_lencol']);
            header("Location: ../../view/freatico-lencol/vermon.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $lencol = new FreaticoLencol($_GET['id_lencol'], $_POST['data_analise'], $_POST['num_amostra'], $_POST['relatorio_len'], $moni);
            $lencol->create();
            header("Location: ../../view/freatico-lencol/vermon.php?msg=Monitoramento criado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }