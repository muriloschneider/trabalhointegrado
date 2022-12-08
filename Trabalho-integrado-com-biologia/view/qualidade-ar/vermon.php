<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(!isset($_SESSION['id_moni']) || $_SESSION['id_moni'] == ''){
            header("Location: ../monitor/login-cadastro.php");
        }
    }

    include_once (__DIR__."/../utils/autoload.php");

    $busca = isset($_POST["busca"]) ? $_POST["busca"] : "id_ar";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>[NOME DO SITE]</title>
</head>
<body class="">
    <form method="post">
        <input type="radio" id="id_ar" name="busca" value="1" <?php if($busca == "id_ar"){echo "checked";}?>>
        <label>#ID</label><br>
        <input type="radio" id="data_analise" name="busca" value="2" <?php if($busca == "data_analise"){echo "checked";}?>>
        <label>DATA</label><br> 
        <input type="radio" id="relatorio_analise" name="busca" value="3" <?php if($busca == "relatorio_analise"){echo "checked";}?>>
        <label>RELATÓRIO</label><br>

        <legend>Procurar: </legend>
        <input type="text"  name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <button type="submit" name="acao" id="acao"></button>
    </form>

    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>Data</th>
                <th>Relatório</th>
                <th>ALTERAR</th>
                <th>EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $consulta = QualidadeAr::consultar($busca, $procurar);
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <th><?php echo $linha['id_ar'];?></th>
                <td><?php echo date("d/m/Y", strtotime($linha['data_analise']));?></td>
                <td><?php echo $linha['relatorio_analise'];?></td>
                <td><a href="cadmon.php?id_ar=<?php echo $linha['id_ar'];?>&acao=update">teste</a></td>
                <td><a onclick="return confirm('Deseja mesmo excluir?')" href="../../php/controle/controle-qualidade-ar.php?id_ar=<?php echo $linha['id_ar'];?>&acao=delete">teste</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>