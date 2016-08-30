var galleries = angular.module('galleries', [
]).config(function($stateProvider, $urlRouterProvider) {


    // $urlRouterProvider.otherwise(function($injector, $location){
    //     console.log('shit happens');
    // });
    // $urlRouterProvider.otherwise("/all");
    // $stateProvider
    //     .state('all', {
    //         url: "/all",
    //         templateUrl: "/api/view/modules.galleries.api.all",
    //         controller: "GalleriesController",
    //         onEnter: function(){
    //             console.log('onEnter')
    //         },
    //         onExit: function(){
    //             console.log( 'onExit' );
    //         }
    //     })
    //     .state('create', {
    //         url: "/create",
    //         templateUrl: "/api/view/modules.galleries.api.create",
    //         controller: "GalleryCreateController",
    //     })


});