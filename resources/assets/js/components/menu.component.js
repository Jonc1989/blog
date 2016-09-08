app.component( 'menuComponent', {
    templateUrl: '/api/view/layouts.api.menu',
    controller: 'MenuController',
    bindings: {
        authId: '<'
    }
})