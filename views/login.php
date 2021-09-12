<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>PEU</title>
    <link rel="shortcut icon" href="public/assets/img/upqroo.ico">
    <link href="public/css/login.css" rel="stylesheet">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">


  </head>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <body class="text-center fondo">
    
    <main class="form-signin">
      <form class="font formulario-login" action="<?php echo constant('URL'); ?>login/verificar" method="POST">
        <img class="mb-2" src="public/assets/img/logo-circular.png" alt="" width="120" height="120">
        <h1 class="h3 mb-3 fw-normal strong">Iniciar sesión</h1>

        <div class="form-floating">
          <input type="text" class="form-control" name="usuario" required autofocus id="floatingInput" placeholder="Usuario">
          <label for="floatingInput">Usuario</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" required placeholder="Contraseña">
          <label for="floatingPassword">Contraseña</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Recordar contraseña
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
        <p class="mt-4 mb-2 text-muted">&copy; Plataforma Educativa Universitaria</p>
      </form>
    </main>


    
  </body>
</html>