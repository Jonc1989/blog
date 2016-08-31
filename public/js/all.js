var app = angular.module( 'app', [
    'ui.router',
    'ngFileUpload',
    'home',
    'posts',
    'users',
    'messages',
    'galleries',
    'ngDialog'

] );


var galleries = angular.module('galleries', [

]).config([ '$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {


    // $urlRouterProvider.otherwise(function($injector, $location){
    //     console.log('shit happens');
    // });
    //$urlRouterProvider.otherwise("/all");
    $stateProvider
        .state('all', {
            url: "/all",
            templateUrl: "/api/view/modules.galleries.api.all",
            controller: "FriendGalleriesController"
        })
        .state('mine', {
            url: "/mine",
            templateUrl: "/api/view/modules.galleries.api.all",
            controller: "MineGalleriesController"
        })
        .state('create', {
            url: "/create",
            templateUrl: "/api/view/modules.galleries.api.create",
            controller: "GalleryCreateController",
        })
        .state('show', {
            url: "/show/:id",
            templateUrl: "/api/view/modules.galleries.api.details",
            controller: "GalleryDetailsController",
        })


}]);

var home = angular.module('home', [

]);

var messages = angular.module('messages', [

])
    .config(function($stateProvider, $urlRouterProvider) {

        //$urlRouterProvider.otherwise("/");

        // $stateProvider
        //     .state('messages', {
        //         url: "/:id",
        //         templateUrl: "/api/view/modules.messages.api.content",
        //         controller: "PostController",
        //         params: {
        //             id: null
        //         }
        //     })
        //     .state('friends', {
        //         url: "/friends",
        //         templateUrl: "/api/view/modules.users.api.friends",
        //         controller: 'FriendsController',
        //         params: {
        //             id: null
        //         }
        //     });
    });

var post = angular.module('posts', [

]);

var user = angular.module('users', [ ])
    .config([ '$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
        //
        // For any unmatched url, redirect to /state1
        //$urlRouterProvider.otherwise("/posts");
        //
        // Now set up the states
        $stateProvider
            .state('posts', {
                url: "/posts",
                templateUrl: "/api/view/modules.posts.api.posts",
                controller: "PostController",
                params: {
                    id: null
                }
            })
            .state('friends', {
                url: "/friends",
                templateUrl: "/api/view/modules.users.api.friends",
                controller: 'FriendsController',
                params: {
                    id: null
                }
            });
    }]);

galleries.controller('FriendGalleriesController', ['$scope', '$controller', function($scope, $controller ) {
    
    
    this.$onInit = function () {
        $controller('GalleriesController', { $scope: $scope });
        $scope.getGalleries( false );
    };

}]);

galleries.controller('GalleriesController', ['$scope', 'GalleriesService', '$state', function($scope,
                                                                        GalleriesService, $state ) {

    $scope.galleryData = [];
    
    this.$onInit = function () {
        $state.go( 'all' );
    };
    
    $scope.getGalleries = function(auth)
    {
        GalleriesService.all(auth).then(function(response)
        {
            $scope.galleryData = response;
        });
    };
    //
    // $scope.mineGalleries = function( auth )
    // {
    //     GalleriesService.all(auth).then(function(response)
    //     {
    //         $scope.galleryData = response;
    //     });
    // };

}]);

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

galleries.controller('GalleryDetailsController', ['$scope', 'GalleriesService', '$stateParams',
    function($scope, GalleriesService, $stateParams) {
        
        $scope.id = $stateParams.id;
        $scope.gallery = {};

        this.$onInit = function()
        {
            GalleriesService.gallery($scope.id).then(function(response)
            {
                $scope.gallery = response;
            });
        };


    }]);

galleries.controller('MineGalleriesController', ['$scope', '$controller', function($scope, $controller ) {

    this.$onInit = function () {
        $controller('GalleriesController', { $scope: $scope });
        $scope.getGalleries( true );
    };


}]);

