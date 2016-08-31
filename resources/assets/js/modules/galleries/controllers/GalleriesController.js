galleries.controller('GalleriesController', ['$scope', 'GalleriesService', '$state', function($scope,
                                                                        GalleriesService, $state ) {

    $scope.galleryData = [];
    
    this.$onInit = function () {
        $state.go( 'all' );
    };
    
    $scope.getGalleries = function(auth)
    {
        GalleriesService.all(auth).then(function(response)
        {
            $scope.galleryData = response;
        });
    };
    //
    // $scope.mineGalleries = function( auth )
    // {
    //     GalleriesService.all(auth).then(function(response)
    //     {
    //         $scope.galleryData = response;
    //     });
    // };

}]);
