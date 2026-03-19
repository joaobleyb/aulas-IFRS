<?php
    function somaPares($n){
        $soma = 0;
        for($i = 1; $i <= $n; $i++){
            $soma = $soma + $i;
        }
        echo($soma);
    }

    somaPares(10);
?>