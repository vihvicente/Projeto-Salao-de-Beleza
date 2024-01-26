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
			<form action="controlFuncionario.php" method="post">
		        <p>Digite o nome:</p><input type="text" name="nome" size="20">
		        <p>Digite o código do funcionário:</p> <input type="text" name="codfuncionario" size="20">
		        <!--Formulário checkbox (manhã, tarde, noite)-->
		        <p>Digite o turno:<p> <p><input type="checkbox" id="vehicle1" name="turno" value="manha">
										 <label for="manha"> Manhã</label><br>
										 <input type="checkbox" id="vehicle2" name="turno" value="tarde">
										 <label for="tarde"> Tarde</label><br>
										 <input type="checkbox" id="vehicle3" name="turno" value="noite">
										 <label for="noite"> Noite</label></p>

					
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
			<form action="controlLogarFun.php" method="post">
			    <p>Código do funcionário:</p> <input type="text" name="codfuncionario" size="20">
			    <p>Digite o nome:</p> <input type="text" name="nome" size="30">

			    <input type="hidden" name="acao" value="logar">
				<input type="submit" name="acao" value="logar">

			</form>
			<form action="controlLogarFun.php" method="post">
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
				<form action="controlFuncionario.php" method="post">
			        <p>Digite o código do funcionário: <input type="text" name="codfuncionario" size="40"></p>
			        <p>Digite o nome: <input type="text" name="nome" size="66"></p>
			        
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
				<h1>Consultar Funcionário</h1>
					<form action="controlFuncionario.php" method="post">
					    <p>Digite o código do funcionário:</p> <input type="text" name="codfuncionario" size="45">   <br><br>
					    <input type="hidden" name="acao" value="consultarFuncionario">
						<input type="submit" name="acao" value="consultarFuncionario">
						<input type="reset">
					</form>
					
	
			<form action="controlFuncionario.php" method="post">
						<input type="hidden" name="acao" value="Nova Consulta">
						<input type="submit" value="Nova Consulta">
					</form>
					<center>
						<b>
							Detalhe dos funcionários
						</b>
					</center>
					<table border="1">
						<tr>
						<td><b>Nome</b></td>
						<td><b>Código do Funcionário</b></td>
						<td><b>Turno</b></td>
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
					<form action="controlFuncionario.php" method="post">
				        <p>Consultar todos os funcionários</p>
				        <input type="submit" name="acao" value="consultarFull">
				    </form> 
					<form action="controlFuncionario.php" method="post">   
					<input type="hidden" name="acao" value="Nova Consulta">
					<input type="submit" value="Nova Consulta">
					</form>
					<center>
						<b>
							Lista de Todos os Funcionários
						</b>
					</center>
					<table border="1">
						<tr>
						<td><b>Nome</b></td>
						<td><b>Código do Funcionário</b></td>
						<td><b>Turno</b></td>
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
			<h1>Excluir Funcionário</h1>
			<form action="controlFuncionario.php" method="post">
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



