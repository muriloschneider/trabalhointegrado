<?php
    include_once (__DIR__."/../utils/autoload.php");

    try {
        //Cadastrar usuário
        $moni = new Monitor('', $_POST['nome_moni'], $_POST['cpf_moni'], $_POST['login_moni'], $_POST['senha_moni'], $_POST['contato_moni']);

        if($moni->create()){
            header("Location: ../../view/monitor/login-cadastro.php?msg=sucesso");
        } else {
            header("Location: ../../view/usuario/login-cadastro.php?msg=falha");            
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao cadastrar as informações.</h1><br> Erro:".$e->getMessage();
    }
?>