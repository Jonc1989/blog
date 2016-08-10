user.controller( 'UserController', [ 'UserService', '$scope', '$location', function ( UserService, $scope, $location ) {
    $scope.user = null;


    this.$onInit = function () {
        var details = ['name', 'surname', 'photo'];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);