<?php

	/**
	 * Antonio J. Sánchez
	 */
	
	require_once "lib/Token.php" ;		
	require_once "modelos/Usuario.php" ;		
	require_once "modelos/Contacto.php" ;		

	session_start() ;

	

	// comprobamos si se ha enviado el formulario
	if (!empty($_POST)):

		if (Token::check($_POST["_token"])):

			// deserializamos el usuario
			$usuario = unserialize($_SESSION["usuario"]) ;

			//
			$contacto = new Contacto($_POST) ;
			$contacto->idUsu = $usuario->getIdUsu() ;
			$contacto->nombre = $_POST["nom"] ;
			$contacto->apellidos = $_POST["ape"] ;
			$contacto->telefono = $_POST["tel"] ;
			$contacto->email = $_POST["ema"] ;
			$contacto->foto = $_POST["fot"] ;
			$contacto->observaciones = $_POST["obs"] ;		
			$contacto->save() ;

			// redirigimos a la página principal
			header("location: main.php") ;

		else:
			// LO QUE QUERAIS HACER SI EL TOKEN HA EXPIRADO
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

	<style>
		.input-group-text { border-radius: 0.375rem 0 0 0.375rem !important; }
	</style>
</head>
<body>

	<div class="container mt-4">

		<h1 class="text-center mb-4">Agendaw</h1>

		<form method="post">

			<?= new Token ?>

			<div class="card mx-auto shadow" style="max-width: 40rem;">
				<div class="card-body">
					<div class="form-group">

						<input class="form-control mt-2" 
							   type="text" name="nom" 
							   placeholder="Nombre" required />

						<input class="form-control mt-2" 
							   type="text" name="ape" 
							   placeholder="Apellidos" required />

						<div class="input-group mt-2">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="bi bi-telephone-fill"></i>
								</span>
							</div>
							<input class="form-control " 
								   type="phone" name="tel" 
								   placeholder="Número de teléfono" required />
						</div>

						<div class="input-group mt-2">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="bi bi-envelope"></i>
								</span>
							</div>

							<input class="form-control" 
								   type="email" name="ema" 
								   placeholder="Dirección de email" />
						</div>

						<input class="form-control mt-2" 
							   type="input" name="fot" 
							   placeholder="Imagen de perfil" />

						<label for="obs" class="mt-2"><strong>Observaciones:</strong></label>
						<textarea id="obs" class="form-control" name="obs" 
							      rows="4"></textarea>

						<button class="btn btn-primary mt-2 w-25">Guardar</button>
						<a class="btn btn-danger mt-2 w-25" href="main.php">Cancelar</a>

					</div>
				</div>
			</div>

		</form>


	</div>

</body>
</html>