<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exemplo de formulário</title>
</head>
<body>
	<fieldset>
		<legend>Exemplo de formulário</legend>
		<form method="POST" action="processa.php">
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
		</form>

	</fieldset>
</body>
</html>