<?php
    
    foreach ($var as $linha) {
        if ($linha['total'] != 0) {
            echo "<br>Data: ". $linha['dt']."<br>";
            echo "Total: ".$linha['total'];
        }
    }

?>