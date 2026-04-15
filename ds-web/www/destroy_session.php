<?php
	// arquivo destroy_session.php

	// inicia (ou retoma) a sessão atual
	// mesmo para destruí-la, é necessário iniciar a sessão primeiro
	session_start();

	// destrói completamente a sessão no servidor
	// todas as variáveis de sessão serão removidas
	session_destroy();
?>