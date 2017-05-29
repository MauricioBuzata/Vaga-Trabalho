<?php

	class administrativoClass
	{
		var $idAdm;
		var $Nome;
		var $Senha;
		var $resultado;
		
		public function validar($Nome, $Senha)
		{
			$Oconn = new conexaoClass();
			$Oconn -> abrir_conexao();
			$sql = "SELECT * FROM administrativo WHERE Nome='".$Nome."' AND Senha='".$Senha."'
			        UNION ALL SELECT * FROM usuarios WHERE NomeUsuario='".$Nome."' AND Senha='".$Senha."'";
			$conn = $Oconn ->getconn();
			$this -> resultado = $conn -> query($sql);
		}
		
		public function getConsulta()
		{
			return $this -> resultado;
		}
	}
?>