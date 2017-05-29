<?php
	$IdSala = $_GET["IdSala"];
?>

<?php
	include '/cls/salasClass.php';
	include '/cls/conexaoClass.php';
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
						<img src="img/sala.jpg">	
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

<form action="?b=r" method="POST" name="foto" enctype="multipart/form-data">
	<div id="x">
		<table class='tabela' id="especifico">
			<?php
				$result2 = $sala2 -> getConsulta();
				if($linha2 = $result2 -> fetch_assoc())
				{
			?>
				<tr>
					<th id="cor">
						Reservas 
					</th>
					<td>
						<input type="date" class="form-control" name="DataReserva" required>
						<input type="hidden" class="form-control" value="<?php echo $linha2['IdSala'];?>" name="IdSala">
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