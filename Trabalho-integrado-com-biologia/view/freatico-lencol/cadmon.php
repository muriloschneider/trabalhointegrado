<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_lencol'])) {
        $info = FreaticoLencol::consultarId($_GET['id_lencol'])[0];
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
    <link rel="stylesheet" href="../../css/pressao.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Lençol freático</title>
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
                <a href="#">Lençol Freático</a>
                <a href="../pressao-sonora/cadmon.php">Pressão sonora</a>
                <a href="../biogas/cadmon.php">Biogás</a>
                <a href="../geotecnico/cadmon.php">Geotécnico</a>
                <a href="../freatico-lencol/cadmon.php">Lençol freatico</a>

            </div>
    </div>
    </div>


    <div class="forms">
    <form action="../../php/controle/controle-freatico-lencol.php?<?php if(isset($info)){echo "acao=update&id_lencol=".$info['id_lencol']."";}?>" method="post" autocomplete="off">
            <label for="data_analise">Data da análise</label>
            <input type="date" name="data_analise" id="data_analise" value="<?php if(isset($info)){ echo $info['data_analise']; }?>"><br>

            <label for="num_amostra">Nº da amostra</label>
            <input type="number" name="num_amostra" id="num_amostra" value="<?php if(isset($info)){ echo $info['num_amostra']; }?>"><br>

            <label for="relatorio_len">Relatório do Lençol freático</label>
            <textarea name="relatorio_len" id="relatorio_len" cols="63" rows="2"><?php if(isset($info)){echo $info['relatorio_len'];}?></textarea><br>
            
            <input type="submit" value="Cadastrar">
    </div>
</body>
</html>