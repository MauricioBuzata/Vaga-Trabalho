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
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if($msg==0)
		{
?>
			<h4 id="cor">Sala alterada com sucesso!</h4>
<?php
		}
		if($msg==1)
		{
?>
			<h4 id="cor">Esta sala não pode ser excluida pois há reservas ativas!</h4>
<?php
		}
		if($msg==2)
		{
?>
			<h4 id="cor">Reserva feita com sucesso!</h4>
<?php
		}
		if($msg==3)
		{
?>
			<h4 id="cor">Reserva desfeita com sucesso!</h4>
<?php
		}
		if($msg==4)
		{
?>
			<h4 id="cor">Você já possui reserva neste mesmo horário em outra sala!</h4>
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
	$sala -> salaEspecifica($IdSala);
	
	$sala2 = new salasClass();
	$sala2 -> salaEspecifica($IdSala);
	
	$sala3 = new salasClass();
	$sala3 -> salaEspecifica($IdSala);
?>

<br>

<div id="x">
	<table class='tabela' id="especifico">

		<?php
			$result = $sala -> getConsulta();
			if($linha = $result -> fetch_assoc())
			{
		?>
				<tr>
					<td rowspan="7"> 
						<img src="../img/sala.jpg">	
					</td>
				</tr>
				<tr>
					<th id="cor">Código</th>
					<td id="conteudo"><?php echo $linha['IdSala'];?></td>
				</tr>
				<tr>
					<th id="cor">Nome Sala</th>
					<td id="conteudo"><?php echo $linha['NomeSala'];?></td>
				</tr>
		<?php
			}
		?>
	</table>
</div>
<?php
	if ($_SESSION['Nome']=='adm' AND $_SESSION['Senha']=='adm'){
?>
<div id="y">
	<table class='tabela' id="especifico">

		<?php
			$result2 = $sala2 -> getConsulta();
			if($linha2 = $result2 -> fetch_assoc())
			{
		?>
			<tr>
				<td></td>
				<td><a href="?b=sa&IdSala=<?php echo $linha2['IdSala'];?>">Alterar</a></td>
			</tr>			
			<tr>
				<td></td>
				<td><a href="?b=sex&IdSala=<?php echo $linha2['IdSala'];?>">Excluir</a></td>
			</tr>
		<?php
			}
		?>
	</table>
</div>
<?php
}
?>
<form action="?b=r" method="POST" name="foto" enctype="multipart/form-data">
	<div id="x">
		<table class='tabela' id="especifico">
			<?php
				$result3 = $sala3 -> getConsulta();
				if($linha3 = $result3 -> fetch_assoc())
				{
			?>
				<tr>
					<th id="cor">
						Reservas 
					</th>
					<td>
						<input type="date" class="form-control" name="DataReserva" required>
						<input type="hidden" class="form-control" value="<?php echo $linha3['IdSala'];?>" name="IdSala">
					</td>
					<td>
						<button type="submit" class="btn btn-success">Verificar <span class="glyphicon glyphicon-ok"></span></button>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</div>
</form>