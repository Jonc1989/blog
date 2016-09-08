galleries.controller('GalleryDetailsController', ['$scope', 'GalleriesService', '$stateParams',
    function($scope, GalleriesService, $stateParams) {
        
        $scope.id = $stateParams.id;
        $scope.gallery = {};
        $scope.currentImagePath = '';
        $scope.currentImageIndex = null;
        this.$onInit = function()
        {
            GalleriesService.gallery($scope.id).then(function(response)
            {
                $scope.gallery = response;
                //console.log($scope.gallery)
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
        }

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
                $scope.currentImagePath = $scope.gallery.images[$scope.currentImageIndex].file_name;
            }

        }, true );

    }]);
