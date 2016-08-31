post.component( 'like', {
    templateUrl: '/api/view/modules.posts.api.like',
    controller: 'LikeController',
    bindings: {
        likes: '@',
        authId: '<',
        postId: '@'
    }
})