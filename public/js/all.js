/**
 * Created by Janis on 06.08.2016..
 */
var app = angular.module( 'app', [
    'ngComponentRouter',
    'home',
    'users'

] );

var home = angular.module('home', [

]);

var user = angular.module('users', [
    
]);

/**
 * Created by Janis on 06.08.2016..
 */
app.component( 'info', {
    templateUrl: '/api/view/modules.home.api.info',
    controller: 'UserController',
    bindings: {
        id: '<'
    }
})

app.component( 'online', {
    templateUrl: '/api/view/modules.home.api.online',
    controller: 'OnlineController'
})
app.component( 'search', {
    templateUrl: '/api/view/modules.home.api.search',
    controller: 'SearchController'
})
home.controller( 'OnlineController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.users = [];
    
    this.$onInit = function () {
        var details = ['name', 'surname', 'photo'];
        UserService.onlineUsers( details ).then( function( response )
        {
            $scope.users = response;
            console.log(response)
        });
    };

}]);
user.controller( 'SearchController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.searchKey = '';
    $scope.searchResults = [];
    
    $scope.search = function()
    {
        if( $scope.searchKey.length > 2)
        {
            UserService.search($scope.searchKey).then( function( response )
            {
                console.log(response);
                $scope.searchResults = response;
            });
        }else if( $scope.searchKey.length < 1 ){
            $scope.searchResults = [];
        }
    };
    
    $scope.showUser = function(id)
    {
        window.location.href = '/user/' + id;
    };

    $scope.hideSearchResults = function () {
        setTimeout( function () {
            $('#search-results').hide();
        }, 100 );
    }

    $scope.showSearchResults = function () {
        $('#search-results').show();
    }
}]);
user.controller( 'UserController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.user = null;


    this.$onInit = function () {
        var details = ['name', 'surname', 'photo'];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);
user.service( 'UserService', ['$http', '$q', function( $http, $q )
    {

        var UserService = {

            getUser:  function( id, details )
            {
                var deferred = $q.defer();
                $http.get( '/api/users/' + id,
                    {
                        params: details
                    })
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },

            onlineUsers:  function( details )
            {
                var deferred = $q.defer();
                $http.get( '/api/online',
                    {
                        params: details
                    })
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },

            Users:  function()
            {
                var deferred = $q.defer();
                $http.get( 'api/users' )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
             add: function(id)
             {
                 var deferred = $q.defer();
                 $http.get( '/api/user/add/' + id )
                     .success( function( response )
                     {
                         deferred.resolve( response );
                     } )
                     .error( function()
                     {
                         deferred.reject();
                     } );

                 return deferred.promise;
             },
            invitations: function()
            {
                var deferred = $q.defer();
                $http.get( '/api/invitations' )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
            acceptInvitation: function(userId, invitorId)
            {
                var params = {
                    user: userId,
                    invitor: invitorId
                };
                var deferred = $q.defer();
                $http.post( '/api/accept-invite/', params )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
            cancel: function(id)
            {
                var deferred = $q.defer();
                $http.get( '/api/user/cancel-friendship/' + id )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;
            },
            search:  function(string)
            {
                var deferred = $q.defer();
                $http.get( '/api/users/search/' + string )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            }
        };
        return UserService;
    }] );
//# sourceMappingURL=all.js.map
