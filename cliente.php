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
			}
			?>
		</b>
	</center>




	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
	<div class="fundo1">
		<div class="cadastrousu">
			<h1>Cadastro</h1>
			<form action="controlCliente.php" method="post">
        		<p>Digite o Nome:</p> <input type="text" name="nome" size="35">                
		        <p>Digite o CPF:</p> <input type="text" name="cpf" size="35">
		        <p>Digite o Tamanho do cabelo:</p> <p><input type="checkbox" id="vehicle1" name="tamanho_cabelo" value="pequeno">
												  <label for="pequeno"> Pequeno</label><br>
												  <input type="checkbox" id="vehicle2" name="tamanho_cabelo" value="medio">
												  <label for="medio"> Médio</label><br>
												  <input type="checkbox" id="vehicle3" name="tamanho_cabelo" value="grande">
												  <label for="grande"> Grande</label></p>		
		        <p>Digite o Código do serviço:</p> <input type="text" name="codservico" size="35">		        
		        <p>Digite o Código do Funcionário:</p> <input type="text" name="codfuncionario" size="35">
				
				
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
			<form action="controlCliente.php" method="post">
			    <p>Digite o CPF:</p> <input type="text" name="cpf" size="25">
			    <p>Digite o nome:</p> <input type="text" name="nome" size="30">

				<input type="hidden" name="acao" value="logar">
			    <input type="submit" name="acao" value="logar">
			</form>
			<form action="controlCliente.php" method="post">
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
				<form action="controlCliente.php" method="post">
			        <p>Digite o CPF: <input type="text" name="cpf" size="68"></p>
			        <p>Digite o código do funcionário: <input type="text" name="codfuncionario" size="40"></p>			 
			        <p>Digite o nome: <input type="text" name="nome" size="60"></p>
			        <p>Digite o código do serviço: <input type="text" name="codservico" size="40"></p>

					<input type="hidden" name="acao" value="Alterar">
			        <input type="submit" name="acao" value="Alterar">
			    </form>
			</div>
		</div>
	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
	<div class="fundo4">
		<div class="consultarusu">
			<div class="consultarrusu">
				<h1>Consultar Cliente</h1>
					<form action="controlCliente.php" method="post">
					    <p>Digite o CPF:</p> <input type="text" name="cpf" size="45">
					    <br><br>
					    <input type="hidden" name="acao" value="consultarCliente">
						<input type="submit" value="consultarCliente">
						<input type="reset">
					</form>
					<form action="controlCliente.php" method="post">
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
						<td><b>Nome</b></td>
						<td><b>CPF</b></td>
						<td><b>Tamanho do Cabelo</b></td>
						<td><b>Código do Funcionário</b></td>
						<td><b>Código do Serviço</b></td>
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
					<form action="controlCliente.php" method="post">
				        <p>Consultar todos os clientes</p>
				        <input type="hidden" name="acao" value="consultarFull">
						<input type="submit" value="consultarFull">
				    </form> 
					<form action="controlCliente.php" method="post">   
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
						<td><b>Nome</b></td>
						<td><b>CPF</b></td>
						<td><b>Tamanho do Cabelo</b></td>
						<td><b>Código do Funcionário</b></td>
						<td><b>Código do Serviço</b></td>
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
			<h1>Excluir Cliente</h1>
			<form action="controlCliente.php" method="post">
		        <p>Digite o CPF: <input type="text" name="cpf" size="40"></p>

				<input type="hidden" name="acao" value="Excluir">
		        <input type="submit" name="acao" value="Excluir">
		    </form>
		</div>
	</div>
	<div id="cabecalho">
		
	</div>
</body>
</html>









</body>
</html>