galleries.service( 'GalleriesService', ['$http', '$q', 'Upload', function( $http, $q, Upload )
    {

        var GalleriesService = {

            upload: function (files, id)
            {
                if (files && files.length)
                {
                    var deferred = $q.defer();

                    for (var i = 0; i < files.length; i++)
                    {

                        var file = files[i];
                        Upload.upload({
                            url: '/api/save-gallery-images',
                            data: id,
                            file: file
                        }).progress(function (evt) {

                        }).success(function (response) {
                            //console.log(response);
                            deferred.resolve( response );
                        }).error(function (response, status)
                        {
                            if (status === 422)
                            {
                                deferred.resolve({errors: response});
                            } else
                            {
                                deferred.reject();
                            }
                        });

                    }
                    return deferred.promise;
                }
            },
            save: function( name )
            {
                var deferred = $q.defer();
                var data = {
                    name: name
                };
                $http.post( '/api/galleries/', data )
                    .success( function( response )
                    {console.log();
                        deferred.resolve( response );
                    } )
                    .error( function( response, status )
                    {
                        if (status === 422)
                        {
                            deferred.resolve({errors: response});
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;

            },

            all: function( auth )
            {
                var deferred = $q.defer();
                $http.get( '/api/galleries/', { params: { auth: auth } } )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function( response, status )
                    {
                        if (status === 422)
                        {
                            deferred.resolve({errors: response});
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;

            },

            // mine: function(id)
            // {
            //     var deferred = $q.defer();
            //     $http.get( '/api/galleries/' + id)
            //         .success( function( response )
            //         {
            //             deferred.resolve( response );
            //         } )
            //         .error( function( response, status )
            //         {
            //             if (status === 422)
            //             {
            //                 deferred.resolve({errors: response});
            //             } else
            //             {
            //                 deferred.reject();
            //             }
            //         } );
            //
            //     return deferred.promise;
            //
            // },
            gallery: function(id)
            {
                var deferred = $q.defer();
                $http.get( '/api/galleries/' + id)
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function( response, status )
                    {
                        if (status === 422)
                        {
                            deferred.resolve({errors: response});
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;

            },
            delete: function(id)
            {
                var deferred = $q.defer();
                $http.delete( '/api/galleries/' + id)
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function( response, status )
                    {
                        if (status === 422)
                        {
                            deferred.resolve({errors: response});
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;

            },

        };
        return GalleriesService;
    }] );
/**
 * Created by Janis on 06.08.2016..
 */
app.component( 'info', {
    templateUrl: '/api/view/modules.home.api.info',
    controller: 'InfoController',
    bindings: {
        id: '<'
    }
})
home.component( 'invitations', {
    templateUrl: '/api/view/modules.home.api.invitations',
    controller: 'InvitationsController'
})

app.component( 'online', {
    templateUrl: '/api/view/modules.home.api.online',
    controller: 'OnlineController'
})
app.component( 'search', {
    templateUrl: '/api/view/modules.home.api.search',
    controller: 'SearchController'
})
user.controller( 'InfoController', [ 'UserService', '$scope', function ( UserService, $scope ) {
    $scope.user = null;

    // $scope.init = function (id) {
    //     this.id = id;
    //    
    // };

    this.$onInit = function () {
        var details = [ 'id', 'name', 'surname', 'photo' ];
        UserService.getUser( this.id, details ).then( function( response )
        {
            $scope.user = response;
        });
    };
    
}]);
home.controller( 'InvitationsController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.invitations = [];
    this.$onInit = function () {
        $scope.getInvitations();
    };
    
    $scope.getInvitations = function () {
        UserService.invitations().then( function( response )  {
            $scope.invitations = response;
        });
    };
    
    $scope.accept = function ( id ) {
        UserService.changeStatus( id, 3 ).then( function( response )  {
            
            $scope.$broadcast('invitation-accepted');
        });
    };

    $scope.$on('invitation-accepted', function(event, args) {
        $scope.getInvitations();
    });
}]);
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
messages.controller('MessagesController', ['$scope', 'MessageService', function ( $scope, MessageService ) {

    $scope.friendId = null;
    $scope.messages = {};
    $scope.users = {};
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };

    this.$onInit = function () {
        $scope.messangers();
    };

    $scope.messangers = function()
    {
        MessageService.getMessengers().then( function( response )
        {
            $scope.users = response.data;

            if( $scope.users.length ){
                $scope.friendId = $scope.users[0].id;
                $scope.getMessagesFromUser( $scope.friendId );
            }

        });
    };

    $scope.getMessagesFromUser = function( id )
    {
        $scope.friendId = id;
        MessageService.getMessages( id ).then( function( response )
        {
            $scope.messages = response;

            console.log( $scope.messages );
        });
    };

    $scope.sendMessage = function()
    {
        $scope.message.messageText = $scope.messageBody;
        $scope.message.receiver = $scope.friendId;

        MessageService.send($scope.message).then(function(response){
            $scope.messageBody = "";
            $scope.getMessagesFromUser( $scope.friendId );
        });
    };

    $scope.checkMessageBody = function () {
        $scope.messageBody != '' ? $scope.disabled = false : $scope.disabled = true;
    };
    
}]);
messages.service( 'MessageService', ['$http', '$q', function( $http, $q )
    {
        var MessageService = {

            send: function(message)
            {
                var deferred = $q.defer();
                $http.post( '/api/messages', message )
                    .success( function( response )
                    {
                        deferred.resolve( response.data );
                    } )
                    .error( function()
                    {
                        if ( status == 422 )
                        {
                            deferred.resolve( { errors: response } );
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;
            },
            getMessengers:  function()
            {
                var deferred = $q.defer();
                $http.get( '/api/messengers' )
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
            getMessages: function( id )
            {
                var deferred = $q.defer();
                $http.get( '/api/messages/' + id )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        if ( status == 422 )
                        {
                            deferred.resolve( { errors: response } );
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;
            },
            
            
            
            
            
            
            
            
            
            
            
            
            
            loadMore: function( id, currentPage )
            {
                var deferred = $q.defer();
                $http.get( '/api/messages/' + id, { params: { currentPage: currentPage } } )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        if ( status == 422 )
                        {
                            deferred.resolve( { errors: response } );
                        } else
                        {
                            deferred.reject();
                        }
                    } );

                return deferred.promise;
            }
        };
        return MessageService;
    }] );
post.component( 'like', {
    templateUrl: '/api/view/modules.posts.api.like',
    controller: 'LikeController',
    bindings: {
        likes: '@',
        authId: '<',
        postId: '@'
    }
})
post.component( 'posts', {
    templateUrl: '/api/view/modules.posts.api.posts',
    controller: 'PostController',
    bindings: {
        authId: '<'
    }
})
post.controller( 'LikeController', ['$scope', 'PostService', function ( $scope, PostService ) {
        
    $scope.likeStatus = false;
    $scope.likes = [];
    $scope.authId = null;
    $scope.postId = null;
    this.$onInit = function () {
        $scope.likes = JSON.parse( this.likes );
        $scope.authId = this.authId;
        $scope.postId = this.postId;
        $scope.checkLikeStatus();
    };

    $scope.checkLikeStatus = function () {
        $scope.likes.forEach(function ( like ) {
            if( like.user.id == $scope.authId ){
                $scope.likeStatus = true;
            }
        })

    };

    $scope.like = function () {
        PostService.like( $scope.authId, $scope.postId, $scope.likeStatus ).then(function ( response ) {
            console.log( response );
        });
    };    
        
        
        
        
        
    }]);
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

        PostService.getPosts( update == true ? $scope.total + 1 : $scope.per_page, update == true ? $scope.next_page - 1 : $scope.next_page, $scope.authId, $scope.userId  )
            .then(function ( response ) {
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
post.service( 'PostService', ['$http', '$q', function( $http, $q )
    {
        var PostService = {

            save:  function(post, location, lat, lng, authId, userId )
            {
                if( post != '' ){
                    var data = {
                        post: post,
                        location: location,
                        latitude: lat,
                        longitude: lng,
                        authId: authId,
                        userId: userId
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

            getPosts:  function( perPage, current, authid, userId )
            {
                var deferred = $q.defer();
                $http.get( '/api/posts', { params: {per_page: perPage, current: current, authid: authid, userId: userId }})
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

            like: function( authId, postId, status )
            {
                var deferred = $q.defer();
                $http.post( '/api/posts/like', { params: { authId: authId, postId: postId, status: status }})
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
user.component( 'friends', {
    templateUrl: '/api/view/modules.users.api.friends',
    controller: 'FriendsController',
    bindings: {
        id: '<',
    }
})
user.component( 'invitation', {
    templateUrl: '/api/view/modules.users.api.invitation',
    controller: 'InvitationController',
    bindings: {
        friendid: '<',
        myid: '<'
    }
})
/**
 * Created by Admin on 16.08.2016..
 */
app.component( 'userInfo', {
    templateUrl: '/api/view/modules.users.api.user-info',
    controller: 'UserController',
    // $routeConfig: [
    //     { path: "/", component: "posts", name: "posts", useAsDefault: true }
    // ],
    bindings: {
        id: '<'
    }
})
user.controller( 'FriendsController', [ 'UserService', '$scope', '$stateParams', '$rootScope',
    function ( UserService, $scope, $stateParams, $rootScope ) {
    $scope.users = [];

    $scope.id = null;

    this.$onInit = function () {
        $stateParams.id != null ? $scope.id = $stateParams.id : $scope.id = $rootScope.userId;
        UserService.getFriends( $scope.id ).then( function( response )
        {
            console.log(response);
            $scope.users = response;
        });
    };

}]);
user.controller( 'InvitationController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.myId = null;
    $scope.friendId = null;
    $scope.friendStatus = null;
    $scope.friendStatusText = null;
    $scope.cancelText = null;


    this.$onInit = function () {
        $scope.friendId = this.friendid;
        $scope.myId = this.myid;
        $scope.checkStatus();
    };

    $scope.checkStatus = function () {
        UserService.getStatus($scope.friendId).then( function ( response ) {
            if(response.length == 0) {
                $scope.friendStatus = 0; //nav draugi                       //action - uzaicināt
                $scope.friendStatusText = 'Uzaicināt';
            }else if( response[0].user_id == $scope.myId ){
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 1; //uzaicinājums nosūtīts        //action - atcelt uzaicinājumu
                    $scope.friendStatusText = 'Atcelt uzaicinājumu';
                }else{
                    $scope.friendStatus = 2; //uzaicinājums apstiprināts    //action - atcelt draudzību
                    $scope.friendStatusText = 'Atcelt draudzību';
                }
            }else /*if( response[0].friend_id == $scope.friendId )*/{
                if( response[0].friendship == 0 ){
                    $scope.friendStatus = 3; //uzaicinājums saņemts         //action - apstiprināt uzaicinājumu
                    $scope.cancelText = 'Atcelt uzaicinājumu';
                    $scope.friendStatusText = 'Apstiprināt uzaicinājumu';
                }else{
                    $scope.friendStatus = 4; //uzaicinājumu apstiprināju    //action - atcelt draudzību
                    $scope.friendStatusText = 'Atcelt draudzību';
                }
            }
        });
    };

    $scope.changeFriendshipStatus = function () {
        UserService.changeStatus( $scope.friendId, $scope.friendStatus ).then( function( response )  {
            $scope.$broadcast('friend-status-changed');
        });
    };

    $scope.cancelFriendRequest = function () {
        UserService.changeStatus( $scope.friendId, 1 ).then( function( response )  {
            $scope.$broadcast('friend-status-changed');
        });
    };


    $scope.$on('friend-status-changed', function(event, args) {
        $scope.checkStatus();
    });

}]);
user.controller( 'UserController', [ 'UserService', 'MessageService', '$scope', '$rootScope', '$state', 'ngDialog',
    function ( UserService, MessageService, $scope, $rootScope, $state, ngDialog ) {

    $scope.user = null;
    $scope.disabled = true;
    $scope.message = {
        messageText: "",
        receiver: ""
    };

    $scope.init = function (authId, userId) {
        $rootScope.authId = authId;
        $rootScope.userId = userId;
        $state.go('posts');
        var details = [ 'id', 'name', 'surname', 'photo' ];
        UserService.getUser( userId, details ).then( function( response )
        {
            $scope.user = response;
        });
    };

    $scope.sendMessage = function()
    {
        $scope.message.messageText = $scope.messageBody;
        $scope.message.receiver = $scope.user.id;

        MessageService.send($scope.message).then(function(response){
            $scope.messageBody = "";
        });
    };

    $scope.checkMessageBody = function () {
        $scope.messageBody != '' ? $scope.disabled = false : $scope.disabled = true;
    };

    // $scope.ngMessage = function () {
    //     ngDialog.open({ template: '/api/view/modules.messages.api.dialog', className: 'ngdialog-theme-default' });
    // };
    
}]);
user.controller( 'UserEditController', [ 'UserService', '$scope', function ( UserService, $scope ) {

    $scope.user = null;
    $scope.disabled = true;

    $scope.init = function (id) {

        UserService.getUser( id ).then( function( response )
        {
            $scope.user = response;
        });
    };

    $scope.saveUser = function ( ) {
        UserService.updateUser( $scope.user.id, $scope.user ).then( function( response )
        {
           console.log(response);
        });
    }

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

            updateUser: function ( id, user ) {
                var deferred = $q.defer();
                $http.put( '/api/users/' + id,
                    {
                        params: user
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

            getFriends:  function( id )
            {
                var deferred = $q.defer();
                $http.get( '/api/friends/' + id )
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
            changeStatus: function( id, status )
             {
                 var deferred = $q.defer();
                 var data = {
                     id: id,
                     status: status
                 };
                 $http.post( '/api/friends', data )
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
                $http.get( '/api/friend/status/' + id )
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

            },
            invitations: function()
            {
                var deferred = $q.defer();
                $http.get( '/api/friends/invitations' )
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
app.directive('map', function () {
    return {
        link: function(scope, elem, attrs) {
            var div= $('<div/>', { id: 'map_' + attrs.id });
            $(elem).append( div );
            var map = new google.maps.Map(document.getElementById('map_' + attrs.id), {
                center: {lat: parseFloat(attrs.latitude), lng: parseFloat(attrs.longitude) },
                zoom: 13,
                mapTypeId: 'roadmap'
            });
        }
    }
});
app.factory('SocketFactory', function ($rootScope) {
    var socket = io('http://localhost:3000');
    return {
        on: function (eventName, callback) {
            socket.on(eventName, function () {
                console.log( eventName );
                var args = arguments;
                $rootScope.$apply(function () {
                    callback.apply(socket, args);
                });
            });
        },
        emit: function (eventName, data, callback) {
            socket.emit(eventName, data, function () {
                var args = arguments;
                $rootScope.$apply(function () {
                    if (callback) {
                        callback.apply(socket, args);
                    }
                });
            })
        },
        removeAllListeners: function (eventName, callback) {
            socket.removeAllListeners(eventName, function() {
                var args = arguments;
                $rootScope.$apply(function () {
                    callback.apply(socket, args);
                });
            });
        }
    };
});
//# sourceMappingURL=all.js.map
