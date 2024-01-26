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
			<form action="controlServico.php" method="post">
		        <!--Fazer formulario de escolha (checkbox) no tamanho do cabelo (cabelo, unha pele)-->
		        <p>Digite o tipo de serviço:</p> <p><input type="checkbox" id="vehicle1" name="tipo" value="cabelo">
												<label for="cabelo"> Cabelo</label><br>
												<input type="checkbox" id="vehicle2" name="tipo" value="unha">
												<label for="unha"> Unha</label><br>
												<input type="checkbox" id="vehicle3" name="tipo" value="pele">
												<label for="pele"> Pele</label></p>		
		     

		        <p>Digite o serviço:</p> <input type="text" name="servico" size="20">
		        <p>Digite o Código do serviço:</p> <input type="text" name="codservico" size="20">
		        <p>Digite o preço:</p> <input type="text" name="preco" size="20">
				<input type="hidden" value="Incluir">
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
			<form action="controlServico.php" method="post">
			    <p>Código do serviço:</p> <input type="text" name="codservico" size="20">
			    <p>Digite o serviço:</p> <input type="text" name="servico" size="20">
				<input type="hidden" value="logar">
			    <input type="submit" name="acao" value="logar">
			</form>
		</div>
	</div>
	<div id="cabecalho">
		<img src="img/logo.png">
	</div>
		<div class="fundo3">
			<div class="alterarusu">
				<h1>Alterar</h1>
				<form action="controlServico.php" method="post">
			        <p>Digite o código do serviço: <input type="text" name="codservico" size="40"></p>
			        <p>Digite o serviço: <input type="text" name="servico" size="57"></p>
					<input type="hidden" value="Alterar">              
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
				<h1>Consultar Serviço</h1>
					<form action="controlServico.php" method="post">
					    <p>Digite o Código do Serviço:<p> <input type="text" name="codservico" size="45">
					    <br><br>
						<input type="hidden" value="consultarServico">
					    <input type="submit" name="acao" value="consultarServico">
						<input type="reset">
					</form>
					<form action="controlServico.php" method="post">
						<input type="hidden" name="acao" value="Nova Consulta">
						<input type="submit" value="Nova Consulta">
					</form>
					<center>
						<b>
							Detalhe dos serviços
						</b>
					</center>
					<table border="1">
						<tr>
						<td><b>Tipo</b></td>
						<td><b>Serviço</b></td>
						<td><b>Código do Serviço</b></td>
						<td><b>Preço</b></td>
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
					<form action="controlServico.php" method="post">
				        <p>Consultar todos os serviços</p>
						<input type="hidden" value="consultarFull">
				        <input type="submit" name="acao" value="consultarFull">
				    </form>
					<form action="controlServico.php" method="post">   
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
						<td><b>Tipo</b></td>
						<td><b>Serviço</b></td>
						<td><b>Código do Serviço</b></td>
						<td><b>Preço</b></td>
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
			<h1>Excluir Serviço</h1>
			<form action="controlServico.php" method="post">
			        <p>Digite o código do serviço: <input type="text" name="codservico" size="22"></p>
					<input type="hidden" value="Excluir">
			        <input type="submit" name="acao" value="Excluir">
			    </form>
		</div>
	</div>
	<div id="cabecalho">
		
	</div>
</body>
</html>
