<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Sawers</title>
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script( 'js/bootstrap.min.js' ) }}
    {{ HTML::style( 'css/bootstrap.min.css' ) }}
    {{ HTML::style( 'css/jumbotron.css' ) }}
    <style>
      body { padding-top: 65px; }
    </style>
    @yield('cabecera')
    @yield('mapas')
  </head>
  <body>
      <!-- se incluiran las vistas de cada controlador -->
      <nav class="navbar navbar-default navbar-inverse nav-justified navbar-fixed-top navbar-collapse" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        @if ( Auth::guest())
              {{ Form::open( array( 'url' => 'login' , 'class'=> 'navbar-form navbar-left') ) }}
              @if(Session::get('mensaje'))
                <div class="alert alert-success">{{Session::get('mensaje')}}</div>
              @endif

            <ul class="nav nav-pills">
              <li>{{Form::text('usu_login', Input::old('usu_login') , array( 'class'=>'form-control pull-left' , 'placeholder'=> 'Login' , 'autocomplete'=>'off', 'autofocus'=>'autofocus'))}}</a>
              <li>{{Form::password('usu_password' , array( 'class'=>'form-control pull-left' , 'placeholder'=> 'Password' , 'autocomplete'=>'off') )}}</a>
            <li>{{ Form::submit( 'Autentificarse' , array('class' => 'btn btn-success pull-right' ) ) }}</a>
            </ul>
          {{ Form::close() }}
        @endif
          <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>-->
          <a class="navbar-brand" href="{{ URL::to('/') }}">
          @if ( Auth::check() )
            {{Auth::user()->usu_login}}
          @endif
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            
          </ul>
          @if ( Auth::check() )
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
              </div>
              <button type="submit" class="btn btn-default">Buscar</button>
            </form>
          @endif

          <ul class="nav navbar-nav navbar-right">
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>-->
            @if ( Auth::check() )
            <li ><a class='' href="{{URL::to('logout')}}">Salir</a></li>
            @endif
          </ul>
        </div>
      </nav>
    <div class="container" style="top:-45px">
      @yield('contenido')
      <div class="footer"><p> &copy; Sawers</p></div>
    </div>
  </body>
</html>