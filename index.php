<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoteles LES</title>
    <script src="https://kit.fontawesome.com/661afcc94b.js"></script>
    <link href="view/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js"></script>
	<script src="https://www.vantajs.com/dist/vanta.net.min.js"></script>
</head>
<body>
	<div id="vantaBG" class="fixed-bottom"></div>
    <div class="container">
    <h1 class="text-dark display-1">HOTEL LES</h1>
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
            <button type="button" class="btn btn-info btnLogin" disabled>Sign in</button>
          </div>
        </form>
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