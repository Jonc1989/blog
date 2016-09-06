user.controller( 'UserController', [ 'UserService', 'MessageService', '$scope', '$rootScope', '$state',
    function ( UserService, MessageService, $scope, $rootScope, $state ) {

    $scope.user = null;
    

    $scope.init = function (authId, userId) {
        $rootScope.authId = authId;
        $rootScope.userId = userId;
        $state.go('posts');

        var details = [ 'id', 'name', 'surname', 'photo' ];
        UserService.getUser( userId, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);