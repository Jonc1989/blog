post.component( 'posts', {
    templateUrl: '/api/view/modules.posts.api.posts',
    controller: 'PostController',
    bindings: {
        authId: '<'
    }
})