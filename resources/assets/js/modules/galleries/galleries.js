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
