<?php
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    session_start();
    if (!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == '') {
        header("Location: ../monitor/login-cadastro.php");
    }
}

include_once(__DIR__ . "/../../php/utils/autoload.php");

$busca = isset($_POST["busca"]) ? $_POST["busca"] : "0";
$procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/biogasVer.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <title>Monitoramento do Biogás</title>
</head>

<body>


<header>
    <div class="navbar">
      <ul>
        <li><a href="#">VER MONITORAMENTOS</a></li>
        <li><a href="index.php">INICIAL</a></li>
        <li><a href="#">FAZER NOVO MONITORAMENTO</a></li>
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
                <a href="../liq-lix/vermon.php">Líquidos Lix</a>
                <a href="../pressao-sonora/vermon.php">Pressão sonora</a>
                <a href="../biogas/vermon.php">Biogás</a>
                <a href="../qualidade-ar/vermon.php">Qualidade do Ar</a>

            </div>
        </div>

        <div class="linha2">
            <div class="header">
                <h2 class="col2">Outros monitoramentos</h2>
            </div>

            <div class="itens2">
                <table>
                    <?php
                $consulta = Biogas::consultar($busca, $procurar);
                foreach($consulta as $key => $line) {
                    ?>
                <tr>
                    <td><a class="link" href="vermon.php?id_biogas=<?php echo $line['id_biogas']; ?>"><?php echo $line['id_biogas']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($line['data_moni'])); ?></td>
                    <td><a class="link" href="vermon.php?id_biogas=<?php echo $line['id_biogas']; ?>"><?php echo $line['relatorio']; ?></td>
                    <td><a class="link" href="vermon.php?id_biogas=<?php echo $line['id_biogas']; ?>"><a href="#"><img src="../../img/icons/view.svg" alt="" style="height: 30px;"></a></td>
                    <td><a href="cadmon.php?id_biogas=<?php echo $line['id_biogas']; ?>&acao=update"><img src="../../img/icons/editar.svg" alt="" style="height: 30px;"></a></td>
                    <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-biogas.php?id_biogas=<?php echo $line['id_biogas']; ?>&acao=delete"><img src="../../img/icons/delete.svg" alt="" style="height: 30px;"></a></td>
            </tr>
        
            <?php } ?>
                </table>
            </div>


            

        </div>
    </div>

    <div class="coluna2">
        <div class="header">
            <h2>Ultimos monitoramentos</h2>
        </div>
        <div class="itens3">
            <?php
                if(isset($_GET['id_biogas'])){
                  $info = Biogas::consultarId($_GET['id_biogas'])[0];            
                  echo "<p>Informações da última alteração feita:<p>";
                  echo "<p>Id do monitoramento: ".$info['id_biogas']."</p>";
                  echo "<p>Data do monitoramento: ".$info['data_moni']."</p>";
                  echo "<p>Relatório do monitoramento: ".$info['relatorio']."</p>";
                }
                    ?>
        </div>

                    
    </div>
    </div>

</main>

</body>
</html>

