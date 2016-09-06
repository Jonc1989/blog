user.controller( 'UserMessageSenderController', [ 'MessageService', '$scope', function ( MessageService, $scope ) {

        $scope.userId = null;

        $scope.disabled = true;
        $scope.message = {
            messageText: "",
            receiver: ""
        };

        this.$onInit = function () {
            $scope.userId = this.userId;
        };

        $scope.sendMessage = function()
        {
            $scope.message.messageText = $scope.messageBody;
            $scope.message.receiver = $scope.userId;console.log( $scope.message );

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