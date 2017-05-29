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
	$reserva -> reservaClienteHorarioEspecifico($_SESSION['Nome'], $DataHorario);
	
	$result = $reserva -> getConsulta();
	if (empty($result)){
		header('Location: index.php?b=se&IdSala='.$IdSala.'&msg=4');
	}else{
		$reserva1 = new reservadasClass();
		$reserva1 -> reservar($IdSala, $_SESSION['Nome'], $DataHorario);
		
		header('Location: index.php?b=se&IdSala='.$IdSala.'&msg=2');	
	}

?>