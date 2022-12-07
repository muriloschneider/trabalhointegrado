<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: monitor/login-cadastro.php");
        }
    }

    $data = QualidadeAr::consultarId($_GET['id_ar'])[0];
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[NOME DO SITE]</title>
    <link rel="stylesheet" href="../../css/login-cadastro.css">
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <main>
        <h4>Nome do site</h4>
        <form action="../../php/controle/controle-qualidade-ar.php?<?php if(isset($info)){echo "acao=update&&id_ar=".$info['id_ar'];}?>" method="post" autocomplete="off" class="sign-up-form">
            <input class="input-field" type="date" id="data_analise" name="data_analise" value="<?php if(!isset($_GET['update'])) {echo $info['data_analise'];}?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?>
            <label>Data da análise</label>

            <input class="input-field" type="text" id="relatorio_analise" name="relatorio_analise" value="<?php if(!isset($_GET['update'])) {echo $info['relatorio_analise'];}?>" <?php if(!isset($_GET['update'])) {echo "disabled";}?>
            <label>Relatório da análise</label>
                    
            <input type="submit" value="Cadastrar" class="sign-btn">
        </form>
    </main>
</body>
</html>