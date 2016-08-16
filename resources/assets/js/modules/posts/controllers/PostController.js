app.controller( 'PostController', [ 'PostService', '$scope', 'Upload', function ( PostService, $scope, Upload ) {

    $scope.postContent = null;
    $scope.userid = null;
    $scope.posts = [];
    $scope.post = {
        content: '',
        location: '',
        latitude: '',
        longitude: ''
    };


    //$scope.map = { center: { latitude: 56.526248, longitude: 27.357412599999975 }, zoom: 15 };
    $scope.searchBox = null;
    
    $scope.current_page = 1;
    $scope.last_page = undefined;
    $scope.next_page = 1;
    $scope.per_page = 2;
    $scope.loading = false;

    this.$onInit = function () {
        var input = document.getElementById('search-box');
        $scope.searchBox = new google.maps.places.SearchBox(input);
        $scope.userid = this.userid;
        $scope.getPosts();

        $scope.searchBox.addListener('places_changed', $scope.setLocation);


    };

    $scope.setLocation = function () {
        var places =  $scope.searchBox.getPlaces();
        console.log(places);
        $scope.post.location = places[0].formatted_address;
        $scope.post.latitude = places[0].geometry.location.lat();
        $scope.post.longitude = places[0].geometry.location.lng();
    };
    
    $(window).scroll(function() {
        if($(window).scrollTop() == $(document).height() - $(window).height() && $scope.loading == false ){
            if($scope.current_page != $scope.last_page){
                $scope.getPosts();
            }
        }
    });

    // $scope.findCoordinates = function (address) {
    //     var geocoder = new google.maps.Geocoder();
    //     geocoder.geocode({
    //         "address": address
    //     }, function(results) {
    //         console.log(address);
    //         $scope.map.center.latitude = results[0].geometry.location.lat()
    //         $scope.map.center.longitude = results[0].geometry.location.lng()
    //     });
    // };


    $scope.getPosts = function () {
        $scope.loading = true;
        PostService.getPosts( $scope.per_page, $scope.next_page, $scope.userid  ).then(function ( response ) {
            if( response.current_page <= response.last_page ){

                response.data.forEach(function (post) {
                    $scope.posts.push( post );
                });

                $scope.next_page = response.current_page + 1;
                $scope.per_page = response.per_page;
                $scope.current_page = response.current_page;
                $scope.last_page = response.last_page;
            }
            $scope.loading = false;
        });
    };

    $scope.savePost = function() {
        if( $scope.postContent != null )
        {

            PostService.save($scope.postContent, $scope.post.location, $scope.post.latitude, $scope.post.longitude )
                .then( function( response )
            {
                if( $scope.files != undefined )
                {
                    var id = response;
                    Upload.upload({
                        url: '/api/posts/save-file',
                        data: { files: $scope.files, id: id }}
                    )
                        .success(function (response) {
                            $scope.files = null;
                        });
                }

                $scope.$broadcast('post-added');
                $scope.postContent = null;
            });
        }
    };

    $scope.details = {};

    $scope.addLocation = function () {
        $('#search-box').show();


    };

    $scope.$on('post-added', function(event, args) {
        $scope.getPosts();
    });




}]);