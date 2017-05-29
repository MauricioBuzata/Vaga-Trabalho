<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
		<title>Reserva Fácil - Sistema de locação de salas</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href="css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>

		<div id="principal">
			<div id="cabecalho">
				Reserva Fácil
			</div>
			
			<div id="corpo">
				
				<div id="opcoes" class="btn-group btn-group-justified">
					<a href="?b=s" class="btn btn-primary">Salas</a>
				</div>
			
				<div id="centro">		
					<?php 
						if(!isset($_GET['b']))
							require_once('home.php');
						else{
							switch($_REQUEST['b']){
											
								case 'h':
								require_once('home.php');
								break;
							
								case 's':
								require_once('Salas.php');
								break;		
								
								case 'se':
								require_once('SalaEspecifica.php');
								break;
																														
								case 'r':
								require_once('Reservas.php');
								break;								
							}
						}
					?>					
				</div>
				
				<div style="clear: both;"></div>
				
			</div>

			<div id="rodape">
				<a href="adm/login.php" class="btn btn-info">Login Administrativo</a><br>	
			</div>
			
		</div>

	</body>
</html>


