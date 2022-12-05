<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

	<?php
		session_start() ;
		$_SESSION["_csrf"] = md5(time()) ;
	?>

	<div class="container mt-4">
		<form action="guardar.php" method="post">

			<input type="hidden" name="_csrf" value="<?= $_SESSION["_csrf"] ?>" />

			<!-- nombre de la fruta -->
			<div class="row">
				<div class="col-2">
					<label for=""><strong>Nombre de la fruta:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="nom" required />
				</div>
			</div>

			<!-- precio de la fruta -->
			<div class="row">
				<div class="col-2">
					<label for=""><strong>Precio:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="pre" value="1" />
				</div>
			</div>

			<?php if(isset($_GET["err"])): ?>
			<div class="row">
				<div class="col-10">
					<div class="alert alert-danger">
						Hay un error en el formulario. Corrígelo antes de continuar.
					</div>
				</div>
			</div>

			<?php endif ; ?>

			<!-- botón -->
			<div class="row">
				<div class="col-10">
					<button class="btn btn-primary">Guardar</button>
					<a href="conexion.php" class="btn btn-danger">Cancelar</a>
				</div>				
			</div>
		</form>
	</div>

</body>
</html>