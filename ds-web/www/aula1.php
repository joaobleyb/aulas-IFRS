<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aula 1</title>
</head>
<body>
	<?php
		// isso é um comentário

		/* Isso é um comentário multi linha
		   O "*" e a "/" encerram o comentário
		*/

		# Isso é outra forma de comentário

		$nome = "Joel";	// string
		$idade = 33; // int
		$peso = 68.9; // float
		$doador_de_orgaos = true;	// boolean

		// concatenando um texto a uma string
		$nome .= " dos Santos";

		// mostrando as variaveis criadas

		// forma 1 - concatencando 
		// mesclando a saida com HTML
		echo ("Nome: <b>" . $nome . "</b><br>");

		// forma 2 - exibindo a variavel dentro da string	
		echo ("Idade: <b> $idade anos </b></br>");

		// exemplo de if - dizer se é ou não doador de órgãos

		// o == true pode ser omitido
		if ($doador_de_orgaos == true)
			echo ("É doador de orgãos <br>");
		else
			echo ("Não é doador de orgãos <br>");

		// exemplo de estrutura de decisão com duas condições
		// a pessoa pode tirar a CNH??

		$passouTeste = false; 	// variavel para indicar se a pessoa passou no teste psicológico

		// duas condições avaliadas
		// está sendo omitido o == true na variavel  $passouTeste
		if ($idade >= 18 && $passouTeste)
			echo ("Está apto a tirar a CNH <br>");
		else 
			echo ("Não está apto a tirar a CNH <br>");

		// exemplo de if para escrever um numero por extenso
		// estrutura de decisão aninhada
		$numero = 0;

		if ($numero == 0)
			echo ("Zero <br>");
		else if ($numero == 1)
			echo ("Um <br>");
		else if ($numero == 2)
			echo ("Dois");
		else
			echo ("Só consigo escrever zero, um e dois!<br>");

	?>
</body>
</html>