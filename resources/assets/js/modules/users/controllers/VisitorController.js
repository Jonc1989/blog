user.controller( 'VisitorController', [ 'UserService', '$scope', '$stateParams', '$rootScope',
    function ( UserService, $scope, $stateParams, $rootScope ) {

        $scope.users = [];
        $scope.id = null;

        this.$onInit = function () {
            $scope.id = $rootScope.authId;
            UserService.getGuests( $scope.id ).then( function( response )
            {
                console.log(response);
                $scope.users = response.data;
            });
        };

    }]);