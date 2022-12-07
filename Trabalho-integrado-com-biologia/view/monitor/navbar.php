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
    <link rel="stylesheet" href="../../css/navbar.css">

    <style>
        @font-face {
            font-family: "karla";
            src: url(../font/static/Karla-SemiBold.ttf);
        }

        a {
            font-family: "karla";
        }
    </style>

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
</div>
</body>
</html>