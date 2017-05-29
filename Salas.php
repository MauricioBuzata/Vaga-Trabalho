<?php
	include 'cls/salasClass.php';
	include 'cls/conexaoClass.php';
?>

<?php
	$sala = new salasClass();
	$sala -> mostrar();
?>

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
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><img src="img/sala.jpg"/></a>
						<br>
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><?php echo $linha['NomeSala'];?></a>
						<br>
					</td>

	<?php
			}
			else{
	?>
					<td id="td">
						<a href="?b=se&IdSala=<?php echo $linha['IdSala'];?>"><img src="img/sala.jpg"/></a>
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