<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h2>Cadastro de Clientes</h2>

<form method="post">

    <h3>Dados pessoais</h3>
    Nome: <input type="text" name="nome"><br><br>
    Telefone: <input type="text" name="telefone"><br><br>
    E-mail: <input type="text" name="email"><br><br>
    Endereço: <input type="text" name="endereco"><br><br>

    <h3>Sexo:</h3>
    <input type="radio" name="sexo" value="Masculino"> Masculino
    <input type="radio" name="sexo" value="Feminino"> Feminino
    <input type="radio" name="sexo" value="Outro"> Outro
    <br><br>

    <h3>Informações adicionais</h3>
    Renda mensal: <input type="text" name="renda"><br><br>

    <h3>Sistema Operacional:</h3>
    <input type="radio" name="so" value="Windows"> Windows<br>
    <input type="radio" name="so" value="Linux"> Linux<br>
    <input type="radio" name="so" value="macOS"> macOS<br>
    <input type="radio" name="so" value="Nenhum"> Não possuo computador<br><br>

    <h3>Smartphone:</h3>
    <input type="radio" name="smartphone" value="Android"> Android<br>
    <input type="radio" name="smartphone" value="iOS"> iOS<br>
    <input type="radio" name="smartphone" value="xiaomi"> <br><br>

    <h3>Serviços de Streaming:</h3>
    <input type="checkbox" name="streaming" value="Amazon Prime Video"> Amazon Prime Video<br>
    <input type="checkbox" name="streaming" value="Deezer"> Deezer<br>
    <input type="checkbox" name="streaming" value="Disney+"> Disney+<br>
    <input type="checkbox" name="streaming" value="GloboPlay"> GloboPlay<br>
    <input type="checkbox" name="streaming" value="HBO Max"> HBO Max<br>
    <input type="checkbox" name="streaming" value="Netflix"> Netflix<br>
    <input type="checkbox" name="streaming" value="Spotify"> Spotify<br>
    <input type="checkbox" name="streaming" value="YouTube"> YouTube<br><br>

    <button type="submit" name="enviar">Enviar</button>

</form>

<?php

$bloqueado = isset($_COOKIE["ja_enviou"]);

if ($bloqueado) {
    echo "Você já enviou o formulário!";
}

if (isset($_POST["enviar"])) {

if ($bloqueado) {

    echo "Você já enviou o formulário!";

} elseif (!isset($_POST["nome"]) or empty($_POST["nome"])) {
    echo "Preencha o nome!";

} elseif (!isset($_POST["telefone"]) or empty($_POST["telefone"])) {
    echo "Preencha o telefone!";

} elseif (!isset($_POST["email"]) or empty($_POST["email"])) {
    echo "Preencha o e-mail!";

} elseif (!isset($_POST["endereco"]) or empty($_POST["endereco"])) {
    echo "Preencha o endereço!";

} elseif (!isset($_POST["sexo"]) or empty($_POST["sexo"])) {
    echo "Selecione o sexo!";

} elseif (!isset($_POST["renda"]) or empty($_POST["renda"])) {
    echo "Preencha a renda!";

} elseif (!is_numeric($_POST["renda"])) {
    echo "A renda deve ser um número válido!";

} elseif (!isset($_POST["so"]) or empty($_POST["so"])) {
    echo "Selecione o sistema operacional!";

} elseif (!isset($_POST["smartphone"]) or empty($_POST["smartphone"])) {
    echo "Selecione o smartphone!";

} else {

        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $endereco = $_POST["endereco"];
        $sexo = $_POST["sexo"];
        $renda = $_POST["renda"];
        $so = $_POST["so"];
        $smartphone = $_POST["smartphone"];

        echo "<h3>Dados informados:</h3>";
        echo "Nome: <b>$nome</b><br>";
        echo "Telefone: <b>$telefone</b><br>";
        echo "Email: <b>$email</b><br>";
        echo "Endereço: <b>$endereco</b><br>";
        echo "Sexo: <b>$sexo</b><br>";
        echo "Renda: <b>$renda</b><br>";
        echo "Sistema Operacional: <b>$so</b><br>";
        echo "Smartphone: <b>$smartphone</b><br>";

        if (isset($_POST["streaming"])) {
            echo ("Streaming: <b>" . $_POST["streaming"] . "</b>");
        } else {
            echo ("Streaming: <b>Nenhum selecionado</b>");
        }

        setcookie("ja_enviou", "sim", time() + 3600);
    }
}
?>

</body>
</html>