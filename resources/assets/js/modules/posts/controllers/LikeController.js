post.controller( 'LikeController', ['$scope', 'PostService', function ( $scope, PostService ) {
        
    $scope.likeStatus = false;
    $scope.likes = [];
    $scope.authId = null;
    $scope.postId = null;
    $scope.type = null;
    this.$onInit = function () {
        $scope.likes = this.likes;
        $scope.authId = this.authId;
        $scope.postId = this.postId;
        $scope.type = this.type;
        $scope.checkLikeStatus();
    };

    $scope.checkLikeStatus = function () {
        $scope.likeStatus = $scope.checkLikes( $scope.likes, $scope.authId );
    };

    $scope.checkLikes = function(likes, auth) {
        return likes.some(function(like) {
            return auth === like.user_id;
        });
    };

    $scope.like = function () {
        PostService.like( $scope.authId, $scope.postId, $scope.likeStatus, $scope.type ).then(function ( response ) {
            $scope.getLikes();
        });
    };

    $scope.getLikes = function () {
        PostService.getLikes( $scope.postId ).then(function ( response ) {
            $scope.likes = response;
            $scope.checkLikeStatus();
        });
    };
        
        
        
    }]);