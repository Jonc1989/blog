app.controller( 'PostController', [ 'PostService', '$scope', function ( PostService, $scope ) {

    $scope.postContent = null;
    $scope.posts = [];
    $scope.address = '';
    $scope.map = { center: { latitude: 56.526248, longitude: 27.357412599999975 }, zoom: 15 };

    $scope.findCoordinates = function (address) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            "address": address
        }, function(results) {
            console.log(address);
            $scope.map.center.latitude = results[0].geometry.location.lat()
            $scope.map.center.longitude = results[0].geometry.location.lng()
        });
    };




    this.$onInit = function () {
        PostService.getPosts().then(function ( response ) {
            $scope.posts = response.data;
        });
    };
    
    
    $scope.savePost = function()
    {console.log('click')
        if( $scope.postContent != null )
        {
            PostService.save($scope.postContent).then( function( response )
            {
                $scope.$broadcast('post-added');
                $scope.postContent = null;
            });
        }

    };
    
}]);