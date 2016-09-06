<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/ngToast.min.css" rel="stylesheet">
    <link href="/css/ngToast-animations.min.css" rel="stylesheet">
    <!--<link href="/css/tokenize2.min.css" rel="stylesheet" />-->
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .container{

        }
    </style>
</head>
<body id="app-layout">
    <toast></toast>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                @if (!Auth::guest())
                <a class="navbar-brand" href="<?= url('/') ?>">
                    Laravel
                </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="/messages">Vēstules</a></li>
                    <li><a href="/galleries">Galerijas</a></li>
                </ul>
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?= Auth::user()->name ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= url('/logout') ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            @yield('content')
            @if (!Auth::guest())
                <div class="col-md-3">
                    <online></online>
                </div>
            @endif
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/lodash/4.14.2/lodash.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular-sanitize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular-animate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.1/angular-ui-router.min.js"></script>
    <script src='//maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCF3IrXpem5Lcg-jrIGr-JPLuATMs2str8&libraries=places'></script>

    <script src="/js/vendor/ng-file-upload-shim.min.js"></script> <!-- for no html5 browsers support -->
    <script src="/js/vendor/ng-file-upload.min.js"></script>
    <script src="/js/vendor/core.js"></script>
    <!--<script src="/js/vendor/tokenize2.min.js"></script>-->
    <script src="/js/all.js"></script>
    <script>
        /*(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));*/
    </script>

    <script>
        /*function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);

            if (response.status === 'connected') {
                testAPI();
            } else if (response.status === 'not_authorized') {
                document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
            } else {
                document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        FB.logout(function(response) {
            // user is now logged out
        });
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1441360066123251',
                cookie     : true,  // enable cookies to allow the server to access
                                    // the session
                xfbml      : true,  // parse social plugins on this page
                version    : 'v2.1' // use graph api version 2.5
            });

            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });

        };

        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log(response);
                document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
            });
        }*/
    </script>

    <script type="text/javascript">
//        $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//            }
//        });
    </script>
    <!--<fb:login-button onlogin="testAPI();">
    </fb:login-button>

    <div id="status">
    </div>-->

</body>
</html>
