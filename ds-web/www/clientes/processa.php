<?php
	// ==============================
	// ARQUIVO: processa.php
	// ==============================
	// Este arquivo faz parte do CRUD.
	// Especificamente, ele implementa o "CREATE",
	// ou seja, a INSERÇÃO de dados no banco de dados.

	// --------------------------------------------
	// VERIFICAÇÃO DE ENVIO DO FORMULÁRIO
	// --------------------------------------------
	// Aqui verificamos se o usuário realmente chegou aqui
	// através do formulário (botão "enviar")
	if (!isset($_POST["enviar"]) )
		header("location: ex_form.php");

	// --------------------------------------------
	// RECEBENDO DADOS DO FORMULÁRIO (INPUTS)
	// --------------------------------------------
	// Cada variável recebe o valor enviado pelo usuário
	$nome = $_POST["nome"];
	$nascimento = $_POST["nasc"];
	$telefone = $_POST["fone"];
	$email = $_POST["email"];
	$sexo = $_POST["sexo"];

	// --------------------------------------------
	// TRATAMENTO DOS CHECKBOX
	// --------------------------------------------
	// Como checkbox só vem no POST se estiver marcado,
	// precisamos verificar com isset()

	// Inicialização das variáveis
	$bb = "";
	$bradesco = "";
	$nubank = "";
	$itau = "";

	// Se marcado → recebe 1
	// Se não marcado → recebe 0
	if (isset($_POST["bb"]))
		$bb = 1;
	else
		$bb = 0;

	if (isset($_POST["bradesco"]))
		$bradesco = 1;
	else
		$bradesco = 0;
	
	if (isset($_POST["nu"]))
		$nubank = 1;
	else
		$nubank = 0;

	if (isset($_POST["itau"]))
		$itau = 1;
	else
		$itau = 0;

	// --------------------------------------------
	// SENHAS
	// --------------------------------------------
	// Recebe a senha e a confirmação
	$senha = $_POST["senha"]; 
	$rep_senha = $_POST["senha2"]; 

	// --------------------------------------------
	// VALIDAÇÃO DOS DADOS (REGRAS DE NEGÓCIO)
	// --------------------------------------------
	// Array que guarda os erros encontrados
	$erros = [];

	// Validação de campos obrigatórios
	if (empty($nome))
		$erros[] = "Preencha o nome";

	if (empty($nascimento))
		$erros[] = "Preencha a data de nascimento";

	if (empty($telefone))
		$erros[] = "Preencha o telefone";

	if (empty($email))
		$erros[] = "Preencha o email";

	// Validação da senha
	if (empty($senha)){
		$erros[] = "Preencha a senha";
	} else {
		// Verifica se as duas senhas são iguais
		if ($senha != $rep_senha)
			$erros[] = "As senhas não são iguais";
	}

	// --------------------------------------------
	// TRATAMENTO DOS ERROS
	// --------------------------------------------
	// Se existir qualquer erro, ele será exibido
	if (count($erros) > 0){
		foreach ($erros AS $erro){
			echo ("$erro<br>");
		}
	} else {

		// --------------------------------------------
		// CONEXÃO COM O BANCO DE DADOS
		// --------------------------------------------
		// Aqui iniciamos a comunicação com o MySQL
		// Abre a conexão com o banco de dados MySQL, informando:
		// o servidor ("mysql"), que pode ser o NOME DO SERVIÇO (no Docker)
		//   ou o ENDEREÇO IP do servidor onde o banco está rodando
		// - o usuário (root)
		// - a senha (12345)
		// - e o nome do banco (des_web)
		$conn = mysqli_connect("mysql", "root", "12345", "des_web");

		// --------------------------------------------
		// COMANDO SQL (CREATE DO CRUD)
		// --------------------------------------------
		// monta a consulta do tipo insert que deverá ser executada
		echo $sql = "INSERT INTO clientes (nome, nasc, fone, email, sexo, senha, bb, bradesco, nubank, itau) VALUES ('$nome', '$nascimento', '$telefone', '$email', '$sexo', '$senha', $bb, $bradesco, $nubank, $itau)";

		// --------------------------------------------
		// EXECUÇÃO DO SQL
		// --------------------------------------------
		// Envia o comando para o banco de dados
		if (mysqli_query($conn, $sql)) {
			echo ("Cliente inserido com sucesso.");
		} else {
			echo ("Houve um erro na hora de salvar o cliente.");
		}

		// --------------------------------------------
		// FECHANDO CONEXÃO
		// --------------------------------------------
		// Finaliza a comunicação com o banco
		// é necessário passar como parametro o link da conexão com o banco de dados
		mysqli_close($conn);
	}
?>