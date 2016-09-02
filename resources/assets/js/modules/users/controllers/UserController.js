user.controller( 'UserController', [ 'UserService', 'MessageService', '$scope', '$rootScope', '$state',
    function ( UserService, MessageService, $scope, $rootScope, $state ) {

    $scope.user = null;
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };

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

    $scope.sendMessage = function()
    {
        $scope.message.messageText = $scope.messageBody;        console.log( $scope.message );
        $scope.message.receiver = $scope.user.id;

        MessageService.send($scope.message).then(function(response){
            $scope.messageBody = "";
        });
    };

    $scope.checkMessageBody = function () {
        $scope.messageBody != '' ? $scope.disabled = false : $scope.disabled = true;
    };

    // $scope.ngMessage = function () {
    //     ngDialog.open({ template: '/api/view/modules.messages.api.dialog', className: 'ngdialog-theme-default' });
    // };
    
}]);