app.controller('MenuController', ['$scope', '$rootScope', 'SocketFactory', 'MessageService', function( $scope, $rootScope, SocketFactory, MessageService ) {

    $scope.authId = null;
    $scope.messageCount = null;
    this.$onInit = function () {
        if( this.authId !== undefined ){
            $scope.authId = this.authId;
            $rootScope.authId = this.authId;
            $scope.getMessageCount();

            SocketFactory.on('message-sent', function (data) {
                if( data.receiver == $scope.authId ){
                    $scope.getMessageCount()
                }
            });
            SocketFactory.on('message-readed', function (data) {
                if( data.receiver == $scope.authId ){
                    $scope.getMessageCount()
                }
            });
        }
    };

    $scope.getMessageCount = function () {
        MessageService.getNewMessages( $scope.authId ).then(function ( response ) {
            $scope.messageCount = response;
        });
    }
}]);
