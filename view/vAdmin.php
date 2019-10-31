<?php
session_start();

if ($_SESSION["admin"]==0) {
    header("Location: http://tres.fpz1920.com/view/vHotel.php");
    die();
}

if ($_SESSION["admin"]==null) {
    header("Location: http://tres.fpz1920.com/index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Hotel LES</title>
<link rel="icon" type="image/png" href="img/favicon.ico">
<script src="https://kit.fontawesome.com/661afcc94b.js"
	crossorigin="anonymous"></script>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
<script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>


</head>
<body>
<div id="vantaBG" class="fixed-bottom"></div>
	<header>
		<!-- NAV -->
		<nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="vHotel.php">Hotel LES</a>

        <div class="dropdown dropleft">
            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a id="nombreUsuario" data-id="<?php echo $_SESSION["id"]; ?>"><?php echo $_SESSION["usuario"]; ?></a>
                <i class="far fa-user-circle fa-lg"></i>
            </button>
           
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="vServicios.php">
                <i class="fas fa-concierge-bell"></i>
						Servicios
					</a>
				<div class="dropdown-divider"></div>	
                <a class="dropdown-item cerrarSesion" href="javascript:void(0);">
                    <i class="fas fa-sign-out-alt"></i>    
                    Cerrar sesión
                </a>
                
            </div>
        </div>
    </nav>
		<!-- FIN NAV -->
	</header>

	<div class="container mt-5">
		<h1 class="text-center display-3 tituloWeb">PANEL DE ADMINISTRACION</h1>
	</div>

	<div class="container mt-5 mb-5">

		<!-- 	tablas -->
		<div class="accordion mb-5 shadow-sm" id="accordionExample">
			<div class="card">
				<a class="card-header" id="headingOne" data-toggle="collapse"
					data-target="#collapseOne" aria-expanded="true"
					aria-controls="collapseOne"> Usuarios </a>
				<!-- Tabla Usuarios -->
				<!-- 	inserts -->


				<div id="collapseOne" class="collapse show"
					aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<button type="button" class="btn btn-dark mb-3 insertUsuario">Nuevo
									Usuario</button>
							</div>
						</div>
						<div class="table-responsive">
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
			</div>
			<div class="card">
				<a class="card-header" id="headingTwo" data-toggle="collapse"
					data-target="#collapseTwo" aria-expanded="false"
					aria-controls="collapseTwo"> Reservas </a>
				<!-- Tabla Reservas -->
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
					data-parent="#accordionExample">
					<div class="card-body">
					<div class="table-responsive">
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
			</div>
			<div class="card">
				<a class="card-header" id="headingThree" data-toggle="collapse"
					data-target="#collapseThree" aria-expanded="false"
					aria-controls="collapseThree"> Habitaciones </a>
				<!-- Tabla Habitaciones -->
				<div id="collapseThree" class="collapse"
					aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="card-body">
					<div class="table-responsive">
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


		<!-- Modal habitaciones-->
		<div class="modal fade" id="modalModificarHabitacion" tabindex="1"
			role="dialog" aria-labelledby="modalModificarHabitacionlabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalModificarHabitacionlabel">Modificar
							Habitacion</h5>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<!--form modificar -->
						<form>
							<div class="form-group">
								<label for="idHabitacionForm">ID</label> <input type="number"
									class="form-control" id="idHabitacionForm"
									aria-describedby="id" disabled>
							</div>
							<div class="form-group">
								<label for="tipoForm">Tipo</label> <input type="text"
									class="form-control" id="tipoForm" aria-describedby="tipo">
							</div>
							<div class="form-group">
								<label for="imagenForm">Imagen</label> <input type="text"
									class="form-control" id="imagenForm" aria-describedby="imagen">
							</div>
							<div class="form-group">
								<label for="precioForm">Precio</label> <input type="text"
									class="form-control" id="precioForm" aria-describedby="precio">
							</div>
						</form>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal">Cerrar</button>
						<button type="button"
							class="btn btn-primary botonExecuteModificarHabitaciones">Confirmar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal users-->
		<div class="modal fade" id="modalModificarUser" tabindex="-1"
			role="dialog" aria-labelledby="modalModificarUserlabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalModificarUserlabel">Modificar
							usuario</h5>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<!--form modificar -->
						<form>
							<div class="form-group">
								<label for="idUsuarioForm">ID</label> <input type="number"
									class="form-control" id="idUsuarioForm" aria-describedby="id"
									disabled>
							</div>
							<div class="form-group">
								<label for="nombreForm">Nombre</label> <input type="text"
									class="form-control" id="nombreForm" aria-describedby="nombre">
							</div>
							<div class="form-group">
								<label for="apellidoForm">Apellido</label> <input type="text"
									class="form-control" id="apellidoForm"
									aria-describedby="apellido">
							</div>
							<div class="form-group">
								<label for="usuarioForm">Usuario</label> <input type="text"
									class="form-control" id="usuarioForm"
									aria-describedby="usuario">
							</div>
							<div class="form-group">
								<label for="adminForm">Admin</label> 
								
<!-- 								<input -->
<!-- 									type="number" class="form-control" id="adminForm" -->
<!-- 									aria-describedby="admin"> -->
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="radioAdmin" id="adminSi" value="1"> <label
									class="form-check-label" for="adminSi">Si</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="radioAdmin" id="adminNo" value="0"> <label
									class="form-check-label" for="adminNo">No</label>
							</div>
						</form>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal">Cerrar</button>
						<button type="button"
							class="btn btn-primary botonExecuteModificarUsers">Confirmar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal insert users-->
		<div class="modal fade" id="modalInsertUser" tabindex="-1"
			role="dialog" aria-labelledby="modalInsertUserlabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalInsertUserlabel">Insertar usuario</h5>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<!--form modificar -->
						<form>
							<div class="form-group">
								<label for="nombreFormInsert">Nombre</label> <input type="text"
									class="form-control" id="nombreFormInsert"
									aria-describedby="nombreInsert" required name="insertarUsu">
							</div>
							<div class="form-group">
								<label for="apellidoFormInsert">Apellido</label> <input
									type="text" class="form-control" id="apellidoFormInsert"
									aria-describedby="apellidoInsert" required name="insertarUsu">
							</div>
							<div class="form-group">
								<label for="usuarioFormInsert">Usuario</label> <input
									type="text" class="form-control" id="usuarioFormInsert"
									aria-describedby="usuarioInsert" required name="insertarUsu">
							</div>
							<div class="form-group">
								<label for="passwordFormInsert">Contrasena</label> <input
									type="text" class="form-control" id="passwordFormInsert"
									aria-describedby="passwordInsert" required name="insertarUsu">
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="radioAdminInsert" id="adminSiInsert" value="1"> <label
									class="form-check-label" for="adminSiInsert">Si</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="radioAdminInsert" id="adminNoInsert" value="0"> <label
									class="form-check-label" for="adminNoInsert">No</label>
							</div>
						</form>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal">Cerrar</button>
						<button type="button" disabled
							class="btn btn-primary botonExecuteInsertUsers">Confirmar</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal reservas-->
		<div class="modal fade" id="modalModificarReserva" tabindex="-1"
			role="dialog" aria-labelledby="modalModificarReservalabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalModificarReservalabel">Modificar
							Reserva</h5>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<!--form modificar -->
						<form>
							<div class="form-group">
								<label for="idReservaForm">ID</label> <input type="number"
									class="form-control" id="idReservaForm" aria-describedby="id"
									disabled>
								<div class="form-group">
									<label for="idHabitacionReservaForm">Id Habitacion</label> <input
										type="number" class="form-control"
										id="idHabitacionReservaForm"
										aria-describedby="idHabitacionReserva">
								</div>
								<div class="form-group">
									<label for="idUsuarioReservaForm">Id Usuario</label> <input
										type="number" class="form-control" id="idUsuarioReservaForm"
										aria-describedby="idUsuarioReserva">
								</div>
								<div class="form-group row">
									<label for="fechaInicioForm" class="col-2 col-form-label">Fecha
										Inicio</label>
									<div class="col-10">
										<input class="form-control" type="date"
											id="fechaInicioForm">
									</div>
								</div>
								<div class="form-group row">
									<label for="fechaFinForm" class="col-2 col-form-label">Fecha
										Fin</label>
									<div class="col-10">
										<input class="form-control" type="date" id="fechaFinForm">
									</div>
								</div>
								<div class="form-group">
									<label for="precioTotalForm">Precio Total</label> <input
										type="number" class="form-control" id="precioTotalForm"
										aria-describedby="precioTotal">
								</div>
							</div>
						</form>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal">Cerrar</button>
						<button type="button"
							class="btn btn-primary botonExecuteModificarReservas">Confirmar</button>
					</div>
				</div>
			</div>
		</div>
<br>
<br>
<br>
<br>




	<!-- FOOTER -->
	<footer
		class="text-muted text-center text-small fixed-bottom border-top bg-white shadow">
		<p class="mb-1 ml-5 mr-5 mt-3 textoFooter">&copy; Lorem ipsum dolor sit amet consectetur
			adipisicing elit. Fugiat dignissimos dolores fuga accusantium iste
			quisquam explicabo atque praesentium voluptas eaque deleniti, maxime
			tempora et? Rerum placeat voluptate, maxime sequi itaque vel est
			totam neque voluptas soluta hic reprehenderit laborum doloribus ut
			iure sapiente quos blanditiis accusantium ullam? Temporibus, vitae
			mollitia.</p>
		<ul class="list-inline">
			<li class="list-inline-item"><a
				href="https://www.instagram.com/?hl=es"><i class="fab fa-instagram"></i></a></li>
			<li class="list-inline-item"><a href="https://es-es.facebook.com/"><i
					class="fab fa-facebook-square"></i></a></li>
			<li class="list-inline-item"><a href="https://twitter.com/?lang=es"><i
					class="fab fa-twitter"></i></a></li>
			<li class="list-inline-item"><a
				href="https://support.google.com/plus/?hl=es-419#topic=9259565"><i
					class="fab fa-google-plus-g"></i></a></li>
		</ul>
	</footer>
	</div>
	<!-- FIN FOOTER -->
	

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/admin.js" type="text/javascript"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
		

        <script>
        VANTA.NET({
          el: "#vantaBG",
          color: 0x222222,
          backgroundColor: 0xffffff,
          points: 14.00,
          maxDistance: 19.00,
          spacing: 18.00
        })
        </script>

</body>
</html>