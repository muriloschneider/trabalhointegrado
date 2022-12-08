<?php
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
    <link rel="stylesheet" href="../../css/funcVer.css">   
    <link rel="stylesheet" href="../../css/navbar.css">   
    <title>Funcionário</title>
</head>


<header>
    <div class="navbar">
      <ul>
        <li><a href="../../index.php">INICIAL</a></li>
        <li><a href="monitoramentos.php">MONITORAMENTO</a></li>
        <li><a href="../../view/monitor/login-cadastro.php">LOGIN</a></li>
        <li><a href="../../sobre.php">SOBRE</a></li>
      </ul>
    </div>
</header> 
    
<main>
    <div class="coluna2">            
            <div class="header">
                <h2 class="col2">Funcionários</h2>
            </div>

            <div class="itens2">
                <table>
                    <?php
                        $consulta = Monitor::consultar($busca, $procurar);
                        foreach($consulta as $key => $line) {
                    ?>
                <tr>
                <th><a class="link" href="verfunc.php?id_moni=<?php echo $line['id_moni']; ?>"><?php echo $line['id_moni'];?></a></th>
                <td><a class="link" href="verfunc.php?id_moni=<?php echo $line['id_moni']; ?>"><?php echo $line['nome_moni'];?></td>
                <td><a class="link" href="verfunc.php?id_moni=<?php echo $line['id_moni']; ?>"><?php echo $line['contato_moni'];?></td>
            </tr>
            <?php } ?>
                </table>
            </div>

    </div>




    <div class="coluna2">
        <div class="header">
            <h2>Informações sobre funcionário</h2>
        </div>
        <div class="itens3">
            <?php
                if(isset($_GET['id_moni'])){
                    $info = Monitor::consultarId($_GET['id_moni'])[0];            
                        echo "<p>Id do monitor: ".$info['id_moni']."</p>";
                        echo "<p>Nome: ".$info['nome_moni']."</p>";
                        echo "<p>Contato: ".$info['contato_moni']."</p>";
                    }
                    ?>
        </div>

                    
    </div>
    </div>

</main>

</body>
</html>