app.controller('AuthController', ['$scope', 'ValidationService', function( $scope, ValidationService ) {

    $scope.EMAIL = ValidationService.email;
    $scope.PASSWORD = ValidationService.password;
    $scope.formData = {};
    $scope.loading = false;

    this.$onInit = function () {

    };
    
    
    $scope.blurEmail = function () {
    };

    $scope.onSubmit = function ($event)
    {
        if( $scope.form.$valid && !$scope.loading )
        {
            $scope.loading = true;            
        }else {
            $event.preventDefault();
        }
    };
}]);
