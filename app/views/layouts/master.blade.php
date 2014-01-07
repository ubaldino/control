<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Sawers</title>
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::style( 'css/bootstrap.min.css' ) }}
    {{ HTML::style( 'css/jumbotron.css' ) }}
    {{ HTML::script( 'js/bootstrap.min.js' ) }}
    @yield('cabecera')
    @yield('mapas')
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
        @if ( Auth::check() )
            <li><p><a class="btn btn-primary btn-lg" role="button">{{Auth::user()->usu_login}}</a></p></li> 
          @endif
          @if ( Auth::check() )
          <li>{{ HTML::link('/','Inicio') }}</li>
          
          @if ( Auth::user()->usu_login == 'admin' )
            <li>{{ HTML::link('usuarios', 'Usuarios') }}</li>
          @endif
          @endif
          @if ( Auth::check() )
            <li>{{ HTML::link('logout', 'Salir',array( 'class' => 'btn btn-small btn-info') ) }}</li>
          @endif
        </ul>

        <h3 class="text-muted">Sistema de Proyectos</h3>
      </div>
      @yield('contenido')
      <!-- se incluiran las vistas de cada controlador -->
      <div class="footer"><p> &copy; Sawers</p></div>

    </div>
  </body>
</html>
    