<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            // header("Location: view/monitor/login-cadastro.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
<header>
    <div class="navbar">
      <ul>
        <li><a href="#">INICIAL</a></li>
        <li><a href="#">MONITORAMENTO</a></li>
        <li><a href="#">LOGIN</a></li>
        <li><a href="#">SOBRE</a></li>
      </ul>
    </div>
  </header> 
    <!-- <main class="body">
        <section>
            <div class="img-button"><a href="view/dispositivo/configurar-dispositivo.php"><button class="botao"><img src="img/icons/addIcon.svg"></button></a></div>
            <div class="button"><a href="view/dispositivo/configurar-dispositivo.php"><button class="" type="submit" id="" name="" value="">Adicionar dispositivo</button></a></div>
        </section>
        <section>
            <div class="img-button"><a href="view/dispositivo/controle-de-dispositivos.php"><button class="botao"><img src="img/icons/confIcon.svg"></button></a></div>
            <div class="button"><a href="view/dispositivo/controle-de-dispositivos.php"><button class="" type="submit" id="" name="" value="">Visualizar dispositivo</button></a></div>
        </section>
        <section>
            <div class="img-button"><a href="view/usuario/perfil.php"><button class="botao"><img src="img/icons/userIcon.svg"></button></a></div>
            <div class="button"><a href="view/usuario/perfil.php"><button class="" type="submit" id="" name="" value="">Perfil do usuário</button></a></div>
        </section>
    </main> -->
</div>
</body>
</html>