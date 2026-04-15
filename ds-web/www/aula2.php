<?php 
	
	// laço for
	// 1ª condição: inicialização da variavel de controle
	// 2ª condição: até quando o laço será executado
	// 3º condição: incremento da variavel
	for ($i = 0; $i < 10; $i++){
		echo ("Executando laço for. $i vez <br>");
	}

	// laço de repetição while: laço com pré-validação

	$status = true;		// controlar se o laço será executado ou não

	// isso mostraria um warning
	//echo ("$i");

	$j = 0;

	while ($status){
		echo ("Executando o laço while <br>");

		// criando a condição de saida
		$j++;

		if ($j == 10)
			$status = false;	// altera o status da variavel de controle
	}

	// o while é um laço com pós validação. Será executado pelo menos uma vez. Após a execução, será avaliado se deve continuar ou não

	do {
		echo ("Executando o do while");
	} while ($status == true);




?>