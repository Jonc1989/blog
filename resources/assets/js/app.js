var app = angular.module( 'app', [
    'ui.router',
    'ngFileUpload',
    'ngSanitize',
    'ngAnimate',
    'home',
    'posts',
    'users',
    'messages',
    'galleries',
    'comments',
    'ngToast'
] )
    .config([ '$httpProvider', function( $httpProvider )
        {
            $httpProvider.interceptors.push('HttpInterceptor');
        }]);