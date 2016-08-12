/**
 * Created by Janis on 06.08.2016..
 */
var app = angular.module( 'app', [
    'ngComponentRouter',
    'uiGmapgoogle-maps',
    'home',
    'users'

] ).config(
    ['uiGmapGoogleMapApiProvider', function(GoogleMapApiProviders) {
        GoogleMapApiProviders.configure({
            china: true,
            libraries: 'weather,geometry,visualization,places'
        });
    }]
);
