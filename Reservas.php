<?php
	include '/cls/reservadasClass.php';
	include '/cls/conexaoClass.php';
?>

<?php
	$IdSala=$_POST['IdSala'];
	$DataReserva=$_POST['DataReserva'];
?>

<table class='tabela'>
	<?php
	$limitePorLinha=0;
	$reservada=0;
	for ($i=0; $i <24; $i++) {
		$reservada=$i;
	?>
		<tr>
			<th>
				<?php echo $i.":00 Hora(s)";?>
			</th>
			<th>
			<?php echo "  ...  "?>
			</th>
			<th>
				<?php
				$reserva = new reservadasClass();
				$reserva -> verificar($IdSala, $DataReserva);
				$result = $reserva -> getConsulta();
				while($linha = $result -> fetch_assoc())
				{

					if ($i==$linha['hora']){
						echo "Reservada";
						$reservada=0;
					}
				}
				if($reservada==$i){
					echo "Livre";
				}
				?>
			</th>
		</tr>
	<?php
	}
	?>
</table>