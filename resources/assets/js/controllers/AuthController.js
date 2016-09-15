app.controller('AuthController', ['$scope', 'ValidationService', function( $scope, ValidationService ) {

    $scope.EMAIL = ValidationService.email;

    
    this.$onInit = function () {
        console.log( $scope.email );
    };
    
    
    $scope.blurEmail = function (email) {
        console.log( $scope );
    };

}]);
