galleries.controller('GalleryDetailsController', ['$scope', 'GalleriesService', '$stateParams',
    function($scope, GalleriesService, $stateParams) {
        
        $scope.id = $stateParams.id;
        $scope.gallery = {};

        this.$onInit = function()
        {
            GalleriesService.gallery($scope.id).then(function(response)
            {
                $scope.gallery = response;
            });
        };


    }]);
