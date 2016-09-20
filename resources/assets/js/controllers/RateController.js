app.controller('RateController', ['$scope', 'RatingService', '$rootScope', function( $scope, RatingService, $rootScope ) {


    $scope.stars = [];

    this.$onInit = function () {

        // $scope.rating = {
        //     id: '',
        //     rate: this.rating,
        //     userId: $rootScope.authId,
        //     postId: this.postId,
        //     type: this.type
        // };


        console.log( this.image );
        $scope.authId = $rootScope.authId;
        $scope.postId = this.postId;
        $scope.rating = this.rating;
        $scope.max = this.max;
        $scope.type = this.type;
        $scope.stars = $scope.countStars( this.rating, this.max );
    };

     $scope.countStars = function( value, max ) {
        var entries = [];
        for( var i = 1; i <= max; i++ ){
            var icon = i <= value ? "glyphicon-star" : "glyphicon-star-empty";
            entries.push(icon);
        }
        return entries;
    };

    $scope.setRating = function( rating ) {
        $scope.rating = rating;
        $scope.stars = $scope.countStars( rating, $scope.max );
    };

    $scope.saveRating = function (){
        // RatingService.rate( $scope.authId, $scope.rating, $scope.type ).then(function(){
        //
        // })
    };

    // this.$onChanges = function ( bindings) {
    //     console.log(bindings)
    //     $scope.setRating( $scope.rating );
    // };
}]);
