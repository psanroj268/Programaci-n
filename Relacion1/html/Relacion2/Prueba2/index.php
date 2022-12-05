<?php

	/**
	 * Antonio J. Sánchez
	 */
	session_start() ;
	
	require_once "lib/Token.php" ;
	require_once "lib/Database.php" ;	
	require_once "modelos/Usuario.php" ;

	if (!empty($_POST)):

		// 
		if (Token::check($_POST["_token"])):
			
			$db = Database::getDatabase() ;
			$datos = $db->escape($_POST) ;

			$clave = md5($datos["pass"]) ;

			$db->query("SELECT * FROM usuario 
						WHERE email = '{$datos["email"]}' AND 
						      clave = '{$clave}' ;") ;
			$usuario = $db->getData("Usuario") ;

			//
			if($usuario==null): 
				$error = "Nombre de usuario o contraseña incorrectos" ;
			else:

				

				$_SESSION["inicio"] = time() ;
				$_SESSION["usuario"] = serialize($usuario) ;
				
				header("location: main.php") ;

			endif; 
		endif ;
	endif ;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agendaw</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

	<div class="container mt-4">

		<h1 class="text-center mb-4">Agendaw</h1>

		<form method="post">

			<?= new Token ?>

			<div class="card mx-auto shadow" style="max-width: 20rem;">
				<div class="card-body">
					<div class="form-group">
						<input class="form-control w-100 mb-2" 
						       type="email" name="email" 
							   placeholder="usuario@email.com" 
							   value="<?= $_POST["email"]??"" ?>"
							   required />

						<input class="form-control w-100 mb-4" 
						       type="password" name="pass" 
							   placeholder="Contraseña" 
							   value="1234"
							   required />

						<?php if (isset($error)): ?>
						<div class="alert alert-danger">
							<strong><?= $error ?></strong>
						</div>
						<?php endif; ?>

						<button class="btn btn-primary w-100 mb-2">Entrar</button>
						<button class="btn btn-outline-dark w-100">Registrar</button>

					</div>
 				</div>
			</div>

		</form>


	</div>

</body>
</html>