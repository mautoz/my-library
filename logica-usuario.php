<?php

session_start();
$timeout = 3600;

function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
	if(!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Você não tem acesso a essa funcionalidade.";
		header("Location: index.php");
		die();
	}
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
}

function logaUsuario($nome) {
	$_SESSION["usuario_logado"] = $nome;
}

function logout () {
	session_destroy();
	session_start();
}