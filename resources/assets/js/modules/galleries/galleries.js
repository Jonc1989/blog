var galleries = angular.module('galleries', [
]).config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");
    // $urlRouterProvider.otherwise(function($injector, $location){
    //     console.log('shit happens');
    // });

    $stateProvider
        .state('all', {
            url: "/",
            templateUrl: "/api/view/modules.galleries.api.all",
            controller: "GalleriesController",
            onEnter: function(){
                console.log('onEnter')
            },
            onExit: function(){
                console.log( 'onExit' );
            }
        })
        .state('create', {
            url: "/create",
            templateUrl: "/api/view/modules.galleries.api.create",
            controller: "GalleryCreateController",
        })


});