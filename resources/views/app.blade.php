<!doctype html>
<html land="en">

<head>
    <meta charset="UTF-8">
    <title>Pixel ~ Gem Managment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    {!! Html::style('css/custom.css') !!}
</head>

<body>
    <div class="nav_bar">
        <div class="profile_box">
            @if(Auth::check())
                <img class="avatar" src="{{ Auth::user()->avatar }}">
                <a href="/u/{{ Auth::user()->username }}">{{ strtoupper(Auth::user()->username) }} {{ strtoupper(Auth::user()->surname) }}</a>
            @else
            <div id="profile_login"><a href="/auth/login">LOGIN</a></div>
            @endif
        </div>

        <div class="nav_content">
            <a href="/home/" data-toggle="tooltip" data-placement="bottom" title="Home"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a>
            @if(Auth::check())
                <a href="/u/{{ Auth::user()->username }}" data-toggle="tooltip" data-placement="bottom" title="Profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Piggy Bank"><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>

                <a href="/logout" class="logout_icon" data-toggle="tooltip" data-placement="left" title="Log out"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                @if(Auth::user()->admin >= 1)
                    <a href="/auth/admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><span style="color: #d43030;" class="glyphicon glyphicon-dashboard" aria-hidden="true"></span></a>
                @endif
            @endif
        </div>
    </div>

    <div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="active"><a href="#">HOME</a></li>
            <li><a href="#">LINK</a></li>
            <li><a href="#">LINK</a></li>
        </ul>
    </div>
    <div id="page-content-wrapper">
        @yield('top_content')
        <div class="clearfix"></div>
        <div class="page-content">
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
</body>

</html>
