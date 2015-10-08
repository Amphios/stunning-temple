<!doctype html>
<html land="en">

<head>
    <meta charset="UTF-8">
    <title>Pixel ~ Gem Managment</title>

      <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      {!! Html::style('/css/app.css') !!}

</head>

<body>

  <div class="sidebar">
    <!-- Fixed width sidebar -->
      <div class="profile-box">
          @if(Auth::check())
              <img class="avatar" src="{{ Auth::user()->avatar }}">
              <a href="/{{ Auth::user()->username }}">{{ strtoupper(Auth::user()->username) }}</a>
          @else
            <a class="login" href="/auth/login">Sign in</a>
            <!--<a class="login" href="/auth/register">Sign up</a>-->
          @endif
      </div>

      <ul class="nav-links">
          <a href="#"><li class="active">Home</li></a>
          <li><a href="#">LINK</a></li>
          <li><a href="#">LINK</a></li>
      </ul>
  </div>

  <div class="container">
    <div class="nav-bar">
      <div class="nav-icons">
        <a href="#"><i class="fa fa-home fa-2x left"></i></a>
        <a href="#"><i class="fa fa-user fa-2x left"></i></a>
        <a href="#"><i class="fa fa-gift fa-2x left"></i></a>
        <a href="#"><i class="fa fa-trophy fa-2x left"></i></a>
        <a href="#"><i class="fa fa-question fa-2x left"></i></a>
        
        @if(Auth::check())
            <a href="#" class="button user-button right"><i class="fa fa-cog icon"></i>
              {{ strtoupper(Auth::user()->username) }}
            </a>
        @else
          hi
        @endif
        
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
      <!-- Foundation Grid -->
        @yield('content')
      </div>
    </div>
  </div>


  {!! Html::script('js/vendor/modernizr.js') !!}
  {!! Html::script('js/vendor/jquery.js') !!}
  {!! Html::script('js/vendor/fastclick.js') !!}
  {!! Html::script('js/foundation.js') !!}

  <script>
    $(document).foundation();
  </script>

</body>

<!--<body>
    <div id="wrapper">
    <div id="sidebar-wrapper">
        <div class="profile_box">
            @if(Auth::check())
                <img class="avatar" src="{{ Auth::user()->avatar }}">
                <a href="/{{ Auth::user()->username }}">{{ strtoupper(Auth::user()->username) }}</a>
            @else
            <div id="profile_login"><a href="/auth/login">LOGIN</a></div>
            @endif
        </div>

        <ul class="sidebar-nav">
            <li class="active"><a href="#">HOME</a></li>
            <li><a href="#">LINK</a></li>
            <li><a href="#">LINK</a></li>
        </ul>
    </div>
    <div id="green-line"></div>
    <div class="nav_bar">
        <div class="nav_content">
            <a href="/home/" data-toggle="tooltip" data-placement="bottom" title="Home"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a>
            @if(Auth::check())
                <a href="{{ Auth::user()->username }}" data-toggle="tooltip" data-placement="bottom" title="Profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Piggy Bank"><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span></a>
                <a href="/auth/settings" data-toggle="tooltip" data-placement="bottom" title="Settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>

                <a href="/logout" class="logout_icon" data-toggle="tooltip" data-placement="left" title="Log out"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>

                @if(Auth::user()->admin >= 1)
                    <a href="/auth/admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><span style="color: #d43030;" class="glyphicon glyphicon-dashboard" aria-hidden="true"></span></a>
                @endif
            @endif
        </div>
    </div>

    <div id="page-content-wrapper">
        @yield('top_content')
        <div class="clearfix"></div>
        <div class="page-content" style="margin: 0px 0px 50px 0px;">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    </div>

    {!! Html::script('https://code.jquery.com/jquery-1.10.2.min.js') !!}
    {!! Html::script('//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js') !!}

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>-->

</html>
