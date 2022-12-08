<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../php/utils/autoload.php");
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/biogas.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Monitoramentos | Visualizar</title>
</head>
<body>
    <header>
        <div class="navbar">
        <ul>
            <li><a href="vermonAll.php">VER MONITORAMENTOS</a></li>
            <li><a href="monitor/perfil.php">INICIAL</a></li>
            <li><a href="monitoramentosAll.php">FAZER NOVO MONITORAMENTO</a></li>
        </ul>
        </div>
    </header>

    <div class="geral">
        
    <div class="menu-sup">
        <h2>Selecione o monitoramento que deseja visualizar</h2>
            <div class="itens">
                <a href="aguas-sub/vermon.php">Águas Sub.</a>
                <a href="liq-lix/vermon.php">Líquidos Lix.</a>
                <a href="qualidade-ar/vermon.php">Qualidade do ar</a>
                <a href="aguas-superficiais/vermon.php">Águas super.</a>
            </div>
            
            <div class="itens">
                <a href="pressao-sonora/vermon.php">Pressão sonora</a>
                <a href="biogas/vermon.php">Biogás</a>
                <a href="geo/vermon.php">Geotécnico</a>
                <a href="freatico-lencol/vermon.php">Lençol freatico</a>
            </div>
    </div>
    </div>
</body>
</html>