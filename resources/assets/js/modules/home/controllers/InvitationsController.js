home.controller( 'InvitationsController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.invitations = [];
    this.$onInit = function () {
        $scope.getInvitations();
    };
    
    $scope.getInvitations = function () {
        UserService.invitations().then( function( response )  {
            $scope.invitations = response;
            console.log(response);
        });
    };
    
    $scope.accept = function ( id ) {
        UserService.changeStatus( id, 3 ).then( function( response )  {
            
            $scope.$broadcast('invitation-accepted');
        });
    };

    $scope.$on('invitation-accepted', function(event, args) {
        $scope.getInvitations();
    });
}]);