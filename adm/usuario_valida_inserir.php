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
	$NomeUsuario=$_POST["NomeUsuario"];
	$Senha=$_POST["Senha"];
?>	
	
<?php
	$usuario = new usuariosClass();
	$IdUsuario = $usuario -> inserir($NomeUsuario,$Senha);
?>

<?php	
	header('Location: index.php?b=u&msg=1');
?>