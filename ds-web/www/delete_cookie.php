<?php
	// arquivo delete_cookie.php

	// A função setcookie também é utilizada para excluir cookies.
	// Para isso, definimos o mesmo nome do cookie e um valor vazio.

	// O terceiro parâmetro é o tempo de expiração.
	// Ao definir um tempo no passado (time() - 60),
	// informamos ao navegador que o cookie já expirou.

	// Com isso, o navegador remove o cookie automaticamente.
	setcookie("nome", "", time() - 60);
?>