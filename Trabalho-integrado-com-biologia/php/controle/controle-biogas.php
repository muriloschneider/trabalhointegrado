<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    try {
        if($acao == 'update') {
            //Atualizar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $qual = new Biogas($_GET['id_biogas'], $_POST['data_moni'], $_POST['relatorio'], $moni);
            $qual->update();
            header("Location: ../../view/biogas/vermon.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar
            $moni = new Monitor('','', '', '', '', '');
            $qual = new Biogas($_GET['id_biogas'], '', '', $moni);
            $qual->delete();
            header("Location: ../../view/biogas/vermon.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $qual = new Biogas($_GET['id_biogas'], $_POST['data_moni'], $_POST['relatorio'], $moni);
            $qual->create();
            header("Location: ../../view/biogas/vermon.php?msg=Monitoramento criado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>