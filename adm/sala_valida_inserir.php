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
	include '../cls/conexaoClass.php';
?>

<?php
	$NomeSala=$_POST['NomeSala'];
?>

<?php
{
	$sala = new salasClass();
	$IdSala = $sala -> inserir($NomeSala);
}
	
?>

<?php	
	header('Location: index.php?b=s&msg=1');
?>