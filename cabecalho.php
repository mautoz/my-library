<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("logica-usuario.php");
require_once("mostra-alerta.php");

if(isset($_SESSION['ultima_acao'])){    
    $tempoInativo = time() - $_SESSION['ultima_acao'];    

    if($tempoInativo >= $timeout){
        logout();
    }    
}
$_SESSION['ultima_acao'] = time();
?>

<html>
<head>
    <title>MY Library - Registro de Biblioteca pessoal</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/books3.png" type="image/png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet"  href="css/my-library.css">

    
</head>

<body>	
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
		<div class="container">
			<div class="navbar-header">			
				<a href="index.php" class="navbar-brand">
					<img src="imgs/books3.png" alt="My Library" height="35">     My Library
				</a>
			</div>
		<div>
				<ul class="nav navbar-nav">
					<li><a class="btn btn-primary" href="painel-controle.php">Painel de Controle</a></li>
<?php
	if(!usuarioEstaLogado()) { 
?>
					<li><a class="btn btn-primary" href="usuario-novo-formulario.php">Cadastre-se</a></li>
<?php 
	}
?>
					<li><a class="btn btn-primary" href="contato.php">Contato</a></li>
				</ul>
			</div>	
			<div>
				<ul class="nav navbar-nav">
<?php
	if(usuarioEstaLogado()) { ?>
					<li class="navbar-text"></li>
					<li class="navbar-text text-white">Olá, <b><?=usuarioLogado()?></b>!</li>	
					<li>
						<a class="btn btn-primary" href="alterar-senha.php"><i class="material-icons icones">settings</i></a></li>			
					<li>
						<a class="btn btn-primary" href="logout.php"><i class="material-icons-outlined icones">exit_to_app</i></a>
					</li>
<?php 
	}	
	else {
?>
					<li class="navbar-text text-white">Olá, visitante! Faça <a href="index.php">login</a>!</li>
<?php 
	}	
?>
				</ul>	
			</div>	
		</div>			
	</nav>
    <div class="container">
        <div class="principal">