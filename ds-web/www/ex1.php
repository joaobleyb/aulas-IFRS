<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Classificação do Estudante</title>
</head>
<body>

<h2>Classificação do Estudante</h2>

<form method="post" >
    Nome: <input type="text" name="nome"><br><br>
    Nota: <input type="text" name="nota"><br><br>
    <button type="submit" name="enviar">Classificar</button>
</form>

<?php

if (isset($_POST["enviar"])) {

    if (!isset($_POST["nome"]) or empty($_POST["nome"]) ||
        !isset($_POST["nota"]) or empty($_POST["nota"])) {

        echo "Preencha todos os campos obrigatórios!";

    } elseif (!is_numeric($_POST["nota"])) {

        echo "A nota deve ser um número válido!";

    } else {

        $nome = $_POST["nome"];
        $nota = $_POST["nota"];

        if ($nota >= 9) {
            $conceito = "A";
        } elseif ($nota >= 7) {
            $conceito = "B";
        } elseif ($nota >= 5) {
            $conceito = "C";
        } elseif ($nota >= 3) {
            $conceito = "D";
        } else {
            $conceito = "F";
        }

        if ($conceito == "A" or $conceito == "B") {
            $situacao = "APROVADO";
        } elseif ($conceito == "C" or $conceito == "D") {
            $situacao = "EM EXAME";
        } else {
            $situacao = "REPROVADO";
        }

        echo "<br><b>$nome</b> tem a nota <b>$nota</b>, conceito <b>$conceito</b> e está <b>$situacao</b>.";

    }
}
?>

</body>
</html>