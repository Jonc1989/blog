galleries.controller('GalleriesController', ['$scope', 'GalleriesService', 'Upload', function($scope,
                                                                                        GalleriesService, Upload) {
    this.$onInit = function () {
        console.log('init');
        $scope.friendGalleries();
    };


    

    $scope.friendGalleries = function()
    {
        GalleriesService.all().then(function(response)
        {
            console.log(response)
            $scope.galleryData = response;
        });
    };

    $scope.mineGalleries = function(id)
    {
        GalleriesService.mine(id).then(function(response)
        {
            console.log(response)
            $scope.galleryData = response;
        });
    };

}]);
