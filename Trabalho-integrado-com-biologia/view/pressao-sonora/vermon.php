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
    <link rel="stylesheet" href="../../css/agSubVer.css">
    <title>Pressão sonora</title>
</head>

<body>
    <!-- <img src="" alt=""> -->

    <div class="select">
        <h2>Selecione o monitoramento</h2>
        <ul class="moni">
            <li><a href="cadmon.php">Águas Sub.</a></li>
            <li><a href="../aguas-superficiais/cadmon.php">Águas super.</a></li>
            <li><a href="../geo/cadmon.php">Geotécnico</a></li>
            <li><a href="../liq-lix/cadmon.php">Líquidos Lix.</a></li>
            <li><a href="../pressao-sonora/cadmon.php">Pressão sonora</a></li>
            <li><a href="../biogas/cadmon.php">Biogás</a></li>
            <li><a href="../qualidade-ar/cadmon.php">Qualidade do ar</a></li>
        </ul>
    </div>

    <div class="outros">
        <h2>Outros monitoramentos</h2>
        <table>
            <tbody>
                <?php
                $consulta = Pressao::consultar($busca, $procurar);
                foreach ($consulta as $key => $line) {
                ?>
                    <tr>
                        <td><?php echo $line['id_pressao']; ?></td>
                        <td><?php echo $line['area_moni']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($line['data_amostra'])); ?></td>
                        <!-- <td><?php echo $line['hora_moni']; ?></td>
                        <td><?php echo $line['num_deci']; ?></td>
                        <td><?php echo $line['relatorio']; ?></td> -->
                        <td><?php echo $line['id_monitor']; ?></td>
                        <td><a href="vermon.php?id_pressao=<?php echo $line['id_pressao']; ?>"><img src="../../img/icons/view.svg" alt="" style="height: 30px;"></a></td>
                        <td><a href="cadmon.php?id_pressao=<?php echo $line['id_pressao']; ?>&acao=update"><img src="../../img/icons/editar.svg" alt="" style="height: 30px;"></a></td>
                        <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-pressao.php?id_pressao=<?php echo $line['id_pressao']; ?>&acao=delete"><img src="../../img/icons/delete.svg" alt="" style="height: 30px;"></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="ult">
        <h2>infos monitoramento</h2>
            <?php
                if(isset($_GET['id_pressao'])){
                    $info = Pressao::consultarId($_GET['id_pressao'])[0];            
                        echo "<p>Informações da última alteração feita:<p>";
                        echo "<p>Id do monitoramento: ".$info['id_pressao']."</p>";
                        echo "<p>Data da amostra: ".date("d/m/Y", strtotime($info['data_amostra']))."</p>";
                        echo "<p>Hora do monitoramento: ".$info['hora_moni']."</p>";
                        echo "<p>Número de decibéis: ".$info['num_deci']."</p>";
                        echo "<p>Relatório do monitoramento: ".$info['relatorio']."</p>";
                }
            ?>
    </div>

    <div class="nav">
        <ul class="dif">
            <li><a href="#">Inicial</a></li>
            <li><a href="vermon.php">Monitoramento</a></li>
            <li><a href="../monitor/perfil.php">Perfil</a></li>
            <li><a href="#">Sobre</a></li>
            </form>
        </ul>
    </div>
</body>

</html>