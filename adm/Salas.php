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
			<h4 id="cor">Sala excluida com sucesso!</h4>
<?php
		}
		if($msg==1)
		{
?>
			<h4 id="cor">Sala criada com sucesso!</h4>
<?php
		}
	}	
?>

<?php
	include '../cls/salasClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$sala = new salasClass();
	$sala -> mostrar();
?>

<div>
	<?php
		if ($_SESSION['Nome']=='adm' AND $_SESSION['Senha']=='adm'){
	?>
	<h4><a href="?b=si">Nova</a></h4>
	<?php
	}
	?>
</div>

<table class='tabela'>
	<?php
		$limitePorLinha=0;
		$result = $sala -> getConsulta();
		while($linha = $result -> fetch_assoc())
		{
			$limitePorLinha++;
			if($limitePorLinha%6==0){
	?>
				<tr>
					<td>
						<?php echo"<br>";?>
					</td>
				</tr>
				<tr>
					<td id="td">
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><img src="../img/sala.jpg"/></a>
						<br>
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><?php echo $linha['NomeSala'];?></a>
						<br>
					</td>

	<?php
			}
			else{
	?>
					<td id="td">
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><img src="../img/sala.jpg"/></a>
						<br>
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><?php echo $linha['NomeSala'];?></a>
						<br>
					</td>
	<?php
			}
			if($limitePorLinha%5==0){
	?>
				</tr>
	<?php
			}
		}
	?>
</table>

