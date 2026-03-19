<?php
    function sequenciaFibonacci($n){
        $a = 0;
        $b = 1;
        for($i = 1; $i <= $n; $i++){
            echo($a . " ");
            $t = $a + $b;
            $a = $b;
            $b = $t;
        }
    }

    sequenciaFibonacci(10)

?>