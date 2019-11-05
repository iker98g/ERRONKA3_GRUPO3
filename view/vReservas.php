<?php
session_start();

if ($_SESSION["admin"] == null) {
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
    <script src="https://kit.fontawesome.com/661afcc94b.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="css/admin.css" rel="stylesheet" type="text/css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
	<script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>
</head>
<body>
	<div id="vantaBG" class="fixed-bottom"></div>
	<!-- HEADER -->
	<header>
		<!-- NAV -->
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="vHotel.php">Hotel LES</a>

			<div class="dropdown dropleft">
				<button class="btn btn-light" type="button" id="dropdownMenuButton"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<a id="nombreUsuario" data-id="<?php echo $_SESSION["id"]; ?>"><?php echo $_SESSION["usuario"]; ?></a>
					<i class="far fa-user-circle fa-lg"></i>
				</button>
           <?php
        if ($_SESSION["admin"] == 1) {
            ?>    <div class="dropdown-menu"
					aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="vAdmin.php"> <i
						class="fas fa-users-cog"></i> Panel Admin
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="vServicios.php"> <i
						class="fas fa-concierge-bell"></i> Servicios
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item cerrarSesion" href="javascript:void(0);"> <i
						class="fas fa-sign-out-alt"></i> Cerrar sesión
					</a>

				</div><?php

            ;
        } else {

            ?>
                   <div class="dropdown-menu"
					aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="vServicios.php"> <i
						class="fas fa-concierge-bell"></i> Servicios
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item cerrarSesion" href="javascript:void(0);"> <i
						class="fas fa-sign-out-alt"></i> Cerrar sesión
					</a>

				</div>
                    
                    <?php }?>
            
        </div>
		</nav>
		<!-- FIN NAV -->
	</header>
	<!-- FIN HEADER -->
	<!-- MAIN -->
	<main>
	<div class="container mb-5">
		<h1 class="text-center display-3 tituloWeb mt-5">MIS RESERVAS</h1>
		<div class="table-responsive mb-5">
			<table class="table table-bordered mt-5 ">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Habitacion</th>
						<th scope="col">Usuario</th>
						<th scope="col">Fecha Inicio</th>
						<th scope="col">Fecha Fin</th>
						<th scope="col">Precio Total</th>
						<th scope="col">Cancelar Reserva</th>
					</tr>
				</thead>
				<tbody id="tablaReservas" class="text-center bg-light">
				</tbody>
			</table>
		</div>
	</div>
	</main>
	<!-- FIN MAIN -->

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- FOOTER -->
	<footer
		class="text-muted text-center text-small fixed-bottom border-top bg-white shadow">
		<p class="mb-1">&copy; Lorem ipsum dolor sit amet consectetur
			adipisicing elit. Nulla maiores ipsam in inventore voluptatibus.
			Labore, provident. Quos ratione accusantium facere? Rem assumenda, a
			adipisci possimus repudiandae ipsam mollitia debitis architecto.</p>
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
	<!-- FIN FOOTER -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/reserva.js" type="text/javascript"></script>

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