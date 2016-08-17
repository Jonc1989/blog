user.component( 'invitation', {
    templateUrl: '/api/view/modules.users.api.invitation',
    controller: 'InvitationController',
    bindings: {
        friendid: '<',
        myid: '<'
    }
})