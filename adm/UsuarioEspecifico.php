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
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if($msg==0)
		{
?>
			<h4 id="cor">Usuário alterado com sucesso!</h4>
<?php
		}
		if($msg==1)
		{
?>
			<h4 id="cor">Este usuário não pode ser excluido, pois está vinculado à alguma reserva ativa!</h4>
<?php
		}
	}	
?>

<?php
	include '../cls/usuariosClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$usuario = new usuariosClass();
	$usuario -> usuarioEspecifico($IdUsuario);
	$usuario2 = new usuariosClass();
	$usuario2 -> usuarioEspecifico($IdUsuario);
?>

<br>

<div id="x">
	<table class='tabela' id="especifico">
		
		<?php
			$result = $usuario -> getConsulta();
			if($linha = $result -> fetch_assoc())
			{
		?>
				<tr>
					<td rowspan="9"> 
						<img src="../img/usuario.jpg">	
					</td>
				</tr>
				<tr>
					<th id="cor">Código</th>
					<td id="conteudo"><?php echo $linha['IdUsuario'];?></td>
				</tr>
				<tr>
					<th id="cor">Nome Usuário</th>
					<td id="conteudo"><?php echo $linha['NomeUsuario'];?></td>
				</tr>
		<?php
			}
		?>
	</table>
</div>

<div id="y">
	<table class='tabela' id="especifico">
		
		<?php
			$result2 = $usuario2 -> getConsulta();
			if($linha2 = $result2 -> fetch_assoc())
			{
		?>
				<tr>
					<td></td>
					<td><a href="?b=ua&IdUsuario=<?php echo $linha2['IdUsuario'];?>">Alterar</a></td>
				</tr>
				<?php
					if ($_SESSION['Nome']=='adm' AND $_SESSION['Senha']=='adm'){
				?>				
				<tr>
					<td></td>
					<td><a href="?b=uex&IdUsuario=<?php echo $linha2['IdUsuario'];?>">Excluir</a></td>
				</tr>
				<?php
				}
				?>
		<?php
			}
		?>
	</table>
</div>

