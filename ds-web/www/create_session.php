<?php
	// arquivo create_session.php

	// inicia uma sessão
	// isso permite armazenar e acessar dados do usuário no servidor
	session_start();	

	// cria/define uma variável de sessão chamada "nome"
	// o valor "Thiago" ficará disponível enquanto a sessão existir
	$_SESSION["nome"] = "Thiago";

	// cria/define uma segunda variável de sessão chamada "idade"
	// armazena o valor 21 na sessão do usuário
	$_SESSION["idade"] = 21;
?>