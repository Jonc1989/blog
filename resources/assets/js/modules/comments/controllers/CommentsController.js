comments.controller( 'CommentsController', [ 'UserService', '$scope', 'CommentsService', function ( UserService, $scope, CommentsService ) {

    $scope.commentBody = '';
    $scope.comments = [];
    this.$onInit = function () {
        $scope.postId = this.postId;
        $scope.userId = this.userId;
        $scope.type = this.type;    
        $scope.commentBody = '';
        $scope.ready = false;
        $scope.getComments();
    };

    $scope.comment = function () {
        $scope.ready = true;
    };

    $scope.saveComment = function () {
        CommentsService.save( $scope.postId, $scope.userId, $scope.type, $scope.commentBody ).then(function ( response ) {
            console.log( response );
            $scope.commentBody = '';
        });
    };
    
    $scope.close = function () {
        $scope.ready = false;
    };

    $scope.getComments = function () {
        CommentsService.all( $scope.postId, $scope.type ).then( function ( response ) {
            $scope.comments = response.data;
        });
    };
}]);