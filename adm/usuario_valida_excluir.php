<?php 
	if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
	{
		unset($_SESSION['Nome']);
		unset($_SESSION['Senha']);
				
		header('location:login.php');
	}
?>

<?php
	include '../cls/usuariosClass.php';
	include '../cls/reservadasClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$IdUsuario=(int)$_GET["IdUsuario"];
?>	

<?php
	$reservada = new reservadasClass();
	$reservada -> reservadaEspecifica($IdUsuario,2);
	$resultR = $reservada -> getConsulta();
	if(!($linhaR = $resultR -> fetch_assoc()))
	{	

		$usuario = new usuariosClass();
		$usuario -> excluir($IdUsuario);

		header('Location: index.php?b=u&msg=0');		
	}
	else
	{
		header('Location: index.php?b=ue&IdUsuario='.$IdUsuario.'&msg=1');
	}
?>
