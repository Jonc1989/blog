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