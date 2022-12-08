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
    <title>[NOME DO SITE]</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
</head>
<body>
    <h4>Nome do site</h4>
    <form action="../../php/controle/controle-qualidade-ar.php?<?php if(isset($info)){echo "acao=update&&id_ar=".$info['id_ar']."";}?>" method="post" autocomplete="off">
        <input type="date" id="data_analise" name="data_analise" value="<?php if(isset($info)){ echo $info['data_analise']; }?>">
        <label>Data da análise</label>

        <input type="text" id="relatorio_analise" name="relatorio_analise" value="<?php if(isset($info)){ echo $info['relatorio_analise'];}?>">
        <label>Relatório da análise</label>
                
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>