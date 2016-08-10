/**
 * Created by Janis on 06.08.2016..
 */
var app = angular.module( 'app', [
    'ngComponentRouter',
    'users'

] );

var user = angular.module('users', [
    
]);

/**
 * Created by Janis on 06.08.2016..
 */
app.component( 'info', {
    templateUrl: 'api/view/modules.home.api.info',
    controller: 'UserController'
})
app.component( 'search', {
    templateUrl: 'api/view/modules.home.api.search',
    controller: 'SearchController'
})
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

    $scope.User = function ( id ) {
        
        var details = ['name', 'surname', 'photo'];
        UserService.getUser( id, details ).then( function( response )
        {
            $scope.user = response[0];
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
