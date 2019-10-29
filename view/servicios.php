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
    <link href="css/servicios.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- HEADER -->
<header> 
    <!-- NAV -->
    <div class="topnav">
        <a class="menu blanco" href="hotel.php">Hotel LES</a>
        <a class="menu" href="#"> 
            <button type="button">
                <?php echo $_SESSION["usuario"]; ?>
                <i class="far fa-user-circle fa-lg"></i>
            </button>
        </a>
    </div>
    <!-- FIN NAV -->
</header> 
<!-- FIN HEADER -->      
<!-- MAIN -->
<main>
    <img src="img/servicios.jpeg" alt="">
    <h2>Pequeñas cosas que harán tu estancia única</h2>
    <h3>Nos proponemos hacerte sentir como en casa y por eso cuidamos cada detalle.</h3>
    <h1 id="titulo">Servicios generales</h1>
    <table style="width:100%">
        <tr>
            <td><i class="fas fa-utensils"></i> Restaurante</td>
            <td><i class="fas fa-wifi"></i> Wifi gratuito</td>
            <td><i class="fas fa-parking"></i> Parking privado</td>
            <td><i class="fas fa-beer"></i> Bar</td>
        </tr>
        <tr>
            <td><i class="fas fa-bacon"></i> Desayunos buffet</td>
            <td><i class="fas fa-dumbbell"></i> Gimnasio</td>
            <td><i class="fas fa-coffee"></i> Cafetería</td>
            <td><i class="fas fa-tv"></i> Sala TV</td>
        </tr>
    </table>    
</main>    
<!-- FIN MAIN -->    
<!-- FOOTER -->
<footer>
    <p class="mb-1">&copy; Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla maiores ipsam in inventore voluptatibus. Labore, provident. Quos ratione accusantium facere? Rem assumenda, a adipisci possimus repudiandae ipsam mollitia debitis architecto.</p>
    <ul>
        <li><a href="https://www.instagram.com/?hl=es"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://es-es.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
        <li><a href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://support.google.com/plus/?hl=es-419#topic=9259565"><i class="fab fa-google-plus-g"></i></a></li>
    </ul>
</footer>
<!-- FIN FOOTER -->
<script src="js/servicios.js" type="text/javascript"></script>
</body>
</html>