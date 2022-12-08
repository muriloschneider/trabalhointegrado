<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    try {
        if($acao == 'update') {
            //Atualizar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $liq = new LiquidoLix($_GET['id_liqui'], $_POST['moni_chorume'], $_POST['quanti_chorume'], $_POST['quanti_agua'], $moni);
            $liq->update();
            header("Location: ../../view/liq-lix/vermon.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar
            $moni = new Monitor('','', '', '', '', '');
            $liq = new LiquidoLix($_GET['id_liqui'], $_POST['moni_chorume'], $_POST['quanti_chorume'], $_POST['quanti_agua'], $moni);
            $liq->delete($id);
            header("Location: ../../view/liq-lix/vermon.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $liq = new LiquidoLix($_GET['id_liqui'], $_POST['moni_chorume'], $_POST['quanti_chorume'], $_POST['quanti_agua'], $moni);
            $liq->create();
            header("Location: ../../view/liq-lix/vermon.php?msg=Monitoramento criado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>