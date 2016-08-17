user.controller( 'InfoController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.user = null;

    // $scope.init = function (id) {
    //     this.id = id;
    //    
    // };

    this.$onInit = function () {
        var details = [ 'name', 'surname', 'photo' ];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);