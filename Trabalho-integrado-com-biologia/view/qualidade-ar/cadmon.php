<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_ar'])) {
        $info = QualidadeAr::consultarId($_GET['id_ar'])[0];
    }
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qualidade do Ar</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/qualAr.css">
    <link rel="stylesheet" href="../../css/navbar.css">

    
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


    
<div class="geral">

    <div class="forms">
        <form action="../../php/controle/controle-qualidade-ar.php?<?php if(isset($info)){echo "acao=update&&id_ar=".$info['id_ar']."";}?>" method="post" autocomplete="off">
            <label for="data_analise">Data da análise</label>
            <input type="date" id="data_analise" name="data_analise" value="<?php if(isset($info)){ echo $info['data_analise']; }?>"><br>
            
            <label for="relatorio_analise">Relatório da análise</label>
            <textarea id="relatorio_analise" name="relatorio_analise" cols="63" rows="2"><?php if(isset($info)){echo $info['relatorio_analise'];}?></textarea>
            <br>
            <!-- <button type="button">Cadastrar</button> -->
            <input class="button" type="submit" value="Cadastrar">
        </form>
    </div>
</div>
    
<!-- 
    <div class="nav">
        <ul class="menu">
            <li><a href="vermon.php">Ver monitoramento</a></li>
            <li><a href="#">Inicial</a></li>
            <li><button name="" id="" type="submit" value="">Fazer novo monitoramento</button></li>
        </form>
        </ul>
    </div> -->

    <!-- <h4>Nome do site</h4>
    <form action="../../php/controle/controle-qualidade-ar.php?<?php if(isset($info)){echo "acao=update&&id_ar=".$info['id_ar']."";}?>" method="post" autocomplete="off">
        <input type="date" id="data_analise" name="data_analise" value="<?php if(isset($info)){ echo $info['data_analise']; }?>">
        <label>Data da análise</label>

        <input type="text" id="relatorio_analise" name="relatorio_analise" value="<?php if(isset($info)){ echo $info['relatorio_analise'];}?>">
        <label>Relatório da análise</label>
                
        <input type="submit" value="Cadastrar">
    </form> -->
</body>
</html>