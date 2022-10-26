<?php

	const DATOS = [
					["usr" => "javier", "pwd" => "123456781"],
					["usr" => "marta",  "pwd" => "123456782"],
					["usr" => "luis",   "pwd" => "123456783"],
					["usr" => "laura",  "pwd" => "123456784"],
					["usr" => "angel",  "pwd" => "123456785"],
					["usr" => "manolo", "pwd" => "123456786"],
				  ] ;


    function buscaUsuario($usr, $pwd):bool {
        $res = array_filter(DATOS, function($item) use ($usr, $pwd){
            return ($item["usr"] == $usr and $item["pwd"] == $pwd);
        }) ;

        return !empty($res) ;

        /*$i = 0 ;
        $encontrado = false ;

        while($i < count(DATOS) and ($encontrado==false)):
            if(DATOS[$i]["usr"] == $usr and DATOS[$i]["pwd"] == $pwd) {
                $encontrado = true;
            }

            $i++ ;

        endwhile;

        return $encontrado;*/
    }
    
	// Iniciar la sesión
	session_start() ;	

	if (isset($_SESSION["usuario"])) header("location: main.php") ;

	define("USUARIO",  "miusuario") ;
	define("PASSWORD", "12345678") ;

	/**
	 * Si ya tenemos datos en $_POST, comprobamos el usuario
	 * y la contraseña. Si son correctos, redirigimos.
	 */
	if (!empty($_POST)):

		if ($_SESSION["token"] == $_POST["_token"]):

			if (buscaUsuario($_POST["usr"],$_POST["pwd"])):

                $_SESSION["autentificado"] = "SI";

				$_SESSION["usuario"] = $_POST["usr"] ;
				$_SESSION["inicio"] = date("Y-n-j H:i:s");

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