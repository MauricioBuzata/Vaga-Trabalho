<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<form action="?b=uvi" method="POST" name="foto" enctype="multipart/form-data">
	<div id="x">
		<table>
			<tr>
				<th id="cor">
					Nome Usuário 
				</th>
				<td>
					<input type="text" class="form-control" name="NomeUsuario" required>
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
					<button type="submit" class="btn btn-success">Inserir <span class="glyphicon glyphicon-ok"></span></button>
					<button type="reset" class="btn btn-info">Limpar <span class="glyphicon glyphicon-cleaning"></span></button>
					<button type="button" class="btn btn-danger" onclick="javascript: location='index.php?b=u';">Cancelar</button>
				</td>
			</tr>
		</table>
	</div>
</form>