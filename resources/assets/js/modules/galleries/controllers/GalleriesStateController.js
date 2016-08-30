galleries.controller('GalleriesStateController', ['$state', function( $state ) {
    
    this.$onInit = function () {
        console.log('state change time')
        $state.go( 'all' );
    };
    

}]);
