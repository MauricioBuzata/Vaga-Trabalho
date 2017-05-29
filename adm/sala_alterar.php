<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	$IdSala = $_GET['IdSala'];
?>

<?php
	include '../cls/salasClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$sala = new salasClass();
	$sala -> salaEspecifica($IdSala);	
?>

<div id="x">
	<table class='tabela'>
			
		<?php
			$result = $sala -> getConsulta();
			if($linha = $result -> fetch_assoc())
			{
			
		?>

		<form action="?b=sva&IdSala=<?php echo $IdSala?>" method='POST'>
			<tr>
				<th id="cor">
					Nome Sala
				</th>
				<td>
					<input type="text" class="form-control" value="<?php echo $linha['NomeSala'];?>" name="NomeSala" required>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-success">Alterar <span class="glyphicon glyphicon-ok"></span></button>
					<button type="button" class="btn btn-danger" onclick="javascript: location='index.php?b=se&IdSala=<?php echo $IdSala;?>';" >Cancelar</button>
				</td>
			</tr>
		<?php
			}
		?>
		</form>
	</table>
</div>
