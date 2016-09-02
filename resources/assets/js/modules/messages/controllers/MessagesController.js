messages.controller('MessagesController', ['$scope', 'MessageService', function ( $scope, MessageService ) {

    $scope.friendId = null;
    $scope.messages = {};
    $scope.users = {};
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };

    this.$onInit = function () {
        $scope.messangers();
    };

    $scope.messangers = function()
    {
        MessageService.getMessengers().then( function( response )
        {
            $scope.users = response.data;

            if( $scope.users.length ){
                $scope.friendId = $scope.users[0].id;
                $scope.getMessagesFromUser( $scope.friendId );
            }

        });
    };

    $scope.getMessagesFromUser = function( id )
    {
        $scope.friendId = id;
        MessageService.getMessages( id ).then( function( response )
        {
            $scope.messages = response;


        });
    };

    $scope.sendMessage = function()
    {
        $scope.message.messageText = $scope.messageBody;
        $scope.message.receiver = $scope.friendId;

        MessageService.send( $scope.message ).then(function(response){
            $scope.messageBody = "";
            $scope.getMessagesFromUser( $scope.friendId );
        });
    };

    $scope.checkMessageBody = function () {
        $scope.messageBody != '' ? $scope.disabled = false : $scope.disabled = true;
    };
    
}]);