<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_geo'])) {
        $info = Geotecnico::consultarId($_GET['id_geo'])[0];
    }
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/geoCad.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Monitoramento de Geotécnico</title>
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
                <a href="../aguas-sub/cadmon.php">Águas Sub.</a>
                <a href="../liq-lix/cadmon.php">Líquidos Lix.</a>
                <a href="../qualidade-ar/cadmon.php">Qualidade do ar</a>
                <a href="../aguas-superficiais/cadmon.php">Águas super.</a>
            </div>
            <div class="itens">
                <a href="../pressao-sonora/cadmon.php">Pressão sonora</a>
                <a href="../biogas/cadmon.php">Biogás</a>
                <a href="../geo/cadmon.php">Geotécnico</a>
                <a href="../freatico-lencol/cadmon.php">Lençol freatico</a>
            </div>
            </ul>
        </div>
    </div>

    <div class="forms">
    <form action="../../php/controle/controle-geo.php?<?php if(isset($info)){echo "acao=update&&id_geo=".$info['id_geo']."";}?>" method="post" autocomplete="off">
            <label for="data_moni">Data do monitoramento</label>
            <input type="date" name="data_moni" id="data_moni" value="<?php if(isset($info)){ echo $info['data_moni_geo']; }?>"><br>

            <label for="nivel_recal">Nivel de recalque</label>
            <input type="text" name="nivel_recal" id="nivel_recal" value="<?php if(isset($info)){ echo $info['nivel_recal']; }?>"><br>

            <label for="nivel_liqui">Nivel de liquidos</label>
            <input type="text" name="nivel_liqui" id="nivel_liqui" value="<?php if(isset($info)){ echo $info['nivel_liqui']; }?>"><br>

            <label for="nivel_incli">Nivel de inclinação</label>
            <input type="text" name="nivel_incli" id="nivel_incli" value="<?php if(isset($info)){ echo $info['nivel_incli']; }?>"><br>
            
            <label for="num_apare">Número aparelho</label>
            <input type="number" name="num_apare" id="num_apare" value="<?php if(isset($info)){ echo $info['num_apare']; }?>"><br>

            <label for="local_apare">Local aparelho</label>
            <textarea name="local_apare" id="local_apare" cols="63" rows="2"><?php if(isset($info)){echo $info['local_apare'];}?></textarea><br><br>
            
            <input type="submit" value="Cadastrar">
    </div>

</body>
</html>