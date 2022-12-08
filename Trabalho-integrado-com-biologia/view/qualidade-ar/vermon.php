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
    <title>Qualidade do Ar</title>
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
                <a href="../liq-lix/vermon.php">Líquidos Lix</a>
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
                        $consulta = QualidadeAr::consultar($busca, $procurar);
                        foreach($consulta as $key => $line) {
                    ?>
                <tr>
                <th><a class="link" href="vermon.php?id_ar=<?php echo $line['id_ar']; ?>"><?php echo $line['id_ar'];?></a></th>
                <td><?php echo date("d/m/Y", strtotime($line['data_analise']));?></td>
                <td><a class="link" href="vermon.php?id_ar=<?php echo $line['id_ar']; ?>"><?php echo $line['relatorio_analise'];?></td>
                <td><a  href="vermon.php?id_ar=<?php echo $line['id_ar']; ?>"><img src="../../img/icons/view.svg" alt="" style="height: 30px;"></a></td>
                <td><a class="table" href="cadmon.php?id_ar=<?php echo $line['id_ar'];?>&acao=update"><img src="../../img/icons/editar.svg" height="30px"></a></td>
                <td><a class="table" onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-qualidade-ar.php?id_ar=<?php echo $line['id_ar'];?>&acao=delete"><img src="../../img/icons/delete.svg" height="30px"></a></td>
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
                if(isset($_GET['id_ar'])){
                    $info = QualidadeAr::consultarId($_GET['id_ar'])[0];            
                        echo "<p>Informações da última alteração feita:<p>";
                        echo "<p>Id do monitoramento: ".$info['id_ar']."</p>";
                        echo "<p>Data do monitoramento: ".$info['data_analise']."</p>";
                        echo "<p>Relatório do monitoramento: ".$info['relatorio_analise']."</p>";
                    }
                    ?>
        </div>

                    
    </div>
    </div>

</main>

</body>
</html>