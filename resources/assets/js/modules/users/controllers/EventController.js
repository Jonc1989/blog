user.controller( 'EventController', [ 'UserService', '$scope', '$rootScope',
    function ( UserService, $scope, $rootScope ) {

        $scope.id = null;
        $scope.events = [];
        this.$onInit = function () {
            $scope.id = $rootScope.userId;

            $scope.getEvents();
        };

        $scope.getEvents = function () {
            UserService.getEvents( $scope.id ).then( function ( response ) {
                $scope.events = response;
                console.log( response);
            });
        }

    }]);