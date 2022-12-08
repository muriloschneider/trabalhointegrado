<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/agSubVer.css">
    <link rel="stylesheet" href="../../css/navbar.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../../js/index.js"></script>
    <script src="../../js/charts.js"></script>
    <title>Águas Subterrâneas</title>
</head>
<body>
   
<header>
    <div class="navbar">
      <ul>
        <li><a href="vermon.php">VER MONITORAMENTOS</a></li>
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
                <h2 class="col2">Monitoramentos por dias</h2> <br>
                <div id="grafico" style="width: 100%; height: 100%; margin-top: 6em; margin-right: 10em;"></div>
            </div>
</main>

    <!-- <div class="ultMon">
        <div class="ult">
                <h2>úLTIMOS MONITORAMENTOS</h2>
        </div>
    </div> -->

</body>
</html>