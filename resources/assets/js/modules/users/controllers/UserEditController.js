user.controller( 'UserEditController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.user = null;
    $scope.disabled = true;

    $scope.init = function (id) {

        UserService.getUser( id ).then( function( response )
        {
            $scope.user = response;
        });
    };

    $scope.saveUser = function ( ) {
        UserService.updateUser( $scope.user.id, $scope.user ).then( function( response )
        {
           console.log(response);
        });
    }

}]);