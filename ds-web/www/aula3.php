<?php

	// definindo o fuso horário para o horário oficial do Brasil (Brasília -3)
	date_default_timezone_set("America/Sao_Paulo");

	// ----------------------------
	// Manipulação de datas
	// ----------------------------

	// obtendo a data atual no formato dia/mês/ano
	$hoje = date("d/m/y");

	echo ("Hoje é $hoje");

	// exibindo diretamente o resultado da função date()
	// o operador . é utilizado para concatenar strings
	echo ("Agora são: " . date("H:i") );

	// ----------------------------
	// Criando arrays
	// ----------------------------

	// forma 1 de criar um array (usando colchetes [])
	$func1 = ["Marcelo", 23, 71.8, "28/2/2000", "Desenvolvedor web backend"];


	// exibindo um valor do array
	// o array precisa ficar fora da string e ser concatenado
	echo ("Nome: " . $func1[0] . "<br>");

	// forma 2 de criar um array: utilizando a função array()
	$func2 = array("Augusto", 25, 61.8, "14/5/2002", "Desenvolvedor web junior");

	echo ("Nome: " . $func2[0] . "<br>");

	// ----------------------------
	// Adicionando valores a um array
	// ----------------------------

	// adicionando uma informação referente ao salário
	// quando usamos [] o valor é inserido automaticamente
	// na última posição disponível do array
	$func1[] = 6500.87;

	// exibindo o salário (posição 5 do array)
	echo ("Salário do funcionário 1: " . $func1[5] . "<br>");

	// ao tentar acessar um índice inexistente,
	// o interpretador PHP gera um WARNING

	// outra forma de adicionar um valor:
	// definindo manualmente o índice
	// isso cria uma posição específica no array
	$func1[10] = "PHP, Mysql, Javascript"; // habilidades do desenvolvedor

	// exibindo o valor adicionado acima
	// observe que o índice 9 não foi definido
	echo ("Habilidades do funcionario 1: " . $func1[9] . "<br>");

	// ----------------------------
	// Outra forma de adicionar elementos
	// ----------------------------

	// array_push adiciona um ou mais elementos
	// sempre ao final do array
	array_push($func1, 8200);

	// exibindo o salário pretendido
	echo ("Salário pretendido funcionário 1: " . $func1[11] );

	// ----------------------------
	// Contando elementos de um array
	// ----------------------------

	// a função count() retorna quantos elementos existem no array
	$elementos = count($func1);

	echo ("O array func1 tem $elementos itens armazenados <br>");

	// ----------------------------
	// Percorrendo arrays
	// ----------------------------

	// lista de alunos da turma
	$turma = ["Kaue", "Élvis", "João", "Pablo", "Thiago", "Diego", "Diogo", "Andrieli", "Elen"];

	// usando um laço FOR para percorrer o array
	for ($i = 0; $i < count($turma); $i++) {

		echo ($turma[$i] . "<br>");
	}

	// usando foreach para percorrer o array
	// foreach é mais simples quando precisamos apenas acessar os valores

	echo ("<br>");

	foreach ($turma AS $aluno){
		echo ("$aluno <br>");
	}

	echo ("<br>");

	// foreach também pode acessar a posição (chave) e o valor
	foreach ($turma AS $key => $value){
		echo ("Aluno $key " . $turma[$key] . "<br>");
	}

	// ----------------------------
	// Criando um array associativo
	// ----------------------------

	// arrays associativos utilizam chaves descritivas
	// em vez de índices numéricos
	$func3 = array(
		"nome"	=> "Thiago",
		"nascimento" => "22/01/1999",
		"residencia" => "Rolante", 
		"cargo"	=> "Desenvolvedor web",
		"salario" => 6201.8
	);

	// exibindo os dados do array associativo
	echo ("Mostrando os dados do func3 - array associativo <br>");
	echo ("Nome: " . $func3["nome"] . "<br>");

	// também é possível acessar a chave diretamente dentro da string
	echo ("Nascimento: $func3[nascimento] <br>");
	echo ("Onde mora: $func3[residencia] <br>");
	echo ("Cargo: $func3[cargo] <br>");
	echo ("Salário: $func3[salario] <br>");

	// ----------------------------
	// Exibindo arrays completos
	// ----------------------------

	// print_r mostra toda a estrutura do array
	// útil para depuração e aprendizado
	print_r($func1);

	// ----------------------------
	// Ordenação de arrays
	// ----------------------------

	// ordena o array em ordem crescente (A-Z)
	sort($turma);	

	print_r($turma);

	// ordena o array em ordem decrescente (Z-A)
	rsort($turma);

	print_r($turma);

	// ----------------------------
	// Transformando string em array
	// ----------------------------

	// as disciplinas estão separadas por vírgula
	$disciplinas = "Desenvolvimento Web I, Desenvimento Web II, Programação Orientada a Objetos, Projeto Multidisciplinar";

	// explode() divide uma string em partes
	// utilizando um separador (neste caso, vírgula)
	$disciplina = explode(",", $disciplinas);

	print_r($disciplina);

	// exibindo cada disciplina em uma linha
	foreach($disciplina AS $disc){
		echo ("<b>$disc</b> <br>");
	}

	// criando um array numérico
	$numeros = [12, 54, 23, 54, 76, 46, 22, 50, "Pedro"];

	// max - retorna o maior valor de um array
	echo ("O maior valor é o " . max($numeros) );

	// min - retorna o menor valor de um array
	echo ("O menor valor é o " . min($numeros) );

?>