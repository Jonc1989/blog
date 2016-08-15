/**
 * Created by Janis on 06.08.2016..
 */
var app = angular.module( 'app', [
    'ngComponentRouter',
    'uiGmapgoogle-maps',
    'ngFileUpload',
    'home',
    'users'

] ).config(
    ['uiGmapGoogleMapApiProvider', function(GoogleMapApiProviders) {
        GoogleMapApiProviders.configure({
            china: true,
            libraries: 'weather,geometry,visualization'
        });
    }]
);

var home = angular.module('home', [

]);

var user = angular.module('users', [
    
]);

/**
 * Created by Janis on 06.08.2016..
 */
app.component( 'info', {
    templateUrl: '/api/view/modules.home.api.info',
    controller: 'UserController',
    bindings: {
        id: '<'
    }
})

app.component( 'online', {
    templateUrl: '/api/view/modules.home.api.online',
    controller: 'OnlineController'
})
app.component( 'search', {
    templateUrl: '/api/view/modules.home.api.search',
    controller: 'SearchController'
})
home.controller( 'OnlineController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.users = [];
    
    this.$onInit = function () {
        var details = ['name', 'surname', 'photo'];
        UserService.onlineUsers( details ).then( function( response )
        {
            $scope.users = response;
        });
    };

}]);
user.controller( 'SearchController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.searchKey = '';
    $scope.searchResults = [];
    
    $scope.search = function()
    {
        if( $scope.searchKey.length > 2)
        {
            UserService.search($scope.searchKey).then( function( response )
            {
                console.log(response);
                $scope.searchResults = response;
            });
        }else if( $scope.searchKey.length < 1 ){
            $scope.searchResults = [];
        }
    };
    
    $scope.showUser = function(id)
    {
        window.location.href = '/user/' + id;
    };

    $scope.hideSearchResults = function () {
        setTimeout( function () {
            $('#search-results').hide();
        }, 100 );
    }

    $scope.showSearchResults = function () {
        $('#search-results').show();
    }
}]);
app.component( 'posts', {
    templateUrl: '/api/view/modules.posts.api.posts',
    controller: 'PostController',
    bindings: {
        userid: '<'
    }
})
app.service( 'PostService', ['$http', '$q', function( $http, $q )
    {
        var PostService = {

                save:  function(post)
                {
                    if( post != '' ){
                        var data = {
                            post: post
                        };
                        var deferred = $q.defer();
                        $http.post( '/api/posts', data )
                            .success( function( response )
                            {
                                deferred.resolve( response );
                            } )
                            .error( function()
                            {
                                deferred.reject();
                            } );

                        return deferred.promise;
                    }
                },

            getPosts:  function( perPage, current, id )
            {
                var deferred = $q.defer();
                $http.get( '/api/posts', { params: {per_page: perPage, current: current, id: id }})
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            }
        };
        return PostService;
    }] );
app.controller( 'PostController', [ 'PostService', '$scope', 'Upload', function ( PostService, $scope, Upload ) {

    $scope.postContent = null;
    $scope.userid = null;
    $scope.posts = [];
    $scope.address = '';
    $scope.map = { center: { latitude: 56.526248, longitude: 27.357412599999975 }, zoom: 15 };
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

        $scope.searchBox.addListener('places_changed', function() {
            var places =  $scope.searchBox.getPlaces();
            console.log(places);
            $scope.map.center.latitude = places[0].geometry.location.lat()
            $scope.map.center.longitude = places[0].geometry.location.lng()


        });


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
        if( $scope.postContent != null || $scope.files != undefined )
        {
            PostService.save($scope.postContent).then( function( response )
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



    };

    $scope.$on('post-added', function(event, args) {
        $scope.getPosts();
    });




}]);
user.component( 'invitation', {
    templateUrl: '/api/view/modules.users.api.invitation',
    controller: 'InvitationController',
    bindings: {
        friendid: '<',
        myid: '<'
    }
})
user.controller( 'InvitationController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.myId = null;
    $scope.friendId = null;
    $scope.friendStatus = null;


    this.$onInit = function () {
        $scope.friendId = this.friendid;
        $scope.myId = this.myid;
        UserService.getStatus($scope.friendId).then( function ( response ) {
            console.log(response);

            if(response.length == 0) {
                $scope.friendStatus = 0; //nav draugi
            }else if( response[0].user_id == $scope.myId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 1; //uzaicinājums nosūtīts
                }else{
                    $scope.friendStatus = 2; //uzaicinājums apstiprināts
                }
            }else if( response[0].friend_id == $scope.friendId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 3; //uzaicinājums saņemts
                }else{
                    $scope.friendStatus = 4; //uzaicinājumu apstiprināju
                }
            }
            console.log( $scope.friendStatus );

        });
    };

    $scope.invite = function () {
        UserService.invite( $scope.friendId ).then( function( response )  {        });
    };



}]);
user.controller( 'UserController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.user = null;


    this.$onInit = function () {
        var details = [ 'name', 'surname', 'photo' ];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);
user.service( 'UserService', ['$http', '$q', function( $http, $q )
    {

        var UserService = {

            getUser:  function( id, details )
            {
                var deferred = $q.defer();
                $http.get( '/api/users/' + id,
                    {
                        params: details
                    })
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },

            onlineUsers:  function( details )
            {
                var deferred = $q.defer();
                $http.get( '/api/online',
                    {
                        params: details
                    })
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },

            Users:  function()
            {
                var deferred = $q.defer();
                $http.get( 'api/users' )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
             invite: function(id)
             {
                 var deferred = $q.defer();
                 $http.get( '/api/users/add/' + id )
                     .success( function( response )
                     {
                         deferred.resolve( response );
                     } )
                     .error( function()
                     {
                         deferred.reject();
                     } );

                 return deferred.promise;
             },

            getStatus: function( id )
            {
                var deferred = $q.defer();
                $http.get( '/api/user/status/' + id )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
            
            
            
            
            
            
            
            
            
            
            
            
            
            invitations: function()
            {
                var deferred = $q.defer();
                $http.get( '/api/invitations' )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
            acceptInvitation: function(userId, invitorId)
            {
                var params = {
                    user: userId,
                    invitor: invitorId
                };
                var deferred = $q.defer();
                $http.post( '/api/accept-invite/', params )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            },
            cancel: function(id)
            {
                var deferred = $q.defer();
                $http.get( '/api/user/cancel-friendship/' + id )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;
            },
            search:  function(string)
            {
                var deferred = $q.defer();
                $http.get( '/api/users/search/' + string )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            }
        };
        return UserService;
    }] );
//# sourceMappingURL=all.js.map
