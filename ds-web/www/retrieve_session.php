<?php

	// arquivo retrieve_session.php

	// é obrigatório iniciar (ou retomar) a sessão em todo arquivo que utiliza sessões
	// sem isso, não é possível acessar as variáveis armazenadas em $_SESSION
	session_start();

	// recuperando a variável de sessão "nome"
	// o valor foi definido anteriormente em outro arquivo
	echo ("O nome salvo na sessão é " . $_SESSION["nome"] . "<br>");
	

	// excluindo uma variável de sessão específica
	// a função unset remove a variável do array $_SESSION
	unset($_SESSION["idade"]);

	// verifica se a variável "idade" ainda existe na sessão
	// como foi removida com unset, essa condição não será atendida
	// é importante tratar as variaveis de sessão, pois como as variaveis não precisam ser previamente declaradas, acessar uma variavel que não existe emitirá um "warning"
	if (isset($_SESSION["idade"]))
		echo ("A idade salva na sessão é " . $_SESSION["idade"] . "<br>");

?>