<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_biogas'])) {
        $info = Biogas::consultarId($_GET['id_biogas'])[0];
    }
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/biogas.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Monitoramento de Biogás</title>
</head>
<body>
    <!-- <img src="" alt=""> -->
    <header>
        <div class="navbar">
        <ul>
            <li><a href="vermon.php">VER MONITORAMENTOS</a></li>
            <li><a href="../monitor/index.php">INICIAL</a></li>
            <li><a href="#">FAZER NOVO MONITORAMENTO</a></li>
        </ul>
        </div>
    </header>

    <div class="select">
        <h2>Selecione o monitoramento</h2>
        <ul class="moni">
            <li><a href="cadmon.php">Águas Sub.</a></li>
            <li><a href="../liq-lix/cadmon.php">Líquidos Lix.</a></li>
            <li><a href="../qualidade-ar/cadmon.php">Qualidade do ar</a></li>
            <li><a href="../aguas-superficiais/cadmon.php">Águas super.</a></li>
            <li><a href="../pressao-sonora/cadmon.php">Pressão sonora</a></li>
            <li><a href="../biogas/cadmon.php">Biogás</a></li>
            <li><a href="../geotecnico/cadmon.php">Geotécnico</a></li>
        </ul>
    </div>

    <div class="forms">
    <form action="../../php/controle/controle-biogas.php?<?php if(isset($info)){echo "acao=update&&id_biogas=".$info['id_biogas']."";}?>" method="post" autocomplete="off">
            <label for="data_moni">Data do monitoramento</label>
            <input type="date" name="data_moni" id="data_moni" value="<?php if(isset($info)){ echo $info['data_moni']; }?>"><br>

            <label for="relatorio">Relatório do monitoramento</label>
            <textarea name="relatorio" id="relatorio" cols="63" rows="2"><?php if(isset($info)){echo $info['relatorio'];}?></textarea><br>
            
            <input type="submit" value="Cadastrar">
    </div>

</body>
</html>