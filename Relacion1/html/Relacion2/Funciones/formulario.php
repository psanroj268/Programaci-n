<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

	<div class="container mt-4">
		<form action="guardar.php" method="post">

			<!-- nombre de la fruta -->
			<div class="row">
				<div class="col-2">
					<label for=""><strong>ISBN:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="isbn" required />
				</div>
			</div>
            <div class="row">
				<div class="col-2">
					<label for=""><strong>Nombre del libro:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="titu" required />
				</div>
			</div>

			<!-- precio de la fruta -->
			<div class="row">
				<div class="col-2">
					<label for=""><strong>Nombre del autor:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="aut" required />
				</div>
			</div>

            <div class="row">
				<div class="col-2">
					<label for=""><strong>Nombre de la editorial:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="edi" required />
				</div>
			</div>

            <div class="row">
				<div class="col-2">
					<label for=""><strong>Numero de Páginas:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="pag" required />
				</div>
			</div>

            <div class="row">
				<div class="col-2">
					<label for=""><strong>Puntuación:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="pun" required />
				</div>
			</div>

            <div class="row">
				<div class="col-2">
					<label for=""><strong>Argumento:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="argu" required />
				</div>
			</div>

            <div class="row">
				<div class="col-2">
					<label for=""><strong>Imagen:</strong></label>
				</div>
				<div class="col-8">
					<input class="form-control" type="text" name="img" required />
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
					<a href="indexb.php" class="btn btn-danger">Cancelar</a>
				</div>				
			</div>
		</form>
	</div>

</body>
</html>