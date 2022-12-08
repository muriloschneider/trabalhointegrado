<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['id_moni']) && $_SESSION['id_moni'] != '') {
            header("Location:login-cadastro.php");
        }
    }

    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do lixo ao luxo</title>
    <link rel="stylesheet" href="../../css/login-cadastro.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="../../php/controle/controle-login.php" method="post" class="sign-in-form">
                        <div class="logo">
                            <h4>Do lixo ao luxo</h4>
                        </div>

                        <div class="heading">
                            <h2>Bem-vindo!</h2>
                            <h6>Ainda não tem conta?</h6>
                            <a href="#" class="toggle">Cadastre-se</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input class="input-field" type="text" id="login-moni" name="login_moni" value="" required>
                                <label>Login</label>
                            </div>    

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="senha-moni" name="senha_moni" value="" required>
                                <label>Senha</label>
                            </div> 
                            
                            <input type="submit" value="Entrar" class="sign-btn">
                        </div>
                    </form>

                    <form action="../../php/controle/controle-cadastro.php" method="post" autocomplete="off" class="sign-up-form">
                        <div class="heading">
                            <h2>Cadastre-se</h2>
                            <h6>Já possui uma conta?</h6>
                            <a href="#" class="toggle">Faça seu login</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input class="input-field" type="text" id="nome_moni" name="nome_moni" value="" required>
                                <label>Nome completo</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="text" id="cpf_moni" name="cpf_moni" value="" required>
                                <label>CPF</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="email" id="contato_moni" name="contato_moni" value="" required>
                                <label>Email de contato</label>
                            </div>
                            
                            <div class="input-wrap">
                                <input class="input-field" type="text" id="login_moni" name="login_moni" value="" required>
                                <label>Nome de usuário (Login)</label>
                            </div>

                            <div class="input-wrap">
                                <input class="input-field" type="password" id="senha_moni" name="senha_moni" value="" required>
                                <label>Senha</label>
                            </div>
                            
                            <input type="submit" value="Cadastrar" class="sign-btn">
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="imager-wrapper">
                        <img src="../../img/jpg/slider.jpg" >
                    </div>
                </div>
            </div>
        </main>

        <script src="../../js/login-cadastro.js"></script>

</body>
</html>