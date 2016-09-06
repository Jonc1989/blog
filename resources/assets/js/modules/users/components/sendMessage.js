user.component( 'sendMessage', {
    templateUrl: '/api/view/modules.users.api.send_message',
    controller: 'UserMessageSenderController',
    bindings: {
        userId: '<'
    }
})