<html>
	<head>

		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link href="../css/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	</head>
	<body id="login">
		<table id="formulario">
			<tr>
				<td colspan="2">Login Administrativo</td>
			</tr>
				<form action="valida_login.php" method='POST' id="formlogin" name="formlogin" >
					<tr>
						<td><br>Usuário</td>
						<td><br><input type="text" class="form-control" name="Nome" required></td>
					</tr>
					<tr>
						<td><br>Senha</td>
						<td><br><input type="password" class="form-control" name="Senha" required></td>
					</tr>
					<tr>
						<td><br><button type="submit" class="btn btn-success">Entrar</button></td>
						<td><br><button type="reset" class="btn btn-danger">Limpar</button></td>
					</tr>
				</form>
		</table>
	</body>
</html>