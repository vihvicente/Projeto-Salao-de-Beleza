<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Mãos de Fada</title>
</head>
<body>


	<?php session_start(); ?>
	<center>
		<b>
			<?php if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
			}?>
		</b>
	</center>



	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
	<div class="fundo1">
		<div class="cadastrousu">
			<h1>Cadastro</h1>
			<form action="controlUsuario.php" method="post">
	        	<p>Digite o login:</p></p> <input type="text" name="login" size="35">
	        	<p>Digite a senha:</p> <input type="text" name="senha" size="35">	       		
	    		<p>Digite o nome:</p> <input type="text" name="nome" size="35">	        	
	        	<p>Digite o perfil:</p> <input type="text" name="perfil" size="35">	        	
	        	<p>Digite a data de nascimento:</p> <input type="text" name="dataNasc" size="35">	        	
	        	<input type="submit" name="acao" value="Incluir">
	    	</form>
		</div>
	</div>
	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
	<div class="fundo2">
		<div class="loginusu">
			<h1>Login</h1>
			<h4>----------------------------------------------</h4>
			<form action="controlLogar.php" method="post">
    			<p>Digite o login:</p>
    			 <input type="text" name="login" size="30">
    			<p>Digite a senha:</p> 
    			 <input type="text" name="senha" size="20">
				 <input type="hidden" name="acao" value="logar">
   				<input type="submit" value="logar">
			</form>
			<form action="controlLogar.php" method="post">
				<input type="hidden" name="acao" value="Sair">
   				<input type="submit" value="Sair">
			</form>
		</div>
	</div>
	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
		<div class="fundo3">
			<div class="alterarusu">
				<h1>Alterar</h1>
				 <form action="controlUsuario.php" method="post">			       
			        <p>Digite o login: <input type="text" name="login" size="40"></p>			        
			        <p>Digite o senha: <input type="text" name="senha" size="40"></p>			        
			        
					<input type="hidden" name="acao" value="Alterar Senha">
			        <input type="submit" name="acao" value="Alterar Senha">
    			</form>
			</div>
		</div>
	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
	<div class="fundo4">
		<div class="consultarusu">
			<div class="consultarrusu">
				<h1>Consultar Usuário</h1>
					<form action="controlUsuario.php" method="post">
					    <p>Digite o login:</p> <input type="text" name="login" size="45">
					    <br><br>
					    <input type="hidden" name="acao" value="consultarUsuario">
						<input type="submit" value="consultarUsuario">
						<input type="reset">
					</form>
					<form action="controlUsuario.php" method="post">
						<input type="hidden" name="acao" value="Nova Consulta">
						<input type="submit" value="Nova Consulta">
					</form>
					<center>
						<b>
							Detalhe dos usuários
						</b>
					</center>
					<table border="1">
						<tr>
						<td><b>Login</b></td>
						<td><b>Nome</b></td>
						<td><b>Data de Nascimento</b></td>
						<td><b>Perfil</b></td>
						</tr>
						<?php
						if(isset($_SESSION)){
							foreach($_SESSION as $linha => $value){
								foreach ($_SESSION[$lista] as $linha => $chave){
									echo '<tr>';
									foreach ($_SESSION[$linha] as $campo){
										echo '<td>' . $campo . '</td>';
									}
									echo '</tr>';
								}
							}
						}
						?>
					</table>

			</div>		




			<div class="consultarrrusu">
					<h1>Consultar Full</h1>
					<form action="controlUsuario.php" method="post">
				        <p>Consultar todos os usuários</p>
				        <input type="hidden" name="acao" value="consultarFull">
						<input type="submit" value="consultarFull">
				    </form>
					<form action="controlUsuario.php" method="post">   
					<input type="hidden" name="acao" value="Nova Consulta">
					<input type="submit" value="Nova Consulta">
					</form>
					<center>
						<b>
							Lista de Todos os usuários
						</b>
					</center>
					<table border="1">
						<tr>
						<td><b>Login</b></td>
						<td><b>Nome</b></td>
						<td><b>Data de Nascimento</b></td>
						<td><b>Perfil</b></td>
						</tr>
						<?php
						if(!empty($_SESSION['lista'])){
							foreach($_SESSION as $lista => $value){
								foreach ($_SESSION[$lista] as $linha => $chave){
									echo '<tr>';
									foreach ($_SESSION[$lista][$linha] as $campo){
										echo '<td>' . $campo . '</td>';
									}
									echo '</tr>';
								}
							}
						}
						?>
					</table>
			</div>
		</div>
	</div>
	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
	<div class="fundo6">
		<div class="excluirusu">
			<h1>Excluir Usuário</h1>
			<form action="controlUsuario.php" method="post">
		        <p>Digite o nome: <input type="text" name="nome" size="40"></p>

				<input type="hidden" name="acao" value="Excluir">
		        <input type="submit" name="acao" value="Excluir">
		    </form>
		</div>
	</div>
	<div id="cabecalho">
		
	</div>
</body>
</html>











