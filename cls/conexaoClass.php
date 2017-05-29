<?php 
	class conexaoClass
	{
		var $conn; //propriedade
		
		//método
		function abrir_conexao()//abrir conexao com o banco de dados
		{
			$servername = '127.0.0.1';
			$username = 'root';
			$password = 'root';
			$dbname = 'vagatrabalho';
			
			$this -> conn = new mysqli($servername, $username, $password, $dbname);
		}
		
		function getconn()
		{
			return $this -> conn;
		}
	}
?>