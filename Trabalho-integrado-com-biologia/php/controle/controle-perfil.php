<?php
    include_once (__DIR__."/../utils/autoload.php");
    session_start();

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    
    try {
        if($acao == 'delete') {
            //Excluir Monitor
            $moni = new Monitor($_SESSION['id_moni'], '', '', '', '', '');
            $moni->delete();
            header("Location: ../../view/monitor/login-cadastro.php");
        } else if($acao == 'update') {
            //Atualizar 
            $moni = new Monitor($_SESSION['id_moni'], $_POST['nome_moni'], $_POST['cpf_moni'], $_POST['login_moni'], $_POST['senha_moni'], $_POST['contato_moni']);
            $moni->update();
            header("Location: ../../view/monitor/perfil.php?msg=Monitoramento editado com sucesso!");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
    
    
    
    
?>