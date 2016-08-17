/**
 * Created by Janis on 06.08.2016..
 */
var app = angular.module( 'app', [
    //'ngComponentRouter',
    'ui.router',
    'uiGmapgoogle-maps',
    'ngFileUpload',
    'home',
    'posts',
    'users',
    'messages'
    // function () {
    //     app.value("$routerRootComponent", "userInfo");
    // }

] ).config(
    ['uiGmapGoogleMapApiProvider', function(GoogleMapApiProviders) {
        GoogleMapApiProviders.configure({
            china: true,
            libraries: 'weather,geometry,visualization'
        });
    }]
);
