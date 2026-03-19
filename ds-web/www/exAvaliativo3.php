<?php
    function maiorNumero($n1, $n2, $n3){
        if($n1 > $n2 and $n1 > $n3){
            echo("Maior = $n1 <br>");
        }
        elseif($n2 > $n1 and $n2 > $n3){
            echo("Maior = $n2 <br>");
        }
        else{
            echo("Maior = $n3 <br>");
        }
    }

    maiorNumero(1 ,2 ,3);
    maiorNumero(10 ,20 ,30);
    maiorNumero(100 ,2 ,30);
?>