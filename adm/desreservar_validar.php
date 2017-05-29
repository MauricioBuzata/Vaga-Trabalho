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
	include '../cls/usuariosClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$IdSala=$_GET["IdSala"];
	$Data=$_GET["Data"];
	$Hora=$_GET["Hora"];
	$DataHorario = $Data." ".$Hora.":00";
?>	
	
<?php
	$reserva = new reservadasClass();
	$reserva -> desreservar($IdSala, $DataHorario);
	
	header('Location: index.php?b=se&IdSala='.$IdSala.'&msg=3');	
	
?>
