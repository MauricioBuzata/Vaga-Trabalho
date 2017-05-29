<?php

	class salasClass
	{
		var $IdSala;
		var $NomeSala;
		var $resultado;
		
		public function mostrar()
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = 'SELECT * 
					FROM salas 
					ORDER BY (NomeSala) ASC';
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function salaEspecifica($IdSala)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = 'SELECT *
					FROM salas s 
					WHERE s.IdSala='.$IdSala.'';
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
							
		public function livroEditoraEspecifica($IdEditora)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = 'SELECT * FROM livros WHERE IdEditora='.$IdEditora.'';
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function inserir($NomeSala)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "INSERT INTO salas(NomeSala)
					values ('".$NomeSala."')";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
			return $last_id = $conn->insert_id;
		}


		public function excluir($IdSala)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "DELETE FROM salas WHERE IdSala=".$IdSala."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function alterar($IdSala, $NomeSala)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "UPDATE salas SET NomeSala='".$NomeSala."'
					WHERE IdSala=".$IdSala."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function alterarDisponibilidade($IdLivro, $Disponibilidade)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "UPDATE livros SET Disponibilidade=".$Disponibilidade."
					WHERE IdLivro=".$IdLivro."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function getConsulta()
		{
			return $this -> resultado;
		}

	
	}
?>