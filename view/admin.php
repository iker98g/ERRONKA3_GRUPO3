<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/661afcc94b.js" crossorigin="anonymous"></script>
    <link href="css/admin.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<div class="accordion" id="accordionExample">
			<div class="card">
				<a class="card-header" id="headingOne" data-toggle="collapse"
							data-target="#collapseOne" aria-expanded="true"
							aria-controls="collapseOne">
					
						Usuarios
					
				</a>
				<!-- Tabla Usuarios -->
				<div id="collapseOne" class="collapse show"
					aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Nombre</th>
									<th scope="col">Apellido</th>
									<th scope="col">Usuario</th>
									<th scope="col">Admin</th>
									<th scope="col">Operaciones</th>
								</tr>
							</thead>
							<tbody id="tablaUsers" class="text-center">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card">
				<a class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo"
							aria-expanded="false" aria-controls="collapseTwo">

						
							Reservas
	
				</a>
				<!-- Tabla Reservas -->
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
					data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Habitacion</th>
									<th scope="col">Usuario</th>
									<th scope="col">Fecha Inicio</th>
									<th scope="col">Fecha Fin</th>
									<th scope="col">Precio Total</th>
									<th scope="col">Operaciones</th>
								</tr>
							</thead>
							<tbody id="tablaReservas" class="text-center">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card">
				<a class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree"
							aria-expanded="false" aria-controls="collapseThree">

						
							Habitaciones
						
	
				</a>
				<!-- Tabla Habitaciones -->
				<div id="collapseThree" class="collapse"
					aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="card-body">
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Tipo</th>
									<th scope="col">Imagen</th>
									<th scope="col">Precio</th>
									<th scope="col">Operaciones</th>
								</tr>
							</thead>
							<tbody id="tablaHabitaciones" class="text-center">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>





	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/admin.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>