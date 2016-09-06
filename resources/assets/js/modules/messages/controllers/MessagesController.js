messages.controller('MessagesController', ['$scope', 'MessageService', 'UserService', function ( $scope, MessageService, UserService ) {

    $scope.friendId = null;
    $scope.userSearchOpen = false;
    $scope.messages = {};
    $scope.users = {};
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };
    $scope.receivers = [];
    $scope.searchKey = '';
    $scope.searchResults = [];

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
            $scope.userSearchOpen = false;
        });
    };

    $scope.checkMessageBody = function () {
        $scope.messageBody != '' ? $scope.disabled = false : $scope.disabled = true;
    };
    
    $scope.newMessage = function () {
        $scope.userSearchOpen = true;
        $scope.friendId = undefined;
        $scope.messages = {};
    }



    $scope.search = function()
    {                console.log( $scope.searchKey);
        if( $scope.searchKey.length > 2)
        {
            UserService.search($scope.searchKey).then( function( response )
            {

                $scope.searchResults = response;
            });
        }else if( $scope.searchKey.length < 1 ){
            $scope.searchResults = [];
        }
    };

    $scope.selectUser = function( user )
    {
        $scope.searchKey = user.name + ' ' + user.surname;
        $scope.friendId = user.id;
    };

    $scope.hideSearchResults = function () {
        setTimeout( function () {
            $('#search-results').hide();
        }, 100 );
    }

    $scope.showSearchResults = function () {
        $('#search-results').show();
    }

    //$(window).scroll(function() {



    //});

    
}]);