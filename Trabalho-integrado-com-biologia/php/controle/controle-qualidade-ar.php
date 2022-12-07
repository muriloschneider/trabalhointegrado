<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    try {
        if($acao == 'update') {
            //Atualizar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $qual = new QualidadeAr($_GET['id_ar'], $_POST['data_analise'], $_POST['relatorio_analise'], $moni);
            $qual->update();
            header("Location: ../../view/qualidade-ar/vermon?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar
            $moni = new Monitor('','', '', '', '', '');
            $qual = new QualidadeAr($_GET['id_ar'], '', '', $moni);
            $qual->delete();
            header("Location: ../../view/qualidade-ar/vermon?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar
            $moni = new Monitor($_GET['id_monitor'], '', '', '', '', '');
            $qual = new QualidadeAr($_GET['id_ar'], $_POST['data_analise'], $_POST['relatorio_analise'], $moni);
            $qual->create();
            header("Location: ../../view/qualidade-ar/vermon?msg=Monitoramento criado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>