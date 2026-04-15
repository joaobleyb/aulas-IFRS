<?php
	// arquivo retrieve_cookie.php

	// $_COOKIE é um array associativo que armazena os cookies enviados pelo navegador.
	// Cada cookie pode ser acessado pelo seu nome (chave).

	// A função isset() verifica se o cookie "nome" existe,
	// evitando warnings ao tentar acessar um índice inexistente.
	if (isset($_COOKIE["nome"]) )
		
		// Caso o cookie exista, exibimos seu valor na tela.
		// $_COOKIE["nome"] retorna o valor armazenado no cookie.
		echo ("O nome armazenado no cookie é: <b>" . $_COOKIE["nome"] . "</b>");
	
	else
		
		// Caso o cookie não exista, informamos ao usuário
		// que ele precisa acessar o arquivo responsável por criá-lo.
		echo ("O cookie 'nome' não existe. Acesse o arquivo create_cookie.php para criá-lo");

?>