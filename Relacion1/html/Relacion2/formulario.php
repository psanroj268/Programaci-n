<?php

	const DATOS = [
					["usr" => "javier", "pwd" => "12345678"],
					["usr" => "marta",  "pwd" => "12345678"],
					["usr" => "luis",   "pwd" => "12345678"],
					["usr" => "laura",  "pwd" => "12345678"],
					["usr" => "angel",  "pwd" => "12345678"],
					["usr" => "manolo", "pwd" => "12345678"],
				  ] ;

	// Iniciar la sesión
	session_start() ;	

	if (!empty($_SESSION)) header("location: main.php") ;

	define("USUARIO",  "miusuario") ;
	define("PASSWORD", "12345678") ;

	/**
	 * Si ya tenemos datos en $_POST, comprobamos el usuario
	 * y la contraseña. Si son correctos, redirigimos.
	 */
	if (!empty($_POST)):

		if ($_SESSION["token"] == $_POST["_token"]):

			if (($_POST["usr"] == USUARIO) and 
				($_POST["pwd"] == PASSWORD)):

				$_SESSION["usuario"] = $_POST["usr"] ;
				$_SESSION["inicio"] = time() ;

				// Redirigimos a la página principal
				header("location:main.php") ;

			else:
			 echo "Nombre de usuario o contraseña incorrectos." ;
			endif ;

		else:
			echo "Solicitud caducada." ;
		endif ;

	endif ;


	// creamos un ID único
	$_SESSION["token"] = md5(uniqid(mt_rand(),true)) ;

	// No nos ha llegado información en $_POST: mostramos
	// el formulario de login.		
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario de Login</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>
<body>
		
	<div class="container">
		<h1 class="text-center mt-4">Mi aplicación chupiguay</h1>

		<form method="post">

			<input type="hidden" name="_token" 
				   value="<?= $_SESSION["token"] ?>" />

			<div class="row mt-4">
				<div class="col-4 mx-auto">
	  				<input  id="usr" name="usr" type="text" 
	  						class="form-control" 
	  						placeholder="nombre de usuario"
	  						value="miusuario"
	  						autofocus required />

				</div> <!-- end user -->
			</div>

			<div class="row mt-2">
				<div class="col-4 mx-auto">
	  				<input  id="pwd" name="pwd" type="password" 
	  						class="form-control" 
	  						placeholder="introduce tu contraseña"
	  						value="12345678"
	  						required />
	  				
				</div> <!-- end password -->
			</div>

			<div class="row mt-2">
				<div class="col-4 mx-auto">
					<button class="btn btn-primary w-100">Entrar</button>
				</div>

			</div>
		</form>
	</div>

</body>
</html>