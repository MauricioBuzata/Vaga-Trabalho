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
	include '../cls/conexaoClass.php';
?>

<?php
	$IdUsuario=(int)$_GET["IdUsuario"];
	$NomeUsuario=$_POST["NomeUsuario"];
	$Senha=$_POST["Senha"];
?>	

<?php
	$usuario = new usuariosClass();
	$usuario -> alterar($IdUsuario, $NomeUsuario, $Senha);
	header('Location: index.php?b=ue&IdUsuario='.$IdUsuario.'&msg=0');		
?>
