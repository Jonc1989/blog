user.controller( 'UserController', [ 'UserService', 'MessageService', '$scope', '$rootScope', function ( UserService, MessageService, $scope, $rootScope ) {

    $scope.user = null;
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };

    $scope.init = function (id) {
        $rootScope.userId = id; 

        var details = [ 'id', 'name', 'surname', 'photo' ];
        UserService.getUser( id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };

    $scope.sendMessage = function()
    {
        $scope.message.messageText = $scope.messageBody;
        $scope.message.receiver = $scope.user.id;

        MessageService.send($scope.message).then(function(response){
            $scope.messageBody = "";
        });
    };

    $scope.checkMessageBody = function () {
        $scope.messageBody != '' ? $scope.disabled = false : $scope.disabled = true;
    };
    
}]);