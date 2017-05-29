<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	include '../cls/reservadasClass.php';
	include '../cls/conexaoClass.php';
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
						if ($linha['NomeUsuario']==$_SESSION['Nome']){
						?>
							<a href="?b=desreservar&IdSala=<?php echo $IdSala;?>&Data=<?php echo $DataReserva;?>&Hora=<?php echo $i;?>">
								<?php echo "Desreservar";?>
							</a>
						<?php
						}
						else{
							echo "Reservada";
						}
						$reservada=0;
					}
				}
				if($reservada==$i){
				?>
					<a href="?b=reservar&IdSala=<?php echo $IdSala;?>&Data=<?php echo $DataReserva;?>&Hora=<?php echo $i;?>">
						<?php echo "Reservar";?>
					</a>
				<?php
				}
				?>
			</th>
		</tr>
	<?php
	}
	?>
</table>