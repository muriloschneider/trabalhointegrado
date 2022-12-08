<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_super'])) {
        $info = AguaSuper::consultarId($_GET['id_super'])[0];
    }
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/agSup.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Águas Superficiais</title>
</head>
<body>
<header>
    <div class="navbar">
        <ul>
            <li><a href="../vermonAll.php">VER MONITORAMENTOS</a></li>
            <li><a href="../monitor/perfil.php">INICIAL</a></li>
            <li><a href="../monitoramentosAll.php">FAZER NOVO MONITORAMENTO</a></li>
        </ul>
        </div>
    </header>

    <div class="geral">

    <div class="menu-sup">
        <h2>Selecione o monitoramento</h2>
            <div class="itens">
                <a href="../aguas-sub/vermon.php">Águas Sub.</a>
                <a href="../liq-lix/cadmon.php">Líquidos Lix.</a>
                <a href="../qualidade-ar/cadmon.php">Qualidade do ar</a>
                <a href="../aguas-superficiais/cadmon.php">Águas super.</a>
            </div>

            <div class="itens">
                <a href="../pressao-sonora/cadmon.php">Pressão sonora</a>
                <a href="../biogas/cadmon.php">Biogás</a>
                <a href="../geotecnico/cadmon.php">Geotécnico</a>
                <a href="../freatico-lencol/cadmon.php">Lençol freatico</a>

            </div>
    </div>
    </div>


    <div class="forms">
    <form action="../../php/controle/controle-agua-sup.php?<?php if(isset($info)){echo "acao=update&&id_super=".$info['id_super']."";}?>" method="post" autocomplete="off">
            <label for="data_coleta">Data da coleta</label>
            <input type="date" name="data_coleta" id="data_coleta" value="<?php if(isset($info)){ echo $info['data_coleta']; }?>"><br>

            <label for="area_coleta">Área da coleta</label>
            <input type="text" name="area_coleta" id="area_coleta" value="<?php if(isset($info)){ echo $info['area_coleta']; }?>"><br>

            <label for="num_amostra">Número da amostra</label>
            <input type="number" name="num_amostra" id="num_amostra" value="<?php if(isset($info)){ echo $info['num_amostra']; }?>"><br>

            <label for="resultado">Resultado da amostra</label>
            <textarea name="resultado" id="resultado" cols="63" rows="2"><?php if(isset($info)){echo $info['resultado'];}?></textarea><br>
            
            <input type="submit" value="Cadastrar">
    </div>
    
</body>
</html>