<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_pressao'])) {
        $info = Pressao::consultarId($_GET['id_pressao'])[0];
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
    <link rel="stylesheet" href="../../css/agSub.css">
    <title>Pressão sonora</title>
</head>
<body>
    <!-- <img src="" alt=""> -->

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
    <form action="../../php/controle/controle-pressao.php?<?php if(isset($info)){echo "acao=update&&id_pressao=".$info['id_pressao']."";}?>" method="post" autocomplete="off">
            <label for="area_moni">Área monitoramento</label>
            <input type="text" name="area_moni" id="area_moni" value="<?php if(isset($info)){ echo $info['area_moni']; }?>"><br>

            <label for="data_amostra">Nº da amostra</label>
            <input type="date" name="data_amostra" id="data_amostra" value="<?php if(isset($info)){ echo $info['data_amostra']; }?>"><br>

            <label for="hora_moni">Data da coleta</label>
            <input type="time" name="hora_moni" id="hora_moni" value="<?php if(isset($info)){ echo $info['hora_moni']; }?>"><br>

            <label for="num_deci">Número de Decibéis </label>
            <input type="number" name="num_deci" id="num_deci" value="<?php if(isset($info)){ echo $info['num_deci']; }?>"><br>

            <label for="relatorio">Relatório da amostra</label>
            <textarea name="relatorio" id="relatorio" cols="63" rows="2"><?php if(isset($info)){echo $info['relatorio'];}?></textarea><br>
            
            <input type="submit" value="Cadastrar">
    </div>

    <div class="nav">
        <ul class="menu">
            <li><a href="vermon.php">Ver monitoramento</a></li>
            <li><a href="../monitor/index.php">Inicial</a></li>
            <li><button name="" id="" type="submit" value="Cadastrar">Fazer novo monitoramento</button></li>
        </form>
        </ul>
    </div>
</body>
</html>