<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exemplo de formulário</title>
</head>
<body>
	<p>A proposta deste arquivo é concentrar, em um único lugar, tanto o HTML quanto o código PHP, incorporando a lógica do processa.php diretamente aqui.
	<p> Dessa forma, temos um exemplo de página que mistura estrutura (HTML) e processamento (PHP).
	<form method="POST">
		<fieldset>
		<legend>Exemplo de formulário</legend>
			Nome: <input type="text" name="nome"> <br>
			Nascimento: <input type="date" name="nasc"> <br>
			Telefone: <input type="tel" name="fone"> <br>
			E-mail: <input type="email" name=email> <br>
			Sexo: <input type="radio" name="sexo" value="m"> Masculino <input type="radio" name="sexo" value="f"> Feminino <input type="radio" name="sexo" value="i"> Inter sexo <br>
			Em quais bancos você tem conta?
			 <input type="checkbox" name="bb"> Banco do Brasil <input type="checkbox" name="bradesco"> Bradesco <input type="checkbox" name="nu"> Nubank <input type="checkbox" name="itau"> Itaú <br>
			Senha: <input type="password" name="senha"> <br>
			Repita a senha: <input type="password" name="senha2"> <br>
			<input type="submit" name="enviar" value="Cadastrar">
		</fieldset>
	</form>

	<?php
	// apenas copiando e colando o código do arquivo processa.php

	if (isset($_POST["enviar"])){
		// request deve ser evitado, pois pode dar conflitos de name com as variaveis $_POST, $_GET e $_COOKIE
		// 
		$nome = $_POST["nome"];
		$nascimento = $_POST["nasc"];
		$telefone = $_POST["fone"];
		$email = $_POST["email"];
		$sexo = $_POST["sexo"];

		// bancos que podem ser selecionados
		// o banco é opcional


		// inicializando as variaveis para armazenar o nome dos bancos
		$bb = "";
		$bradesco = "";
		$nubank = "";
		$itau = "";

		if (isset($_POST["bb"]))
			$bb = $_POST["bb"];

		if (isset($_POST["bradesco"]))
			$bradesco = $_POST["bradesco"];
		
		if (isset($_POST["nu"]))
			$nubank = $_POST["nu"];

		if (isset($_POST["itau"]))
			$itau = $_POST["itau"];

		$senha = $_POST["senha"]; 
		$rep_senha = $_POST["senha2"]; 

		$erros = [];

		// validando os campos do usuário para testar se foram preenchidos
		if (empty($nome))
			$erros[] = "Preencha o nome";

		if (empty($nascimento))
			$erros[] = "Preencha a data de nascimento";

		if (empty($telefone))
			$erros[] = "Preencha o telefone";

		if (empty($email))
			$erros[] = "Preencha o email";

		if (empty($senha)){
			$erros[] = "Preencha a senha";
		} else {
			if ($senha != $rep_senha)
				$erros[] = "As senhas não são iguais";
		}

		if (count($erros) > 0){
			foreach ($erros AS $erro){
				echo ("$erro<br>");
			}
		} else {
			echo ("Todos os campos foram preenchidos corretamente: foi digitado os seguintes valores <br>");
			echo ("Nome: $nome <br>");
			echo ("Data de nascimento: $nascimento <br>");
			echo ("Telefone: $telefone <br>");
			echo ("Email: $email <br>");
			// invés de exibir o sexo (letra "m", "f" ou "i"), vamos escrever "Masculino", "Feminino" ou "Intersexo"
			// echo ("Sexo: $sexo <br>");
			if ($sexo == "m")
				$sexo = "Masculino"; // sobreescrendo a variavel
			else if ($sexo == "f")
				$sexo = "Feminino";
			else
				$sexo = "Intersexo";

			echo ("Sexo: $sexo <br>");

			// como mostrar os bancos que o usuário tem conta aberta?
			// testando se as variaveis foram preenchidas
			// se estiver "", é por que elas não foram alteradas, ou seja, não foi clicado
			echo ("Usuário tem conta nos seguintes bancos <br>");
			if (!empty($bb))
				echo ("Banco do Brasil <br>");

			if (!empty($bradesco))
				echo ("Bradesco <br>");

			if (!empty($nubank))
				echo ("Nubank <br>");

			if (!empty($itau))
				echo ("Itaú <br>");
			
			echo ("Senha: $senha <br>");
		}
	}
	?>
</body>
</html>