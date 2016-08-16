user.controller( 'UserController', [ 'UserService', '$scope', '$rootScope', function ( UserService, $scope, $rootScope ) {
    $scope.user = null;

    $scope.init = function (id) {
        $rootScope.userId = id;
        this.id = id;
        var details = [ 'name', 'surname', 'photo' ];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };

    this.$onInit = function (id) {
       
    };
    
}]);