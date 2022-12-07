<?php
    $email = isset($_POST['login_moni']) ? $_POST['login_moni'] : "";
    $senha = isset($_POST['senha_moni']) ? $_POST['senha_moni'] : "";
    
    include_once (__DIR__."/../utils/autoload.php");
    try {
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(Monitor::autenticar($email, $senha)) {
            header("Location: ../../view/monitor/perfil.php");
        } else if(isset($_POST['login_moni']) && isset($_POST['senha_moni'])) {
            header("Location: ../../view/monitor/login-cadastro.php?msg=invalido");
        } else {
            header("Location: ../../view/monitor/login-cadastro.php");
        }
    } catch(Exception $e) {
        echo "<h1>Erro ao logar com as informações.</h1><br> Erro:".$e->getMessage();
    }
?>