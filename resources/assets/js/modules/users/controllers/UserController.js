user.controller( 'UserController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.user = null;


    this.$onInit = function () {
        var details = [ 'name', 'surname', 'photo' ];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);