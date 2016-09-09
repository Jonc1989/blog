galleries.controller('GalleryCreateController', ['$scope', 'GalleriesService', 'Upload', function($scope,
                                                                                              GalleriesService, Upload) {
    $scope.name = '';
    $scope.files = null;
    $scope.uploaded = false;
    $scope.gallerySaved = false;

    $scope.$watch('files', function () {
        if ($scope.files != '') {
            $scope.previewFiles = $scope.files;
        }
    });

    $scope.save = function()
    {
        if( $scope.name != '' )
        {
            Upload.upload({
                url: '/api/galleries/',
                data: { files: $scope.files, name: $scope.name }}
            ).success(function (response) {
                $scope.files = null;
                $scope.clearInputs();
            });

        }
    };

    $scope.clearInputs = function () {
        $scope.name = '';
    };


    $scope.deleteImage = function(image)
    {
  console.log( image );

        for( var i = 0; i < $scope.files.length; i++)
        {
            if ($scope.files[i].name === image.name ) {
                $scope.files.splice(i, 1);
            }
        }

    };
    

}]);
