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
        <div class="dropdown dropleft">
            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                alopez
                <img src="img/cara.PNG" width="30" height="30" alt="">
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
                <a class="dropdown-item" href="#">
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
                <a class="list-group-item list-group-item-action active" id="list-descripcion-list" data-toggle="list" href="#list-descripcion" role="tab" aria-controls="descripcion">Descripción</a>
                <a class="list-group-item list-group-item-action" id="list-habitaciones-list" data-toggle="list" href="#list-habitaciones" role="tab" aria-controls="habitaciones">Habitaciones</a>
                <a class="list-group-item list-group-item-action" id="list-ubicacion-list" data-toggle="list" href="#list-ubicacion" role="tab" aria-controls="ubicacion">Ubicación</a>
                <a class="list-group-item list-group-item-action" id="list-contacto-list" data-toggle="list" href="#list-contacto" role="tab" aria-controls="contacto">Contacto</a>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-descripcion" role="tabpanel" aria-labelledby="list-descripcion-list">
                    <h5>¿Quienes somos?</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In illo magnam dolorem reprehenderit, laboriosam commodi magni voluptatibus quasi ullam veritatis? Maiores dicta, laborum natus, voluptas laudantium reiciendis mollitia ipsa cumque commodi vel tempore. Maxime, facilis aliquam quasi, unde fugiat ipsum et voluptates soluta vel obcaecati quibusdam eveniet accusamus doloremque minus optio harum architecto temporibus in exercitationem sunt vitae provident aliquid? A, hic. Voluptas enim rerum ipsam minus vel facere aspernatur corrupti officiis voluptatum perspiciatis a, tempore porro quia. Quisquam earum, ab quis quaerat pariatur, dolorem est qui ut maxime voluptatem eius rem. Veniam neque cupiditate natus nulla repudiandae ratione, provident eligendi, ad eaque obcaecati, pariatur atque ex animi voluptas illo. Saepe voluptatum, earum recusandae quae eos cum dolor voluptates, porro iure consequatur quo! Aperiam aspernatur modi labore, iste consectetur quas velit unde alias reiciendis! Ad perspiciatis incidunt sit sint ipsam neque velit quisquam, quis voluptatem. Facere mollitia sed repellendus, quae eum adipisci veniam dolores ex? Delectus sequi, tempore voluptate non fugiat magni quasi fuga, enim porro consectetur incidunt aut autem assumenda culpa doloremque repudiandae accusamus. Eos velit harum deleniti consectetur. Neque corrupti asperiores accusantium? Iusto quasi, fugiat aliquam placeat ad corrupti accusantium suscipit deserunt quia, quos cum maiores a animi?</p>
                </div>
                <div class="tab-pane fade" id="list-habitaciones" role="tabpanel" aria-labelledby="list-habitaciones-list">
                    <h5>Habitaciones</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/estandar1.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Estandar</h5>
                                    <p class="card-text">65€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/estandar2.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Estandar</h5>
                                    <p class="card-text">65€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/estandar3.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Estandar</h5>
                                    <p class="card-text">65€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/estandar4.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Estandar</h5>
                                    <p class="card-text">65€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/suite1.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Suite</h5>
                                    <p class="card-text">90€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/suite2.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Suite</h5>
                                    <p class="card-text">90€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/suite3.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Suite</h5>
                                    <p class="card-text">90€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/suite4.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Suite</h5>
                                    <p class="card-text">90€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/superior1.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Superior</h5>
                                    <p class="card-text">75€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/superior2.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Superior</h5>
                                    <p class="card-text">75€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/superior3.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Superior</h5>
                                    <p class="card-text">75€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="img/superior4.jpg" class="card-img-top" alt="...">
                                    <h5 class="card-title">Superior</h5>
                                    <p class="card-text">75€</p>
                                    <a href="#" class="btn btn-primary">Reservar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-ubicacion" role="tabpanel" aria-labelledby="list-ubicacion-list">
                    <h5>Ubicación</h5>
                    <iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.3889090433854!2d-2.925636384553234!3d43.26422757913655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fc5e5c211dd%3A0x6a7486dfa11cb52e!2sAyuntamiento%20de%20Bilbao!5e0!3m2!1ses!2ses!4v1571815421752!5m2!1ses!2ses" width="400" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="tab-pane fade" id="list-contacto" role="tabpanel" aria-labelledby="list-contacto-list">
                    <h5>Contáctanos</h5>
                    <p>¿Tienes preguntas o quieres saber más sobre cómo reservar habitaciones? Contacta con nosotros a través de correo electrónico o teléfono.</p>
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
    <p class="mb-1">&copy; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat dignissimos dolores fuga accusantium iste quisquam explicabo atque praesentium voluptas eaque deleniti, maxime tempora et? Rerum placeat voluptate, maxime sequi itaque vel est totam neque voluptas soluta hic reprehenderit laborum doloribus ut iure sapiente quos blanditiis accusantium ullam? Temporibus, vitae mollitia.</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="https://www.instagram.com/?hl=es"><i class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="https://es-es.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
        <li class="list-inline-item"><a href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="https://support.google.com/plus/?hl=es-419#topic=9259565"><i class="fab fa-google-plus-g"></i></a></li>
    </ul>
</footer>
<!-- FIN FOOTER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>