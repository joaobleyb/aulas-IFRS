<?php

	// arquivo create_cookie.php

	// A função setcookie() é utilizada para criar um cookie no navegador.
	// 1º parâmetro: nome do cookie (chave de acesso)
	// 2º parâmetro: valor associado à chave
	// 3º parâmetro: tempo de expiração (timestamp em segundos)

	// echo ("timestamp atual: " . time() ); // usado para visualizar o tempo atual

	// Definindo a validade do cookie para 30 dias
	// (60 segundos * 60 minutos * 24 horas * 30 dias)
	setcookie("nome", "Thiago", time() + 60 * 60 * 24 * 30);

	// $_COOKIE é um array associativo que armazena os cookies enviados pelo navegador

	// Acessando o valor do cookie "nome"
	// (pode gerar aviso caso o cookie ainda não exista)
	$nome = $_COOKIE["nome"];

	// Para alterar o valor de um cookie, utiliza-se novamente a função setcookie()
	// com o mesmo nome (chave), sobrescrevendo o valor anterior
	setcookie("nome", "Thiago Augusto");

	// Exibindo o valor armazenado no cookie
	echo ("O nome armazenado no array é: <b></b> " . $nome);


?>