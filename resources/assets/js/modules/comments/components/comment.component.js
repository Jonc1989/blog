comments.component( 'comments', {
    templateUrl: '/api/view/modules.comments.api.comments',
    controller: 'CommentsController',
    bindings: {
        postId: '<',
        userId: '<',
        type: '<'
    }
})