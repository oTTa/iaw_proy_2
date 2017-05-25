<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php if ($title=="") echo "BuscoMoto"; else echo $title; ?></title>

  <!-- setear el icono -->
  <link rel="icon" href="<?php if ($icon=="") echo url('/')."/images/motoLogo.png"; else echo $icon; ?>">

  <!-- estilos para la barra de navegación -->
  <link rel="stylesheet" href="<?php echo url('/')."/css/template/navbar.css" ?>">

  <!-- añadir los estilos -->
  <?php foreach ($css as $ruta): ?>
    <link rel="stylesheet" href="<?php echo url('/').$ruta ?>">
  <?php endforeach ?>

  <!-- defino la url base para usar en js -->
  <script type="text/javascript">
    var base_url ='<?php echo url('/')?>';
  </script>

  <!-- añadir los scripts -->
  <?php foreach ($js as $ruta): ?>
    <script src="<?php echo url('/').$ruta ?>"></script>
  <?php endforeach ?>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo url('/')."/motos/compra" ?>">
          <img style="max-width:90px; margin-top: -12px;" src="<?php echo url('/')."/images/motoLogo.png" ?>">
        </a>
        <a class="navbar-brand" href="<?php echo url('/')."/motos/compra" ?>">
          BuscoMoto
        </a>
        
      </div>
      <div id="navbar" class="collapse navbar-collapse">
    @if (Auth::user()['tipo'] == 'admin')
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vendedores <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo url('/')."/vendedores/crear" ?>">Crear</a></li>
              <li><a href="<?php echo url('/')."/vendedores/listar" ?>">Listar</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Motos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo url('/')."/motos/crear" ?>">Crear</a></li>
              <li><a href="<?php echo url('/')."/motos/listar" ?>">Listar</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accesorios <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo url('/')."/accesorios/crear" ?>">Crear</a></li>
              <li><a href="<?php echo url('/')."/accesorios/listar" ?>">Listar</a></li>
            </ul>
          </li>
  @endif
        </ul>

        <ul class="nav navbar-nav navbar-right">

          @if (Auth::check())
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfil
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
          
                <li>
                  <div class="navbar-content">
                    <div class="row">
                      <div class="col-md-5">
                        <img id="id_profile" src="{{url('/')}}{{Auth::user()['url_foto_perfil']}}" 
                        class="img-responsive" />
                      </div>
                      <div class="col-md-7">
                        <span id="id_nombre">{{Auth::user()['nombre']}}</span>
                        <p id="id_mail" class="text-muted small">
                        {{Auth::user()['email']}}
                        </p>
                        <div class="divider">
                        </div>
                        <a href="#" class="btn btn-primary btn-sm active" data-toggle="modal" data-target="#perfil">Ver perfil</a>
                        <a href="{{url('/')}}/compras" class="btn btn-primary btn-sm active">Compras</a>
                      </div>
                    </div>
                  </div>
                  <div class="navbar-footer">
                    <div class="navbar-footer-content">
                      <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                          <a href="{{url('/')}}/service/usuarios/salir" class="btn btn-default btn-sm pull-right">Cerrar sesión</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>

            @else

            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">LogIn
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
               <li>
                        <a href="<?php echo url('/')."/registrarse" ?>">Registrarse</a>
                </li>
                <li>
                        <a href="<?php echo url('/')."/login" ?>">Iniciar sesión</a>
                </li>
              </ul>
            </li>

           @endif

        </ul>

      </div>
    </div>
  </nav>
  @yield('content')
</body>

</html>