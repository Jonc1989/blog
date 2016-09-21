galleries.controller('GalleryDetailsController', ['$scope', 'GalleriesService', '$stateParams',
    function($scope, GalleriesService, $stateParams) {
        
        $scope.id = $stateParams.id;
        $scope.gallery = {};
        $scope.currentImagePath = '';
        $scope.currentImageIndex = null;
        $scope.currentImageId = null;
        $scope.rating = null;
        this.$onInit = function()
        {
            GalleriesService.gallery($scope.id).then(function(response)
            {
                $scope.gallery = response;
            });
        };

        $scope.open = function ( image ) {

            $scope.currentImagePath = image.file_name;
            $.each( $scope.gallery.images, function (i, img) {
                if( img.id == image.id ){

                    $scope.currentImageIndex = i;
                }
            });

            $('#imageModal').modal('show')
        };

        $scope.next = function ()
        {
            if( $scope.currentImageIndex < ($scope.gallery.images.length - 1) )
            {
                $scope.currentImageIndex++;
            }else{
                $scope.currentImageIndex = 0;
            }

        };

        $scope.previous = function ()
        {
            if( $scope.currentImageIndex <= ($scope.gallery.images.length - 1) && $scope.currentImageIndex > 0)
            {
                $scope.currentImageIndex--;
            }else{
                $scope.currentImageIndex = ($scope.gallery.images.length - 1);
            }
        };


        $scope.$watch( 'currentImageIndex', function( newVal, oldVal )
        {
            if( newVal !== oldVal  )
            {
                $scope.currentImageId = $scope.gallery.images[$scope.currentImageIndex].id;
                $scope.currentImagePath = $scope.gallery.images[$scope.currentImageIndex].file_name;
                $scope.rating = $scope.gallery.images[$scope.currentImageIndex].rating; console.log( $scope.rating );

            }

        }, true );

    }]);
