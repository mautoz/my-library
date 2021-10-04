<?php require_once("cabecalho.php"); 
	  require_once("logica-usuario.php");
	  require_once("funcoes-painel.php");
?>

<?php
	mostraAlerta("danger");
	if(usuarioEstaLogado()) { 
?>
	<h1 class="pb-3">Painel de Controle</h1>
	<h2 class="text-left"><i class="material-icons md-48 icones">person</i> Seus trabalhos recentes</h2>
	<hr class="pb-3">
	<section class="container-fluid" id="experimentos-usuarios-atual">
			<div class="card-deck row justify-content-center">
<?php
		$linhasU = listarTrabalhoRecenteUser ($conexao, $_SESSION["usuario_logado"]);
		foreach ($linhasU as $linhaU) {
?>
				<div class="p-0 m-0 col-12 col-xl-3">
					<div class="card col-*-*">
						<div class="card-header">
						  	<b><?=$linhaU['nomeExperimento']; ?></b>		  		
						</div>
						<div class="card-body">
						    <h6><b>Data:</b> <?=$linhaU['reg_date']; ?></h6>					 
						    <p class="card-text"><b>Descrição:</b> <?=$linhaU['descricao']; ?></p>
						    <form action="exibir-relatorio.php" method="POST">
								<input type="hidden" name="id_tabela" value="<?=$linhaU['id'];?>">
								<button class="btn btn-success"><i class="material-icons md-18 white icones">search</i>Visualizar</button>
							</form>
						</div>
					</div>
				</div>
<?php
		}
?>						
				<div class="p-0 m-0 col-12 col-xl-3" id="card-especial">
					<div class="card col-*-*">
						<div class="card-header">
						  	<b>Novo</b>		  		
						</div>
						<div class="card-body">
						    <h6></h6>					 
						    <p class="card-text">Crie um novo experimento.</p>
						    <form action="criar-tabela.php" method="POST">
								<button type="submit" class="btn btn-success btn-block"><i class="material-icons md-18 white icones">add</i> Novo</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php 
		//var_dump(buscaUsuarioTabela($conexao, $_SESSION["usuario_logado"]));
		if (usuarioAltoNivel($conexao, $_SESSION["usuario_logado"])) {
?>
	<h2 class="text-left pt-5"><i class="material-icons black md-48 icones">people</i> Trabalhos recentes da equipe</h2>
	<hr class="pb-3">
	<section class="container-fluid" id="experimentos-todos-usuarios">
			<div class="card-deck row justify-content-center">
<?php
			$linhas = listarTrabalhoRecenteEquipe ($conexao);
			foreach ($linhas as $linha) {
?>
				    <div class="p-0 m-0 col-12 col-xl-3">
				    	<div class="card">
						  <div class="card-header">
						  	<b><?=$linha['nomeExperimento']; ?></b>		  		
						  </div>
						  <div class="card-body">
						    <h6 class="card-title"><b>Autor:</b> <?=$linha['nomeUser']; ?></h6>
						    <h6><b>Data:</b> <?=$linha['reg_date']; ?></h6>					 
						    <p class="card-text"><b>Descrição:</b> <?=$linha['descricao']; ?></p>
						    <form action="exibir-relatorio.php" method="POST">
								<input type="hidden" name="id_tabela" value="<?=$linha['id'];?>">
								<button class="btn btn-success"><i class="material-icons md-18 white icones">search</i>Visualizar</button>
							</form>
						  </div>
						</div>
					</div>
<?php
			}
?>
			</div>
		</section>
<?php		
		}

	} else {

		if (array_key_exists("usuario-removido", $_GET) && $_GET["usuario-removido"] == "true") {
?>
		<p class="alert alert-success">Usuário removido com sucesso!</p>
<?php
		}
?>
		<div class="text-center">
			<picture>
				<img src="imgs/library.jpg" alt="Library" class="center">
			</picture>
		</div>
		<h1 class="pb-3 text-center">Bem-vindo(a)!</h1>
		
		
		<div class="container pt-5 col-md-6 mb-3 justify-content-md-center shadow p-3 mb-5 bg-light rounded">
			<h2 class="text-center"><i class="material-icons md-48 white icones">account_circle</i>Login</h2>
			<table class="table">
				<form action="login.php" method="post">	

					<tr>
						<td>E-mail:</td>
						<td><input type="email" name="email" class="form-control"></td>
					</tr>
					<tr>
						<td>Senha:</td>
						<td><input type="password" name="senha" class="form-control"></td>
					</tr>
					<tr>
						<td><button class="btn btn-primary">Login</button></td>
					</tr>	
				</form>
			</table>
			<p class="h6 text-center text-black">Caso você tenha esquecido a senha, clique <a href="recuperar-senha.php">aqui</a> para recuperá-la!</p>
		</div>
<?php }?>
<?php include("rodape.php"); ?>