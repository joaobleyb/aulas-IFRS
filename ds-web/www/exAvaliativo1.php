<?php
    function qntPalavras($frase, $palavra){
        $apareceu = 0;
        $fraseSeparada = explode(" ", $frase);
        for($i = 0; $i < count($fraseSeparada); $i++){
            if($fraseSeparada[$i] == $palavra){
                $apareceu++;
            }
        }
        echo($apareceu);
    }

    qntPalavras("A menina desceu o morro duas vezes, duas vezes a mais que eu e ela, mas a menina nao desistiu e a menina caiu de novo menina", "a")
?>