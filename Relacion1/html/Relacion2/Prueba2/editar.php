<?php

	require_once "lib/Token.php" ;
	require_once "modelos/Contacto.php" ;

	// Recibimos información del registro para MOSTRAR el FORMULARIO
	if (!empty($_GET)):
		$idcon = $_GET["id"]??null ;

		// Si se me pasa un identificador de usuario, lo borramos
		if (!is_null($idcon)):

			// recuperamos el contacto
			$con = Contacto::getById($idcon) ;

			// comprobamos si el contacto existe y, si es así, 
			// lo borramos.
			if (!$con) header("location: main.php") ;

		endif ;
	endif ;

	// Recibimos información para actualizar el registro
	if (!empty($_POST)):

		$con->nombre = $_POST["nom"] ;
		$con->apellidos = $_POST["ape"] ;
		$con->email = $_POST["ema"] ;
		$con->telefono = $_POST["tel"] ;
		$con->foto = $_POST["fot"] ;
		$con->observaciones = $_POST["obs"] ;
		$con->update() ;

		header("location: main.php") ;
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
							   value="<?= $con->nombre ?>" 
							   placeholder="Nombre" required />

						<input class="form-control mt-2" 
							   type="text" name="ape" 
							   value="<?= $con->apellidos ?>" 
							   placeholder="Apellidos" required />

						<div class="input-group mt-2">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="bi bi-telephone-fill"></i>
								</span>
							</div>
							<input class="form-control " 
								   type="phone" name="tel" 
								   value="<?= $con->telefono ?>" 
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
								   value="<?= $con->email ?>" 
								   placeholder="Dirección de email" />
						</div>

						<input class="form-control mt-2" 
							   type="input" name="fot"
							   value="<?= $con->foto ?>"  
							   placeholder="Imagen de perfil" />

						<label for="obs" class="mt-2"><strong>Observaciones:</strong></label>
						<textarea id="obs" class="form-control" name="obs" 
							      rows="4"><?= $con->observaciones ?></textarea>

						<button class="btn btn-primary mt-2 w-25">Guardar</button>
						<a class="btn btn-danger mt-2 w-25" href="main.php">Cancelar</a>

					</div>
				</div>
			</div>

		</form>


	</div>

</body>
</html>