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
    <menu-component auth-id="<?= \Auth::id() ?>"></menu-component>
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
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/lodash/4.14.2/lodash.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular-sanitize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular-animate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.1/angular-ui-router.min.js"></script>
    <script src='//maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyCF3IrXpem5Lcg-jrIGr-JPLuATMs2str8&libraries=places'></script>
    <script src="/js/vendor/ng-file-upload-shim.min.js"></script> <!-- for no html5 browsers support -->
    <script src="/js/vendor/ng-file-upload.min.js"></script>
    <script src="/js/vendor/core.js"></script>
    <script src="/js/all.js"></script>

</body>
</html>
