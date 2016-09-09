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
            })
            .state('visitors', {
                url: "/visitors",
                templateUrl: "/api/view/modules.users.api.visitors",
                controller: "VisitorController"
            })
            .state('events', {
                url: "/events",
                templateUrl: "/api/view/modules.users.api.events",
                controller: "EventController"
            });
    }]);
