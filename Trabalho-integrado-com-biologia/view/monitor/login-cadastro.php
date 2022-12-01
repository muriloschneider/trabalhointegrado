<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['id_moni']) && $_SESSION['id_moni'] != '') {
            header("Location: ../../index.php");
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
    <title>[NOME DO SITE]</title>
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
                            <h4>Nome do site</h4>
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
                        <!-- <img src="../../img/png/login.png"> -->
                    </div>
                </div>
            </div>
        </main>

        <script src="../../js/login-cadastro.js"></script>

        <!-- <form action="../../php/controle/controle-login.php" method="post">
            <h2>Login</h2>
                <label for="login_moni">Login</label>
                <input class="" type="" id="login_moni" name="login_moni" placeholder="login" value="" required>
                <label for="senha_moni">Senha</label>
                <input class="" type="password" id="senha_moni" name="senha_moni" placeholder="senha" value="" minlength="8" required>
                
                <button class="" type="submit" id="" name="" value="">entrar</button>
                <a href="cadastro.php">Ainda não tenho cadastro</a>
            </div>
        </form> -->

    <!--     
        <form action="../../php/controle/controle-cadastro.php" method="post">
            <h2>Cadastro</h2>
                <label for="nome_moni">Nome</label>
                <input class="" type="" id="nome_moni" name="nome_moni" placeholder="login" value="" required>
                <label for="cpf_moni">CPF</label>
                <input class="" type="password" id="cpf_moni" name="cpf_moni" placeholder="senha" value="" minlength="8" required>
                <label for="login_moni">Login</label>
                <input class="" type="password" id="login_moni" name="login_moni" placeholder="senha" value="" minlength="8" required>
                <label for="senha_moni">Senha</label>
                <input class="" type="password" id="senha_moni" name="senha_moni" placeholder="senha" value="" minlength="8" required>
                <label for="contato_moni">Contato</label>
                <input class="" type="password" id="contato_moni" name="contato_moni" placeholder="senha" value="" minlength="8" required>

                <button class="" type="submit" id="" name="" value="">entrar</button>
                <a href="cadastro.php">Ainda não tenho cadastro</a>
            </div>
        </form> -->
</body>
</html>