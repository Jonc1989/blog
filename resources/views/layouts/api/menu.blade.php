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
                    <li><a href="/messages">Vēstules<div class="event-count" ng-show="messageCount > 0" ng-bind="messageCount"></div></a></li>
                    <li><a href="/galleries">Galerijas</a></li>
                </ul>
        @endif
        <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="<?= url('/login') ?>">Login</a></li>
                    <li><a href="<?= url('/register') ?>">Register</a></li>
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