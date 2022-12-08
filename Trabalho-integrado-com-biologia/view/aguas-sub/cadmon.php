<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/agSub.css">
    <title>Águas Subterrâneas</title>
</head>
<body>
    <!-- <img src="" alt=""> -->

    <div class="select">
        <h2>Selecione o monitoramento</h2>
        <ul>
            <li><a href="#">Águas Sub.</a></li>
            <li><a href="#">Líquidos Lix.</a></li>
            <li><a href="#">Qualidade do ar</a></li>
            <li><a href="#">Águas super.</a></li>
            <li><a href="#">Pressão sonora</a></li>
            <li><a href="#">Biogás</a></li>
            <li><a href="#">Geotécnico</a></li>
        </ul>
    </div>

    <div class="forms">
        <form action="#" method="post">
            <label for="num_poco_moni">Nº do poço</label>
            <input type="number" name="num_poco_moni" id="num_poco_moni"><br>

            <label for="num_amostra">Nº da amostra</label>
            <input type="number" name="num_amostra" id="num_amostra"><br>

            <label for="data_coleta">Data da coleta</label>
            <input type="date" name="data_coleta" id="data_coleta"><br>

            <label for="resultado">Relatório da amostra</label>
            <textarea name="resultado" id="resultado" cols="63" rows="2"></textarea>
    </div>

    <div class="nav">
        <ul>
            <li><a href="vermon.php">Ver monitoramento</a></li>
            <li><a href="#">Inicial</a></li>
            <li><button name="" id="" type="submit" value="">Fazer novo monitoramento</button></li>
        </form>
        </ul>
    </div>
</body>
</html>