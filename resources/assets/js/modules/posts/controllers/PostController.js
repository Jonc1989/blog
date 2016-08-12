app.controller( 'PostController', [ 'PostService', '$scope', function ( PostService, $scope ) {

    $scope.postContent = null;
    $scope.posts = [];
    // $scope.wall = {
    //     posts: [],
    //     next_from: 0,
    //     has_more: ''
    //
    // };

    this.$onInit = function () {
        PostService.getPosts().then(function ( response ) {
            $scope.posts = response.data;
            console.log(response.data);
        });
    };
    
    
    $scope.savePost = function()
    {console.log('click')
        if( $scope.postContent != null )
        {
            PostService.save($scope.postContent).then( function( response )
            {
                $scope.$broadcast('post-added');
                $scope.postContent = null;
            });
        }

    };
    
}]);