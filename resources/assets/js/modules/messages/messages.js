var messages = angular.module('messages', [
    
])
    .config(function($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise("/");

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
