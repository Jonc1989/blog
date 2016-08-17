user.controller( 'InvitationController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.myId = null;
    $scope.friendId = null;
    $scope.friendStatus = null;
    $scope.friendStatusText = null;


    this.$onInit = function () {
        $scope.friendId = this.friendid;
        $scope.myId = this.myid;
        $scope.checkStatus();
    };

    $scope.checkStatus = function () {
        UserService.getStatus($scope.friendId).then( function ( response ) {
            if(response.length == 0) {
                $scope.friendStatus = 0; //nav draugi                       //action - uzaicināt
                $scope.friendStatusText = 'Uzaicināt';
            }else if( response[0].user_id == $scope.myId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 1; //uzaicinājums nosūtīts        //action - atcelt uzaicinājumu
                    $scope.friendStatusText = 'Atcelt uzaicinājumu';
                }else{
                    $scope.friendStatus = 2; //uzaicinājums apstiprināts    //action - atcelt draudzību
                    $scope.friendStatusText = 'Atcelt draudzību';
                }
            }else if( response[0].friend_id == $scope.friendId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 3; //uzaicinājums saņemts         //action - apstiprināt uzaicinājumu
                    $scope.friendStatusText = 'Apstiprināt uzaicinājumu';
                }else{
                    $scope.friendStatus = 4; //uzaicinājumu apstiprināju    //action - atcelt draudzību
                    $scope.friendStatusText = 'Atcelt draudzību';
                }
            }
        });
    };

    $scope.changeFriendshipStatus = function () {
        UserService.changeStatus( $scope.friendId, $scope.friendStatus ).then( function( response )  {
            $scope.$broadcast('friend-status-changed');
        });
    };

    $scope.$on('friend-status-changed', function(event, args) {
        $scope.checkStatus();
    });

}]);