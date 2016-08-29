var galleries = angular.module('galleries', [
]).config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('create', {
            url: "/create",
            templateUrl: "/api/view/modules.galleries.api.create",
            controller: "GalleryCreateController",
        })

});