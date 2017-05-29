<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	include '../cls/salasClass.php';
	include '../cls/reservadasClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$IdSala=(int)$_GET["IdSala"];
?>	

<?php
	$reservada = new reservadasClass();
	$reservada -> reservadaEspecifica($IdSala,1);
	$resultR = $reservada -> getConsulta();
	if(!($linhaR = $resultR -> fetch_assoc()))
	{	

		$sala = new salasClass();
		$sala -> excluir($IdSala);

		header('Location: index.php?b=s&msg=0');		
	}
	else
	{
		header('Location: index.php?b=se&IdSala='.$IdSala.'&msg=1');
	}
?>
