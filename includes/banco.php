<?php
	$banco = new mysqli ("localhost", "root", "123456",  "db_games");
	if($banco->connect_errno) {
		echo "<p>Encontrei um erro $banco->errno --> $banco->connect_error</p>";
		die();
	}
	
