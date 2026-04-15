<?php
	// arquivo processa.php
	// Este arquivo é responsável por receber e processar os dados enviados pelo formulário

	// OBS: A superglobal $_REQUEST deve ser evitada, pois mistura dados de $_POST, $_GET e $_COOKIE,
	// podendo gerar conflitos de nomes e dificultar a manutenção do código.
	// Por isso, utilizamos diretamente $_POST, já que o formulário foi enviado via método POST.

	// Verifica se o formulário foi enviado (se o botão "enviar" existe no $_POST)
	// Caso não exista, significa que o usuário acessou a página diretamente,
	// então ele é redirecionado para o formulário (ex_form.php)
	if (!isset($_POST["enviar"]) )
		header("location: ex_form.php");

	// Recebendo os dados enviados pelo formulário
	$nome = $_POST["nome"];
	$nascimento = $_POST["nasc"];
	$telefone = $_POST["fone"];
	$email = $_POST["email"];
	$sexo = $_POST["sexo"];

	// Bancos que podem ser selecionados no formulário
	// Como são opcionais (checkbox), podem ou não existir no $_POST

	// Inicializando variáveis para armazenar os bancos selecionados
	// Caso o usuário não selecione, elas permanecerão vazias ("")
	$bb = "";
	$bradesco = "";
	$nubank = "";
	$itau = "";

	// Verificando se cada checkbox foi marcado usando isset()
	// isset() retorna true se o campo existir no $_POST
	if (isset($_POST["bb"]))
		$bb = $_POST["bb"];

	if (isset($_POST["bradesco"]))
		$bradesco = $_POST["bradesco"];
	
	if (isset($_POST["nu"]))
		$nubank = $_POST["nu"];

	if (isset($_POST["itau"]))
		$itau = $_POST["itau"];

	// Recebendo senha e confirmação de senha
	$senha = $_POST["senha"]; 
	$rep_senha = $_POST["senha2"]; 

	// Array que armazenará possíveis mensagens de erro
	$erros = [];

	// Validação dos campos obrigatórios
	// empty() verifica se o campo está vazio ("", null, etc.)
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
		// Verifica se a senha e a confirmação são iguais
		if ($senha != $rep_senha)
			$erros[] = "As senhas não são iguais";
	}

	// Se houver erros, exibe todos na tela
	if (count($erros) > 0){
		// Percorre o array de erros e imprime cada mensagem
		foreach ($erros AS $erro){
			echo ("$erro<br>");
		}
	} else {
		// Caso não haja erros, exibe os dados informados pelo usuário
		echo ("Todos os campos foram preenchidos corretamente: foi digitado os seguintes valores <br>");
		echo ("Nome: $nome <br>");
		echo ("Data de nascimento: $nascimento <br>");
		echo ("Telefone: $telefone <br>");
		echo ("Email: $email <br>");

		// Conversão do valor do sexo (m, f, i) para descrição completa
		// Isso melhora a legibilidade da saída para o usuário
		if ($sexo == "m")
			$sexo = "Masculino"; // sobrescrevendo a variável original
		else if ($sexo == "f")
			$sexo = "Feminino";
		else
			$sexo = "Intersexo";

		echo ("Sexo: $sexo <br>");

		// Exibindo os bancos selecionados
		// Se a variável estiver vazia, significa que o checkbox não foi marcado
		echo ("Usuário tem conta nos seguintes bancos <br>");

		if (!empty($bb))
			echo ("Banco do Brasil <br>");

		if (!empty($bradesco))
			echo ("Bradesco <br>");

		if (!empty($nubank))
			echo ("Nubank <br>");

		if (!empty($itau))
			echo ("Itaú <br>");
		
		// Exibindo a senha (apenas para fins didáticos - em sistemas reais isso não deve ser feito)
		echo ("Senha: $senha <br>");
	}
?>