<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	$IdSala = $_GET["IdSala"];
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

		<form action="?b=sve&IdSala=<?php echo $IdSala?>" method='POST'>
			<tr>
				<th id="cor">Código </th>
				<td id="conteudo"><?php echo $linha['IdSala'];?></td>
			</tr>
			<tr>
				<th id="cor">Nome Sala </th>
				<td id="conteudo"><?php echo $linha['NomeSala'];?></td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-success">Excluir <span class="glyphicon glyphicon-remove"></span></button>
					<button type="button" class="btn btn-danger" onclick="javascript: location='index.php?b=se&IdSala=<?php echo $IdSala;?>';">Cancelar</button>
				</td>
			</tr>
		<?php
			}
		?>
		</form>
	</table>
</div>