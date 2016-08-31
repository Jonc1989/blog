galleries.controller('FriendGalleriesController', ['$scope', '$controller', function($scope, $controller ) {
    
    
    this.$onInit = function () {
        $controller('GalleriesController', { $scope: $scope });
        $scope.getGalleries( false );
    };

}]);
