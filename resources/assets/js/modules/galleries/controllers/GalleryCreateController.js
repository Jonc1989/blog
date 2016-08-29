galleries.controller('GalleryCreateController', ['$scope', 'GalleriesService', 'Upload', function($scope,
                                                                                              GalleriesService, Upload) {

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
        if($scope.files)
        {
            if(  $scope.gallerySaved == false )
            {
                GalleriesService.save($scope.name).then(function(response)
                {
                    if( response.errors != undefined )
                    {
                        var $form = $( '.form-group' );
                        //$form.find( '.help-block' ).remove();
                        $form.removeClass( 'has-error' );
                        var $elementGroup = null;

                        for( var key in response.errors )
                        {
                            var obj = response.errors[key];
                            for( var prop in obj )
                            {
                                if( obj.hasOwnProperty( prop ) )
                                {
                                    $elementGroup = $form.find( '#' + key ).closest( '.form-group' );
                                    $elementGroup.append( '<p class="help-block s-errors">' + obj[prop] + '</p>' );
                                    $elementGroup.addClass( 'has-error' );
                                }
                            }
                        }
                    }
                    $scope.galleryId = response;
                    $scope.uploadGallery($scope.galleryId);
                    $scope.gallerySaved = true;
                });
            }else{
                $scope.uploadGallery($scope.galleryId);
            }

        }
    };

    $scope.uploadGallery = function(id)
    {
        //GalleriesService.upload($scope.files, id).then(function(response)
        //{
        //
        //});
        var upload = null;
        if ($scope.files && $scope.files.length)
        {
            // NProgress.start();
            angular.forEach($scope.files, function(value, key) {
                if( !$scope.files[key].hasOwnProperty('uploaded') )
                {
                    upload = Upload.upload({
                        url: '/api/save-gallery-images',
                        data: id,
                        file: value
                    }).success(function (response) {

                        $scope.files[key].uploaded = true;
                        $scope.files[key].id = response.data.id;
                    }).error(function (response, status)
                    {
                        //NProgress.done();
                    });
                }
            });
        }

        upload.then(function(success, error, progress)
        {
            if(error == undefined)
            {
                $scope.uploaded = true;
                //NProgress.done();
            }
        });
    };

    $scope.deleteImage = function(id)
    {
        GalleriesService.delete(id).then(function(response)
        {
            if( response.errors == undefined )
            {
                for( var i = 0; i < $scope.files.length; i++)
                {
                    if( $scope.files[i].id == id)
                    {
                        $scope.files.splice( i, 1 );
                    }
                }
            }
        });
    };
    

}]);
