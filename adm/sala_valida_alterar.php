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
	$IdSala=(int)$_GET["IdSala"];
	$NomeSala=$_POST["NomeSala"];

?>	

<?php
	$sala = new salasClass();
	$sala -> alterar($IdSala, $NomeSala);		

	header('Location: index.php?b=se&IdSala='.$IdSala.'&msg=0');
?>
