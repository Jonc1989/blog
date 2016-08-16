user.controller( 'FriendsController', [ 'UserService', '$scope', '$stateParams', function ( UserService, $scope, $stateParams ) {
    $scope.user = null;

    $scope.id = null;

    this.$onInit = function () {
        $scope.id = $stateParams.id;
        UserService.getFriends( $scope.id ).then( function( response )
        {
            console.log(response);
            $scope.user = response;
        });
    };

}]);