<html>
	<head>
		<?php 
			session_start();
			if((!isset ($_SESSION['Nome']) == true) and (!isset ($_SESSION['Senha']) == true))
			{
				unset($_SESSION['Nome']);
				unset($_SESSION['Senha']);
				
				header('location:login.php');
			}
		?>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
		<title>Reserva Fácil - Sistema de locação de salas</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link href="../css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
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
					<a href="?b=u" class="btn btn-primary">Usuários</a>
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
								
								case 'si':
								require_once('sala_inserir.php');
								break;
								
								case 'svi':
								require_once('sala_valida_inserir.php');
								break;
								
								case 'sa':
								require_once('sala_alterar.php');
								break;
								
								case 'sva':
								require_once('sala_valida_alterar.php');
								break;
								
								case 'sex':
								require_once('sala_excluir.php');
								break;

								case 'sve':
								require_once('sala_valida_excluir.php');
								break;
								
								case 'u':
								require_once('Usuarios.php');
								break;	
								
								case 'ue':
								require_once('UsuarioEspecifico.php');
								break;			
							
								case 'ui':
								require_once('usuario_inserir.php');
								break;
							
								case 'uvi':
								require_once('usuario_valida_inserir.php');
								break;
							
								case 'ua':
								require_once('usuario_alterar.php');
								break;
								
								case 'uva':
								require_once('usuario_valida_alterar.php');
								break;
								
								case 'uex':
								require_once('usuario_excluir.php');
								break;

								case 'uve':
								require_once('usuario_valida_excluir.php');
								break;
															
								case 'r':
								require_once('Reservas.php');
								break;
								
								case 'reservar':
								require_once('reservar_validar.php');
								break;							
								
								case 'desreservar':
								require_once('desreservar_validar.php');
								break;
																																
								case 'sair':
								require_once('valida_sair.php');
								break;
							}
						}
					?>					
				</div>
				
				<div style="clear: both;"></div>
				
			</div>
			
			<div id="rodape">	
				<a href="?b=sair" class="btn btn-warning">Sair</a>
			</div>
			
		</div>

	</body>
</html>


