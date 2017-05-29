<?php

	class usuariosClass
	{
		var $IdUsuario;
		var $NomeUsuario;
		var $Senha;

		public function mostrar()
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = 'SELECT * FROM usuarios ORDER BY (NomeUsuario) ASC';
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function pegaId($NomeUsuario)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = 'SELECT IdUsuario as IdUsuario FROM usuarios WHERE NomeUsuario="'.$NomeUsuario.'"
					UNION ALL SELECT IdAdm as IdUsuario FROM administrativo WHERE Nome="'.$NomeUsuario.'"';
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function usuarioEspecifico($IdUsuario)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = 'SELECT * FROM usuarios WHERE IdUsuario='.$IdUsuario.'';
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}

		public function inserir($NomeUsuario,$Senha)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "INSERT INTO usuarios(NomeUsuario,Senha)
					values ('".$NomeUsuario."','".$Senha."')";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
			return $last_id = $conn->insert_id;
		}
		
		public function excluir($IdUsuario)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "DELETE FROM usuarios WHERE IdUsuario=".$IdUsuario."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function alterar($IdUsuario, $NomeUsuario, $Senha)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "UPDATE usuarios SET NomeUsuario='".$NomeUsuario."', Senha='".$Senha."' WHERE IdUsuario=".$IdUsuario."";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function getConsulta()
		{
			return $this -> resultado;
		}

	
	}
?>