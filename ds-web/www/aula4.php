<?php
	// aula4.php

	// criando uma função básica que soma dois números
	function somar($a, $b){
		// realiza a soma dos valores recebidos por parâmetro
		$soma = $a + $b;

		// exibe o resultado diretamente na tela
		echo ("A soma de $a + $b é $soma <br>");
	}

	// tentando exibir a variável $soma fora da função
	// isso não funciona, pois a variável foi criada dentro da função (escopo local)
	echo ($soma);

	// chamando a função e passando dois valores
	somar(12, 17);

	// criando um array associativo representando um funcionário
	// esse array é uma cópia do que foi criado na aula anterior
	$func1 = array(
		"nome"	=> "Thiago",
		"nascimento" => "22/01/1999",
		"residencia" => "Rolante", 
		"cargo"	=> "Desenvolvedor web",
		"salario" => 6201.8
	);

	// criando outro funcionário
	$func2 = array(
		"nome"	=> "Ellen",
		"nascimento" => "24/04/2005",
		"residencia" => "Taquara", 
		"cargo"	=> "Desenvolvedor web backend",
		"salario" => 6801.7
	);

	// primeira versão da função (comentada)
	// ela apenas exibia os dados diretamente (não retornava nada)
	/*
	function mostrarFuncionario($func){
		echo ("Nome: <b>$func[nome]</b><br>");
		echo ("Data de nascimento: <b>$func[nascimento] </b><br>");
		echo ("Cidade: <b>$func[residencia] </b><br>");
		echo ("Cargo: <b>$func[cargo] </b><br>");
		echo ("Salário: R$ <b>$func[salario] </b><br>");
	}
	*/

	// segunda versão da função
	// agora ela retorna uma string com os dados formatados
	function mostrarFuncionario($func){
		// variável que vai armazenar o texto final
		$saida = "";

		// concatenando (juntando) os dados do funcionário na string
		$saida .= "Nome: <b>$func[nome]</b><br>";
		$saida .= "Data de nascimento: <b>$func[nascimento] </b><br>";
		$saida .= "Cidade: <b>$func[residencia] </b><br>";
		$saida .= "Cargo: <b>$func[cargo] </b><br>";
		$saida .= "Salário: R$ <b>$func[salario] </b><br>";

		// retornando a string montada
		return $saida;
	}

	// chamando a função, mas sem usar o retorno
	// neste caso, nada será exibido na tela, pois não é feito nenhum processamento com esse retorno
	mostrarFuncionario($func1);	
	mostrarFuncionario($func2);

	// chamando a função corretamente, exibindo o retorno com echo
	echo (mostrarFuncionario($func1));
	echo (mostrarFuncionario($func2));

?>