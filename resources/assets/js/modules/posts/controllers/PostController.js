post.controller( 'PostController', [ 'PostService', '$scope', 'Upload', '$stateParams', '$rootScope', 'SocketFactory',
    function ( PostService, $scope, Upload, $stateParams, $rootScope, SocketFactory ) {

    $scope.postContent = null;
    $scope.id = null;
    $scope.posts = [];
    $scope.post = {
        content: '',
        location: '',
        latitude: '',
        longitude: ''
    };
    $scope.details = {};
    $scope.searchBox = null;
    
    $scope.current_page = 1;
    $scope.total = 0;
    $scope.last_page = undefined;
    $scope.next_page = 1;
    $scope.per_page = 5;
    $scope.loading = false;



    this.$onInit = function () {

        if( this.authId !== undefined ){
            $scope.authId = this.authId;
            $scope.userId = undefined;
            $scope.id = this.authId;
        }else{
            $scope.authId = $rootScope.authId;
            $scope.userId = $rootScope.userId;
            $scope.id = $scope.userId
        }

        //$stateParams.id != null ? $scope.id = $stateParams.id : $scope.id = $rootScope.authId;
        var input = document.getElementById('search-box');
        $scope.searchBox = new google.maps.places.SearchBox(input);
        $scope.getPosts();

        $scope.searchBox.addListener('places_changed', $scope.setLocation);
        SocketFactory.on('post-added', function (data) {
            $scope.getPosts( true );
        });
        $scope.$on('$destroy', function (event) {
            SocketFactory.removeAllListeners();
        });
    };

    $scope.setLocation = function () {
        var places =  $scope.searchBox.getPlaces();
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


    $scope.getPosts = function ( update ) {
        $scope.loading = true;

        PostService.getPosts( update == true ? $scope.total + 1 : $scope.per_page, update == true ? $scope.next_page - 1 : $scope.next_page, $scope.authId, $scope.userId  ).then(function ( response ) { console.log(response)
            if( response.current_page <= response.last_page ){

                if( update ){
                    $scope.posts = response.data
                }else{
                    response.data.forEach(function (post) {
                        $scope.posts.push( post );
                    });
                }

                $scope.next_page = response.current_page + 1;
                $scope.per_page = response.per_page;
                $scope.current_page = response.current_page;
                $scope.last_page = response.last_page;
                $scope.total = response.total;
            }
            $scope.loading = false;
        });
    };

    $scope.savePost = function() {
        if( $scope.postContent != null )
        {

            PostService.save($scope.postContent, $scope.post.location, $scope.post.latitude, $scope.post.longitude, $scope.authId, $scope.userId  )
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
                            $scope.clearInputs();
                        });
                }else{
                    $scope.clearInputs()
                }



            });
        }

    };



    $scope.addLocation = function () {
        $('#search-box').show();
    };


        


    $scope.$on('refresh', function(event, args) {

    });

    $scope.clearInputs = function () {
        $scope.postContent = null;
        $scope.post.location = '';
        $scope.post.latitude = '';
        $scope.post.longitude = '';
        $('#search-box').val('');
        //SocketFactory.emit('post-added');
        $scope.$broadcast('refresh');
    };


}]);