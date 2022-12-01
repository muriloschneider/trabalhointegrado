<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['usuaId']) && $_SESSION['usuaId'] != ''){
            header("Location: ../../index.php");
        }
    }
    $_SESSION['dispId'] = '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/esqueci-minha-senha.css">
    <link rel="stylesheet" href="../../css/css-geral.css"> 
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		});
	</script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="navbar_left">
                <a href="#"><a href="../index.php"></a>
            </div>
            <div class="navbar_center">
                <a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg"></a>
            </div> 
            <div class="navbar_right">
                <div class="profile">
                    <div class="icon_wrap">
                        <span class="icon"></span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
  </header>

        <div class="back"><a href="login.php"><img src="../../img/icons/backIconB.svg" width="60rem"></a></div>

        <main>
        <div class="box">
            <form action="" method="">
                <div class="form-header">
                    <h2>Recuperar senha</h2>
                </div>
                <div class="form-body">
                    <div class="input-box">
                        <div class="elemento"><label for="email"><img src="../../img/icons/emailIcon.svg" width="60rem"></label></div>
                        <div class="elemento"><input class="" type="email" id="email" name="email" placeholder="e-mail de recuperação" value="" required></div>
                    </div>
                </div>
                <div class="form-footer">
                    <button class="" type="submit" id="" name="" value="">entrar</button>
                    <a href="login.php"><button onclick="return confirm('Deseja mesmo cancelar?')" class="cancel" type="button" id="" name="" value="">cancelar</button></a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>