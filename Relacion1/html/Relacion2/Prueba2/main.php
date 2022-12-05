<?php

	/**
	 * Antonio J. Sánchez
	 */

	session_start() ;

	require_once "modelos/Contacto.php" ;
	require_once "modelos/Usuario.php" ;

	// recuperamos el usuario de la sesión
	$usuario = unserialize($_SESSION["usuario"]) ;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agendaw</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />

	<style>
		.foto { max-width: 50px; border-radius:20%; }
	</style>
</head>
<body>

	<div class="container mt-4">

		<h1 class="text-center mb-4">Agendaw</h1>

		<h6>Bienvenido/a, <?= $usuario->getNombre() ?> 🖐</h6>

		<div class="d-flex flex-row-reverse">
			<a class="btn btn-dark mx-2" href="logout.php">Salir</a>
			<a class="btn btn-primary" href="nuevo.php">Nuevo contacto</a>
		</div>


		<main>

			<table class="table">
				<thead>
					<tr>
						<th>Foto</th>
						<th>Nombre</th>
						<th>Teléfono</th>

						<!-- opciones -->
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php

					// recuperamos todos los contactos
					$contacto = Contacto::getAllByUser($usuario->getIdUsu()) ;

					foreach($contacto as $item):					
				?>

				<tr>
					<!-- foto -->
					<td>
						<img class="foto" src="<?= $item->foto ?>" />
					</td>

					<!-- datos -->
					<td><?= $item ?></td>
					<td><?= $item->telefono ?></td>

					<!-- opciones -->
					<td>
						<a href="editar.php?id=<?= $item->idCon ?>" class="btn btn-sm btn-primary">editar</a>
						<a href="borrar.php?id=<?= $item->idCon ?>" class="btn btn-sm btn-danger">borrar</a>
					</td>					
				</tr>


				<?php endforeach ;?>
				</tbody>
			</table>

		</main>

	</div>

</body>
</html>