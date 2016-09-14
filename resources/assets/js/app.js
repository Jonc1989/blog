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
            var interceptor = ['$rootScope', '$q', '$window', function(scope, $q, $window) {
                function success(response) {
                    return response;
                }

                function error(response) {
                    var status = response.status;
                    if (status == 401) {
                        window.location.replace( "/" );
                        console.log('logout');
                        return;
                    }
                    //if (status == 500) {
                    //    window.location.replace( "/" );
                    //    return;
                    //}
                    // otherwise
                    return $q.reject(response);
                }

                return function(promise) {
                    return promise.then(success, error);
                }
            }];

            $httpProvider.interceptors.push(interceptor);

        }]);
