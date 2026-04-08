<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h2>Verificar Número Perfeito</h2>

<form method="get">
    Número: <input type="text" name="numero"><br><br>
    <button type="submit" name="enviar">Verificar</button>
</form>

<?php

$bloqueado = isset($_COOKIE["ja_enviou"]);

if ($bloqueado) {
    echo "Você já enviou o formulário!";
}

if (isset($_GET["enviar"])) {

    if ($bloqueado) {

        echo "Você já enviou o formulário!";

    } elseif (!isset($_GET["numero"]) or empty($_GET["numero"])) {

        echo "Preencha o campo obrigatório!";

    } elseif (!is_numeric($_GET["numero"])) {

        echo "Digite um número inteiro válido!";

    } else {

        $numero = $_GET["numero"];
        $soma = 0;

        for ($i = 1; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                $soma += $i;
            }
        }

        if ($soma == $numero) {
            echo "<br><b>$numero</b> é um número perfeito.";
        } else {
            echo "<br><b>$numero</b> NÃO é um número perfeito.";
        }

        setcookie("ja_enviou", "sim", time() + 3600);

    }
}
?>

</body>
</html>