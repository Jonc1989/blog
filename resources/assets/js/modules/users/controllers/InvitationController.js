user.controller( 'InvitationController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.myId = null;
    $scope.friendId = null;
    $scope.friendStatus = null;


    this.$onInit = function () {
        $scope.friendId = this.friendid;
        $scope.myId = this.myid;
        UserService.getStatus($scope.friendId).then( function ( response ) {
            console.log(response);

            if(response.length == 0) {
                $scope.friendStatus = 0; //nav draugi
            }else if( response[0].user_id == $scope.myId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 1; //uzaicinājums nosūtīts
                }else{
                    $scope.friendStatus = 2; //uzaicinājums apstiprināts
                }
            }else if( response[0].friend_id == $scope.friendId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 3; //uzaicinājums saņemts
                }else{
                    $scope.friendStatus = 4; //uzaicinājumu apstiprināju
                }
            }
        });
    };

    $scope.invite = function () {
        UserService.invite( $scope.friendId ).then( function( response )  {        });
    };



}]);