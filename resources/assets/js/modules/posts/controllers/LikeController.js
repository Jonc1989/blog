post.controller( 'LikeController', ['$scope', 'PostService', 'SocketFactory', function ( $scope, PostService, SocketFactory ) {
        
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
        SocketFactory.on('like', function (data) {
            if( data.params.postId == $scope.postId && data.params.type == $scope.type ){
                $scope.getLikes();
            }
        });
    };

    this.$onChanges = function ( bindings) {
        if( bindings.postId !== undefined && bindings.postId.currentValue !== $scope.postId ){
            $scope.postId = bindings.postId.currentValue;
        }
        if( bindings.authId !== undefined && bindings.authId.currentValue !== $scope.authId ){
            $scope.authId = bindings.authId.currentValue;
        }
        if( bindings.type !== undefined && bindings.type.currentValue !== $scope.type ){
            $scope.type = bindings.type.currentValue;
        }
        if( $scope.postId !== undefined && $scope.type !== undefined){
            $scope.getLikes();
        }
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
        PostService.getLikes( $scope.postId, $scope.type ).then(function ( response ) {
            $scope.likes = response;
            $scope.checkLikeStatus();
        });
    };
        
        
        
    }]);