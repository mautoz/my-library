
<?php

require_once("conecta.php");

function usuarioAltoNivel($conexao, $nome) {
	$query = "select permissao from users where nome = '{$nome}'";
	$resultado = mysqli_query($conexao, $query); 
	$linha = mysqli_fetch_assoc($resultado);
	return $linha['permissao'];
}

?>