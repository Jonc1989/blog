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

    this.$onChanges = function (changesObj) {
        console.log(changesObj)
    };

    $scope.comment = function () {
        $scope.ready = true;
    };

    $scope.saveComment = function () {
        CommentsService.save( this.postId, $scope.userId, $scope.type, $scope.commentBody ).then(function ( response ) {
            $scope.commentBody = '';
        });
    };
    
    $scope.close = function(){
        $scope.ready = false;
    };

    $scope.getComments = function () {
        CommentsService.all( this.postId, $scope.type ).then( function ( response ) {
            $scope.comments = response.data;
        });
    };
}]);