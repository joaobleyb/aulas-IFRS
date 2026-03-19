<?php
    function media($notaA, $notaB, $notaC){
        if($notaA >= 0 and $notaB >= 0 and $notaC >= 0 and $notaA <= 10 and $notaB <= 10 and $notaC <= 10){
            $media = ($notaA + $notaB + $notaC) / 3;
            if($media >= 7){
                echo("Aprovado <br>");
            }
            elseif($media < 1.8){
                echo("Reprovado <br>");
            }
            else{
                echo("Em exame <br>");
            }
        }
        else{
            echo("Notas Invalidas <br>");
        }
    }
    media(5.6, 8.9, 9);
    media(1, 1, 1);
    media(-1, 1, 11);
?>