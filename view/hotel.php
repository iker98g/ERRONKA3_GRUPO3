<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel LES</title>
    <script src="https://kit.fontawesome.com/661afcc94b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/habitaciones.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- HEADER -->
<header> 
    <!-- NAV -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Hotel LES</a>
        <a div="servicios" href="servicios.php">Servicios</a>
        <div class="dropdown dropleft">
            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION["usuario"]; ?>
                <i class="far fa-user-circle fa-lg"></i>
                <!--<img src="img/cara.PNG" width="30" height="30" alt=""> -->
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-euro-sign"></i>    
                    Moneda
                </a>
                <a class="dropdown-item" href="#">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Modo nocturno</label>
                    </div>
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
<!-- FIN HEADER -->     
<!-- MAIN -->
<main>
 <!-- RESERVA FORM -->
    <div id="form">
        <form class="bg-secondary" method="GET">
            <h1>RESERVA</h1>
            <!--<div class="form-group">
                <input type="number" class="form-control" id="idUsuario" placeholder="Id usuario">
                
            </div>-->
            <div class="form-group">
                <input type="date" class="form-control" id="fechaInicio" placeholder="Fecha inicio"> 
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="fechaFin" placeholder="Fecha fin" disabled>
            </div>
            <div class="form-group" id="tipo">
                <select class="form-control" name="tipoHabitacion">
                    <option id="elige" value="elige" selected>Elige el tipo de habitacion</option>
                    <option id="suite" value="suite">Suite</option>
                    <option id="estandar" value="estandar">Estandar</option>
                    <option id="superior" value="superior">Superior</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="precioTotal" placeholder="Precio total" disabled>
            </div>
            <div class="form-check card-body">
                <button type="submit" class="btn btn-primary" id="reserva">Reservar</button>
            </div>
        </form>
    </div>
    <!-- FIN RESERVA FORM -->
    <!-- CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/hotel2.jpg" class="d-block w-100" height="450px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/hotel3.jpg" class="d-block w-100" height="450px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/hotel4.jpg" class="d-block w-100" height="450px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/hotel5.jpg" class="d-block w-100" height="450px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/hotel6.jpg" class="d-block w-100" height="450px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/hotel7.jpg" class="d-block w-100" height="450px" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- FIN CAROUSEL -->
    <!-- LIST GROUP -->
    <div class="row separacion">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active letra" id="list-descripcion-list" data-toggle="list" href="#list-descripcion" role="tab" aria-controls="descripcion">Descripción</a>
                <a class="list-group-item list-group-item-action letra" id="list-habitaciones-list" data-toggle="list" href="#list-habitaciones" role="tab" aria-controls="habitaciones">Habitaciones</a>
                <a class="list-group-item list-group-item-action letra" id="list-ubicacion-list" data-toggle="list" href="#list-ubicacion" role="tab" aria-controls="ubicacion">Ubicación</a>
                <a class="list-group-item list-group-item-action letra" id="list-contacto-list" data-toggle="list" href="#list-contacto" role="tab" aria-controls="contacto">Contacto</a>
                <div class="card informacion" style="width: 23rem;">
                    <div class="card-body">
                        <h5 class="card-title">INFORMACIÓN IMPORTANTE</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam iste, quos similique sint voluptatem doloribus cupiditate, deleniti dolores, tempore qui hic! Molestiae est nihil quo.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-descripcion" role="tabpanel" aria-labelledby="list-descripcion-list">
                    <h5>¿Quienes somos?</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo tempore repudiandae mollitia voluptatum aperiam, voluptas amet esse nobis rerum quibusdam delectus facilis explicabo libero iste reprehenderit commodi necessitatibus nam obcaecati quia alias ipsum! Illo ullam exercitationem placeat distinctio commodi ex ipsam eveniet, iure reprehenderit quibusdam blanditiis fugit esse id, est culpa maiores quam earum a perspiciatis quis consequatur. Commodi placeat maxime quas neque error consequuntur enim harum voluptatibus! Quod fuga ullam eum vel. Provident, aliquam odio minus harum dolore tempore deserunt expedita, doloremque sed exercitationem officiis ducimus. Asperiores impedit tempore quae quo placeat perferendis adipisci, culpa rem ducimus nesciunt inventore? Delectus, obcaecati laborum alias suscipit, sit voluptas numquam temporibus non eius quam ducimus expedita autem adipisci? Molestiae enim alias aliquid dolores culpa sint accusamus fugit, excepturi voluptas quisquam sapiente sed perspiciatis at. Quisquam repellat fuga assumenda, dolorum quam voluptatibus obcaecati odit quod perspiciatis placeat repellendus nostrum, consequuntur recusandae adipisci dolor esse exercitationem tempore sapiente dicta corrupti nobis rerum ex, eius ea! Modi fugiat, libero ad eveniet accusamus atque laudantium. Accusamus nisi ut omnis veniam debitis. Architecto vero possimus minus quia voluptatum, nesciunt dolores sit veniam accusamus modi fugit natus adipisci, itaque sapiente doloribus mollitia necessitatibus autem? Delectus itaque aspernatur corrupti quam sapiente aliquam corporis officiis ab nihil dignissimos debitis qui, cupiditate aliquid eaque officia dolor architecto quas laborum nulla? Omnis, perspiciatis iste. Aperiam numquam illo qui officia hic quae facere iste id commodi delectus, quas modi illum! Aliquam quis nobis optio harum soluta! Sit vel voluptatem quae nostrum in hic vitae ut voluptas, illo atque eum commodi unde omnis nihil officiis, perferendis magni, quis praesentium eligendi aliquam asperiores. Fugit praesentium atque dolorum dolores accusamus id minus architecto alias deserunt veniam sequi nesciunt odit laudantium, aspernatur sit nemo ab reiciendis ea? Quia non blanditiis nostrum iste alias corporis sint id corrupti.</p>
                </div>
                <div class="tab-pane fade" id="list-habitaciones" role="tabpanel" aria-labelledby="list-habitaciones-list">
                    <h5>Habitaciones</h5>
                    <div class="row" id="habitas">
                        <!-- AJAX AQUI -->
                    </div> 
                </div>
                <div class="tab-pane fade" id="list-ubicacion" role="tabpanel" aria-labelledby="list-ubicacion-list">
                    <h5>Ubicación</h5>
                    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.3889090433854!2d-2.925636384553234!3d43.26422757913655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fc5e5c211dd%3A0x6a7486dfa11cb52e!2sAyuntamiento%20de%20Bilbao!5e0!3m2!1ses!2ses!4v1571904434337!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="tab-pane fade" id="list-contacto" role="tabpanel" aria-labelledby="list-contacto-list">
                    <h5>Contáctanos</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore ratione, mollitia, saepe assumenda quae dolor enim natus eligendi laudantium nemo velit esse aliquid iusto non nesciunt voluptate accusamus dolorum corrupti sed, sint provident facilis. Dolores corporis fugit tempora odit aperiam asperiores nam eius vitae, nemo modi autem quasi sunt. Asperiores.</p>
                    <p>Correo electrónico: hotel_les@gmail.com</p>
                    <p>Teléfono: 944581043</p>      
                </div>
            </div>
        </div>
    </div>
    <!-- FIN LIST GROUP -->
</main>    
<!-- FIN MAIN -->    
<!-- FOOTER -->
<footer class="text-muted text-center text-small">
    <p class="mb-1">&copy; Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla maiores ipsam in inventore voluptatibus. Labore, provident. Quos ratione accusantium facere? Rem assumenda, a adipisci possimus repudiandae ipsam mollitia debitis architecto.</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="https://www.instagram.com/?hl=es"><i class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="https://es-es.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
        <li class="list-inline-item"><a href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="https://support.google.com/plus/?hl=es-419#topic=9259565"><i class="fab fa-google-plus-g"></i></a></li>
    </ul>
</footer>
<!-- FIN FOOTER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    
<script src="js/hotel.js" type="text/javascript"></script>
</body>
</html>