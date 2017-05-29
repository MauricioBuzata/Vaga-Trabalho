<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php	
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if($msg==0)
		{
?>
			<h4 id="cor">Usuário excluido com sucesso!</h4>
<?php
		}
		if($msg==1)
		{
?>
			<h4 id="cor">Usuario criado com sucesso!</h4>
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
	$usuario -> mostrar();
?>

<div>
	<?php
		if ($_SESSION['Nome']=='adm' AND $_SESSION['Senha']=='adm'){
	?>
	<h4><a href="?b=ui">Novo</a></h4>
	<?php
	}
	?>
</div>

<table class='tabela'>
	<?php
		$limitePorLinha=0;
		$result = $usuario -> getConsulta();
		while($linha = $result -> fetch_assoc())
		{
			if ($_SESSION['Nome']=='adm' AND $_SESSION['Senha']=='adm'){
				$limitePorLinha++;
				if($limitePorLinha%10==0){
		?>
					<tr>
						<td>
							<?php echo"<br>";?>
						</td>
					</tr>
					<tr>
						<td id="conteudo">
							<a href="?b=ue&IdUsuario=<?php echo $linha['IdUsuario'];?>"><img id="imagem" src="../img/usuario.jpg"/></a>
							<br>
							<a href="?b=ue&IdUsuario=<?php echo $linha['IdUsuario'];?>"><?php echo $linha['NomeUsuario'];?></a>
						</td>

		<?php
				}
				else{
		?>
					<td id="conteudo">
							<a href="?b=ue&IdUsuario=<?php echo $linha['IdUsuario'];?>"><img id="imagem" src="../img/usuario.jpg"/></a>
						<br>
						<a href="?b=ue&IdUsuario=<?php echo $linha['IdUsuario'];?>"><?php echo $linha['NomeUsuario'];?></a>
					</td>
		<?php
				}
				if($limitePorLinha%9==0){
		?>
					</tr>
		<?php
				}
			}
			else{
				if ($_SESSION['Nome']==$linha['NomeUsuario'] AND $_SESSION['Senha']==$linha['Senha']){
		?>
					<td id="conteudo">
							<a href="?b=ue&IdUsuario=<?php echo $linha['IdUsuario'];?>"><img id="imagem" src="../img/usuario.jpg"/></a>
						<br>
						<a href="?b=ue&IdUsuario=<?php echo $linha['IdUsuario'];?>"><?php echo $linha['NomeUsuario'];?></a>
					</td>
		<?php
				}
			}
		}
		?>
	
</table>
