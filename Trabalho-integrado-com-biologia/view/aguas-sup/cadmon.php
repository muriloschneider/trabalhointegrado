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
        $info = AguaSuper::consultarId($_GET['id_super'])[0];
    }
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/agSup.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Monitoramento de Águas Superficiais</title>
</head>
<body>
    <header>
        <div class="navbar">
        <ul>
            <li><a href="vermon.php">VER MONITORAMENTOS</a></li>
            <li><a href="../monitor/index.php">INICIAL</a></li>
            <li><a href="#">FAZER NOVO MONITORAMENTO</a></li>
        </ul>
        </div>
    </header>

    <div class="forms">
    <form action="../../php/controle/controle-agua-sup.php?<?php if(isset($info)){echo "acao=update&&id_super=".$info['id_super']."";}?>" method="post" autocomplete="off">
            <label for="data_coleta">Data do monitoramento</label>
            <input type="date" name="data_coleta" id="data_coleta" value="<?php if(isset($info)){ echo $info['data_moni']; }?>"><br>

            <label for="area_coleta">Área da Coleta</label>
            <textarea name="area_coleta" id="area_coleta" cols="63" rows="2"><?php if(isset($info)){echo $info['relatorio'];}?></textarea><br>
            
            <label for="num_amostra">Data do monitoramento</label>
            <input type="number" name="num_amostra" id="num_amostra" value="<?php if(isset($info)){ echo $info['data_moni']; }?>"><br>

            <label for="resultado">Resultado</label>
            <textarea name="resultado" id="resultado" cols="63" rows="2"><?php if(isset($info)){echo $info['relatorio'];}?></textarea><br>
            

            <input type="submit" value="Cadastrar">
    </div>

</body>
</html>