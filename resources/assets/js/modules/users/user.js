var user = angular.module('users', [ function () {
    

}])
    .config(function($stateProvider, $urlRouterProvider) {
        //
        // For any unmatched url, redirect to /state1
        $urlRouterProvider.otherwise("/");
        //
        // Now set up the states
        $stateProvider
            .state('posts', {
                url: "/",
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
    });
