<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../../php/utils/autoload.php");

    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/qualArVer.css">   
    <link rel="stylesheet" href="../../css/navbar.css">   
    <title>Líquidos Lixiviados</title>
</head>


<header>
    <div class="navbar">
      <ul>
        <li><a href="../vermonAll.php">VER MONITORAMENTOS</a></li>
        <li><a href="../monitor/perfil.php">INICIAL</a></li>
        <li><a href="../monitoramentosAll.php">FAZER NOVO MONITORAMENTO</a></li>
      </ul>
    </div>
  </header>
    
<main>
    <div class="coluna1">
        <div class="linha">
            <div class="header">
                <h2>Selecione o monitoramento</h2>
            </div>
            <div class="itens">
                <a href="../aguas-sub/vermon.php">Águas subt.</a>
                <a href="../aguas-superficiais/vermon.php">Águas super.</a>
                <a href="../geo/vermon.php">Geotécnico</a>
                <a href="#">Líquidos Lix</a>
                <a href="../pressao-sonora/vermon.php">Pressão sonora</a>
                <a href="../biogas/vermon.php">Biogás</a>
                <a href="../qualidade-ar/vermon.php">Qualidade do Ar</a>
                <a href="../freatico-lencol/vermon.php">Lençol freatico</a>

            </div>
        </div>

        <div class="linha2">
            <div class="header">
                <h2 class="col2">Outros monitoramentos</h2>
            </div>

            <div class="itens2">
                <table>
                    <?php
                        $consulta = LiquidoLix::consultar($busca, $procurar);
                        foreach($consulta as $key => $line) {
                    ?>
                <tr>
                <th><a class="link" href="vermon.php?id_liqui=<?php echo $line['id_liqui']; ?>"><?php echo $line['id_liqui'];?></a></th>
                <td><a class="link" href="vermon.php?id_liqui=<?php echo $line['id_liqui']; ?>"><?php echo $line['moni_chorume'];?></td>
                <td><a class="link" href="vermon.php?id_liqui=<?php echo $line['id_liqui']; ?>"><?php echo $line['quanti_chorume'];?></td>
                <td><a class="link" href="vermon.php?id_liqui=<?php echo $line['id_liqui']; ?>"><?php echo $line['quanti_agua'];?></td>
                <td><a  href="vermon.php?id_liqui=<?php echo $line['id_liqui']; ?>"><img src="../../img/icons/view.svg" alt="" style="height: 30px;"></a></td>
                <td><a class="table" href="cadmon.php?id_liqui=<?php echo $line['id_liqui'];?>&acao=update"><img src="../../img/icons/editar.svg" height="30px"></a></td>
                <td><a class="table" onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-liq-lix.php?id_liqui=<?php echo $line['id_liqui'];?>&acao=delete"><img src="../../img/icons/delete.svg" height="30px"></a></td>
            </tr>
        
            <?php } ?>
                </table>
            </div>


            

        </div>
    </div>




    <div class="coluna2">
        <div class="header">
            <h2>INFO MONITORAMENTO</h2>
        </div>
        <div class="itens3">
            <?php
                if(isset($_GET['id_liqui'])){
                    $info = LiquidoLix::consultarId($_GET['id_liqui'])[0];            
                        echo "<p>Informações da última alteração feita:<p>";
                        echo "<p>Id do monitoramento: ".$info['id_liqui']."</p>";
                        echo "<p>Monitoramento do Chorume: ".$info['moni_chorume']."</p>";
                        echo "<p>Quantidade de Chorume: ".$info['quanti_chorume']."</p>";
                        echo "<p>Quantidade de Água: ".$info['quanti_agua']."</p>";
                    }
                    ?>
        </div>

                    
    </div>
    </div>

</main>

</body>
</html>