<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");
    
    if(isset($_GET['id_liqui'])) {
        $info = LiquidoLix::consultarId($_GET['id_liqui'])[0];
    }
    
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquidos Lixiviados</title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/liq.css">
</head>
<header>
    <div class="navbar">
      <ul>
        <li><a href="../vermonAll.php">VER MONITORAMENTOS</a></li>
        <li><a href="../monitor/perfil.php">INÍCIO</a></li>
        <li><a href="../monitoramentosAll.php">FAZER NOVO MONITORAMENTO</a></li>
      </ul>
    </div>
  </header>

  <div class="geral">
        
        <div class="menu-sup">
            <h2>Selecione o monitoramento</h2>
                <div class="itens">
                    <a href="cadmon.php">Águas Sub.</a>
                    <a href="#">Líquidos Lix.</a>
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
      <form action="../../php/controle/controle-liq-lix.php?<?php if(isset($info)){echo "acao=update&id_liqui=".$info['id_liqui']."";}?>" method="post">
          <label for="">Monitoramento do Chorume</label>
          <input type="text" name="moni_chorume" id="moni_chorume" value="<?php if(isset($info)){ echo $info['moni_chorume']; }?>">
          <br>
          <label for="">Quantidade de Chorume</label>
          <input type="text" name="quanti_chorume" id="quanti_chorume" value="<?php if(isset($info)){ echo $info['quanti_chorume']; }?>">
          <br>
          <label for="">Quantidade de Água</label>
          <input type="text" name="quanti_agua" id="quanti_agua" value="<?php if(isset($info)){ echo $info['quanti_agua']; }?>">
          <input type="submit" value="Cadastrar">
      </form>
    </div>

    
</body>
</html>