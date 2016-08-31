post.controller( 'LikeController', ['$scope', 'PostService', function ( $scope, PostService ) {
        
    $scope.likeStatus = false;
    $scope.likes = [];
    $scope.authId = null;
    $scope.postId = null;
    this.$onInit = function () {
        $scope.likes = JSON.parse( this.likes );
        $scope.authId = this.authId;
        $scope.postId = this.postId;
        $scope.checkLikeStatus();
    };

    $scope.checkLikeStatus = function () {
        $scope.likes.forEach(function ( like ) {
            if( like.user.id == $scope.authId ){
                $scope.likeStatus = true;
            }
        })

    };

    $scope.like = function () {
        PostService.like( $scope.authId, $scope.postId, $scope.likeStatus ).then(function ( response ) {
            console.log( response );
        });
    };    
        
        
        
        
        
    }]);