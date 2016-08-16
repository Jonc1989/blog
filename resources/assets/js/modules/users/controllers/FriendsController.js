user.controller( 'FriendsController', [ 'UserService', '$scope', '$stateParams', '$rootScope',
    function ( UserService, $scope, $stateParams, $rootScope ) {
    $scope.users = [];

    $scope.id = null;

    this.$onInit = function () {
        $stateParams.id != null ? $scope.id = $stateParams.id : $scope.id = $rootScope.userId;
        UserService.getFriends( $scope.id ).then( function( response )
        {
            console.log(response);
            $scope.users = response;
        });
    };

}]);