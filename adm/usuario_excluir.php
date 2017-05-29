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

		<form action="?b=uve&IdUsuario=<?php echo $IdUsuario?>" method='POST'>
			<tr>
				<th id="cor">Código </th>
				<td id="conteudo"><?php echo $linha['IdUsuario'];?></td>
			</tr>
			<tr>
				<th id="cor">Nome Usuário</th>
				<td id="conteudo"><?php echo $linha['NomeUsuario'];?></td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-success">Excluir <span class="glyphicon glyphicon-remove"></span></button>
					<button type="button" class="btn btn-danger" onclick="javascript: location='index.php?b=ue&IdUsuario=<?php echo $IdUsuario;?>';" >Cancelar</button>
				</td>
			</tr>
		<?php
			}
		?>
		</form>
	</table>
</div>