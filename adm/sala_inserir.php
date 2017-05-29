<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	include '../cls/conexaoClass.php';
?>


<div id="x">
	<form action="?b=svi" method="POST" name="foto" enctype="multipart/form-data">
		<table>
			<tr>
				<th id="cor">
					Nome Sala
				</th>
				<td>
					<input type="text" class="form-control" name="NomeSala" required>
				</td>
			</tr>
			<tr>
				<td colspan="2" >
					<button type="submit" class="btn btn-success">Inserir <span class="glyphicon glyphicon-ok"></span></button>
					<button type="reset" class="btn btn-info">Limpar <span class="glyphicon glyphicon-cleaning"></span></button>
					<button type="button" class="btn btn-danger" onclick="javascript: location='index.php?b=s';">Cancelar</button>
				</td>
			</tr>
		</table>
	</form>
</div>