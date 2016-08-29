galleries.controller('GalleriesController', ['$scope', 'GalleriesService', 'Upload', function($scope,
                                                                                        GalleriesService, Upload) {
    


    

    $scope.allGalleries = function()
    {
        GalleriesService.all().then(function(response)
        {
            $scope.galleries = response;
        });
    };

    $scope.mineGalleries = function(id)
    {
        GalleriesService.mine(id).then(function(response)
        {

            $scope.galleries = response;
        });
    };

}]);
