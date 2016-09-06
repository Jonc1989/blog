home.controller( 'OnlineController', [ 'UserService', '$scope', 'SocketFactory', 'ngToast', function ( UserService, $scope, SocketFactory, ngToast ) {
    $scope.users = [];
    $scope.details = ['id', 'name', 'surname', 'photo'];

    $scope.animationColors = [
        'success',
        'info',
        'warning',
        'danger'
    ];

    this.$onInit = function () {

        $scope.getUsers();

        SocketFactory.on('user-online', function (data) {
            $scope.newUser = data.user;
            ngToast.create({
                className: $scope.animationColors[Math.floor(Math.random() * $scope.animationColors.length)].toString(),
                content: '<a href="/user/' + $scope.newUser.id + '" class="">' + $scope.newUser.name + ' ' + $scope.newUser.surname + ' pieslēdzās</a>',
                timeout: 5000,
                verticalPosition: 'bottom'
            });

            $scope.getUsers();
            //ngToast.dismiss(msg);
            // ngToast.dismiss();
        });
    };

    $scope.getUsers = function () {
        UserService.onlineUsers( $scope.details ).then( function( response )
        {
            $scope.users = response;
        });
    }

}]);