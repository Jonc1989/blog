comments.controller( 'CommentsController', [ 'UserService', '$scope', 'CommentsService', 'SocketFactory',
    function ( UserService, $scope, CommentsService, SocketFactory ) {

    $scope.commentBody = '';
    $scope.comments = [];
    this.$onInit = function () {
        $scope.postId = this.postId;
        $scope.userId = this.userId;
        $scope.type = this.type;    
        $scope.commentBody = '';
        $scope.ready = false;
        $scope.getComments();
        SocketFactory.on('comment-created', function (data) {
            if( data.params.postId == $scope.postId && data.params.type == $scope.type ){
                $scope.getComments();
            }
        });
    };

    this.$onChanges = function ( bindings) {
        if( bindings.postId !== undefined && bindings.postId.currentValue !== $scope.postId ){
            $scope.postId = bindings.postId.currentValue;
        }
        if( bindings.userId !== undefined && bindings.userId.currentValue !== $scope.userId ){
            $scope.userId = bindings.userId.currentValue;
        }
        if( bindings.type !== undefined && bindings.type.currentValue !== $scope.type ){
            $scope.type = bindings.type.currentValue;
        }
        if( $scope.postId !== undefined && $scope.type !== undefined){
            $scope.getComments();
        }
    };

    $scope.comment = function () {
        $scope.ready = true;
    };

    $scope.saveComment = function () {
        CommentsService.save( $scope.postId, $scope.userId, $scope.type, $scope.commentBody ).then(function ( response ) {
            $scope.commentBody = '';
        });
    };
    
    $scope.close = function(){
        $scope.ready = false;
    };

    $scope.getComments = function () {
        CommentsService.all( $scope.postId, $scope.type ).then( function ( response ) {
            $scope.comments = response.data;
        });
    };
}]);