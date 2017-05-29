<?php
	include '../cls/administrativoClass.php';
	include '../cls/conexaoClass.php';
?>

<?php
	$Nome=$_POST["Nome"];
	$Senha=$_POST["Senha"];
?>	
	
<?php
	$admin = new administrativoClass();
	$admin -> validar($Nome, $Senha);
?>

<?php
	session_start();

	$result = $admin -> getConsulta();
	if($linha = $result -> fetch_assoc())
	{
		$_SESSION['Nome'] = $Nome;
		$_SESSION['Senha'] = $Senha;
			
		header('location:index.php'); 
	}
	else
	{
		header('location:login.php'); 
	}
?>

