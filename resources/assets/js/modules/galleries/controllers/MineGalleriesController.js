galleries.controller('MineGalleriesController', ['$scope', '$controller', function($scope, $controller ) {

    this.$onInit = function () {
        $controller('GalleriesController', { $scope: $scope });
        $scope.getGalleries( true );
    };


}]);
