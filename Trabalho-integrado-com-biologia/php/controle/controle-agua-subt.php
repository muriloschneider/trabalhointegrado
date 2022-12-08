<?php
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    try {
        if($acao == 'update') {
            //Atualizar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $agua = new AguaSubt($_GET['id_subt'], $_POST['num_poco_moni'], $_POST['num_amostra'], $_POST['data_coleta'], $_POST['resultado'], $moni);
            $agua->update();
            header("Location: ../../view/aguas-sub/vermon.php?msg=Monitoramento editado com sucesso!");
        } else if($acao == 'delete') {
            //Deletar
            $moni = new Monitor('','', '', '', '', '');
            $agua = new AguaSubt($_GET['id_subt'], '', '', '', '', $moni);
            $agua->delete();
            header("Location: ../../view/aguas-sub/vermon.php?msg=Monitoramento excluído com sucesso!");
        } else {
            //Gerar
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $agua = new AguaSubt($_GET['id_subt'], $_POST['num_poco_moni'], $_POST['num_amostra'], $_POST['data_coleta'], $_POST['resultado'], $moni);
            $agua->create();
            header("Location: ../../view/aguas-sub/vermon.php?msg=Monitoramento criado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao modificar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>