<?php
	// aula1_correcao_ex_decisao.php
	
	// Faça um programa que calcula e mostre o percentual de frequência de um estudante. Para isso, considere que 120 períodos correspondem a 100% da carga horária.

	$total = 120;
	$presencas = 105;

	$frequencia = ($presencas / $total) * 100;

	echo ("O aluno tem $frequencia por cento de frequencia nas aulas");

	//Escreva um programa que verifica se um número é par ou ímpar.
	$numero = -4;

	if ($numero % 2 == 0)
		echo ("O número $numero é par <br>");
	else
		echo ("O número $numero é ímpar <br>");

	//Crie um programa que verifica se um número inteiro é positivo, negativo ou zero.
	if ($numero < 0)
		echo ("O número $numero é negativo <br>");
	else if ($numero > 0)
		echo ("O número $numero é positivo <br>");
	else
		echo ("O número é zero <br>");

	//Faça um programa que escreve uma data por extenso, lendo os dados de três variáveis (representando uma data). Exemplo: 15/03/2023 → 15 de março de 2023.

	$dia = 15;
	$mes = 4;
	$ano = 2026;

	// iniciando a saida com o dia e a preposição de
	$saida = $dia . " de ";

	switch($mes){
		case 1:
			$saida .= "janeiro";
			break;
		case 2:
			$saida .= "fevereiro";
			break;
		case 3:
			$saida .= "março";
			break;
		case 4:
			$saida .= "abril";
			break;
		case 5:
			$saida .= "maio";
			break;
		case 6:
			$saida .= "junho";
			break;
		case 7:
			$saida .= "julho";
			break;
		case 8:
			$saida .= "agosto";
			break;
		case 9:
			$saida .= "setembro";
			break;
		case 10:
			$saida .= "outubro";
			break;
		case 11:
			$saida .= "novembro";
			break;
		default:
			$saida .= "dezembro";
	}

	// concatenando o ano a data
	$saida .= " de " . $ano;

	echo ("$saida ");



?>