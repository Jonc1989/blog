messages.controller('MessagesController', ['$scope', 'MessageService', 'UserService', function ( $scope, MessageService, UserService ) {

    $scope.friendId = null;
    $scope.userSearchOpen = false;
    $scope.messages = [];
    $scope.users = {};
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };
    $scope.receivers = [];
    $scope.searchKey = '';
    $scope.searchResults = [];

    $scope.current_page = 1;
    $scope.total = 0;
    $scope.last_page = undefined;
    $scope.next_page = 1;
    $scope.per_page = 10;
    $scope.loading = false;


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
        $scope.loading = true;
        $scope.friendId = id;
        $scope.next_page = 1;
        $scope.per_page = 10;
        MessageService.getMessages( id, $scope.per_page, $scope.next_page ).then( function( response )
        {
            $scope.messages = response.data;
            $scope.next_page = response.current_page + 1;
            $scope.per_page = response.per_page;
            $scope.current_page = response.current_page;
            $scope.last_page = response.last_page;
            $scope.total = response.total;
            $scope.loading = false;
        });
    };

    $scope.paginateMessages = function( id )
    {
        $scope.loading = true;
        $scope.friendId = id;
        MessageService.getMessages( id, $scope.per_page, $scope.next_page ).then( function( response )
        {
            response.data.forEach(function (message) {
                $scope.messages.push( message );
            });

            $scope.next_page = response.current_page + 1;
            $scope.per_page = response.per_page;
            $scope.current_page = response.current_page;
            $scope.last_page = response.last_page;
            $scope.total = response.total;
            $scope.loading = false;
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



    angular.element($('#messages-wrap' )).bind("scroll", function() {
        if( ( $('#messages-container').offset().top + $('#messages-container').height() - 1 ) < $('#messages-wrap').offset().top + $('#messages-wrap').height() && $scope.loading == false ){
                    if($scope.current_page != $scope.last_page){
                        $scope.paginateMessages( $scope.friendId );
                    }
        }
    });
    // $(window).scroll(function() {
    //     if($(window).scrollTop() == $(document).height() - $(window).height() && $scope.loading == false ){
    //         if($scope.current_page != $scope.last_page){
    //             $scope.paginateMessages( $scope.friendId );
    //         }
    //     }
    // });

    
}]);