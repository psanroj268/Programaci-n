<?php

    try {
        $con = new mysqli("db", "root", "");
        $con->select_db("mibasedatos");

    } catch (mysqli_sql_exception $e) {
        die("** Error de conexión con la base de datos: {$e->getMessage()}");
    }

    $resultado = $con->query("SELECT * FROM frutas ;") ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
    
    <div class="container">
        <h1>Inventario</h1>

        <div class="row">
			<div class="col d-flex justify-content-end">
				<a href="insertar.php" class="btn btn-primary">Crear fruta</a>
			</div>
		</div>

        <!--<form action="borrar.php" method="post">
			<input id="id" type="hidden" name="id" value="" />
		</form>-->
        <div class="row">
            <div class="col-8">

            

        
        <table id="tabla" class="table">
            <thead>
                <tr>
                    <th>Fruta</th>
                    <th>Precio</th>
                    <th></th>
                    <th></th>

                </tr>

            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $fila["frutas"] ?></td>
                        <td><?= $fila["Precio"] ?></td>
                        <td><a href="" class="btn btn-primary">editar</a></td>
                        <td><a href="borrar.php?id=<?= $fila["idFru"] ?>"
									   class="btn btn-danger">Borrar</a></td>

                    </tr>

                <?php endwhile; ?>

            </tbody>
        </table>

        </div>
        </div>
    </div>

    <script>		
		//console.log($("#tabla")) ;

		/*$(".borrar").click((evento) => 
		{

			var id = $(evento.target).data("id") ;

			$("#id").attr("value", id) ;
			$("form").submit() ;
		
		}) ;*/
			

	</script>

</body>
</html>

<?php
    $con->close() ;
?>