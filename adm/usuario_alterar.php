<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	$IdUsuario = $_GET["IdUsuario"];
?>

<?php
	include '../cls/usuariosClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$usuario = new usuariosClass();
	$usuario -> usuarioEspecifico($IdUsuario);
?>

<div id="x">
	<table class='tabela'>
			
		<?php
			$result = $usuario -> getConsulta();
			if($linha = $result -> fetch_assoc())
			{
		?>

		<form action="?b=uva&IdUsuario=<?php echo $IdUsuario?>" method='POST'>
			<tr>
				<th id="cor">
					Nome Usuário
				</th>
				<td>
					<input type="text" class="form-control" value="<?php echo $linha['NomeUsuario'];?>" name="NomeUsuario" required>
				</td>
			</tr>
			<tr>
				<th id="cor">
					Senha
				</th>
				<td>
					<input type="password" maxlength="8" class="form-control" name="Senha" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-success">Alterar <span class="glyphicon glyphicon-ok"></span></button>
					<button type="button" class="btn btn-danger" onclick="javascript: location='index.php?b=ue&IdUsuario=<?php echo $IdUsuario;?>';" >Cancelar</button>
				</td>
			</tr>
		<?php
			}
		?>
		</form>
	</table>
</div>