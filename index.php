<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoteles LES</title>
    <link rel="icon" type="image/png" href="view/img/favicon.ico">
    <script src="https://kit.fontawesome.com/661afcc94b.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="view/css/style.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
	<script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>
	
	
</head>
<body>
	<div id="vantaBG" class="fixed-bottom"></div>
    <div class="container">
    <h1 class="text-dark display-1 tituloWeb">HOTEL LES</h1>
        <form class="bg-dark cardLogin shadow">
          <h1 class="text-light">LOGIN</h1>
          <div class="form-group">
            <input type="text" class="form-control" id="username" placeholder="Username" name="loginInput" required> 
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" aria-describedby="passHelp" placeholder="Password" name="loginInput" required>
            <small id="passHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
          </div>
          <div class="form-group text-center">
          	<button type="button" class="btn btn-info btnLogin" disabled>Log in</button>
            <button type="button" class="btn btn-info btnSignin">Sign in</button>
          </div>
        </form>
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
									name="radioAdminInsert" id="adminSiInsert" value="1" disabled> 
									<label class="form-check-label" for="adminSiInsert">Si</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio"
									name="radioAdminInsert" id="adminNoInsert" value="0" disabled checked> <label
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
      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="view/js/script.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    
    
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