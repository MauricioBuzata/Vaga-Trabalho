<?php

	class reservadasClass
	{
		var $IdSala;
		var $IdUsuario;
		var $NomeUsuario;
		var $DataHorario;
		var $Id;
		var $TipoId;
		var $resultado;
		var $DataReserva;
		
		public function mostrar($IdSala)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "SELECT *
					FROM reservadas 
					WHERE IdSala=".$IdSala."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}		
		
		public function reservadaEspecifica($Id, $TipoId)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "SELECT *
					FROM reservadas
					WHERE ((IdSala=".$Id." AND 1=".$TipoId.") OR (IdUsuario=".$Id." AND 2=".$TipoId."))
					AND DataHorario > CURRENT_TIMESTAMP";
			$conn = $Oconn ->getconn();
			echo $sql;
			$this -> resultado = $conn -> query($sql);
		}
		
		public function verificar($IdSala, $DataReserva)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "SELECT *, extract(HOUR FROM DataHorario) AS hora
					FROM reservadas
					JOIN usuarios
					ON reservadas.IdUsuario = usuarios.IdUsuario
					WHERE IdSala=".$IdSala."
					AND cast(DataHorario AS DATE) ='".$DataReserva."'";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function reservaClienteHorarioEspecifico($NomeUsuario, $DataHorario)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "SELECT * 
					FROM reservadas r
					LEFT JOIN usuarios u
					ON r.IdUsuario = u.IdUsuario
					LEFT JOIN administrativo a
					ON r.IdUsuario = a.IdAdm
					WHERE (u.NomeUsuario ='".$NomeUsuario."' OR a.Nome = '".$NomeUsuario."')
					AND r.DataHorario =".$DataHorario."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
				
		public function reservar($IdSala, $NomeUsuario, $DataHorario)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "INSERT INTO reservadas(IdSala,IdUsuario, DataHorario)
					SELECT '".$IdSala."',IdUsuario,'".$DataHorario."'
					FROM usuarios
					WHERE NomeUsuario = '".$NomeUsuario."'
					UNION ALL SELECT '".$IdSala."',IdAdm,'".$DataHorario."'
					FROM administrativo
					WHERE Nome = '".$NomeUsuario."'";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
				
		public function desreservar($IdSala, $DataHorario)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "DELETE FROM reservadas 
					WHERE IdSala=".$IdSala." and DataHorario='".$DataHorario."'";
			$conn = $Oconn ->getconn();
			echo $sql;
			$this -> resultado = $conn -> query($sql);
		}
		
		public function getConsulta()
		{
			return $this -> resultado;
		}
	}
?>