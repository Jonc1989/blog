app.controller('RateController', ['$scope', 'RatingService', '$rootScope', function( $scope, RatingService, $rootScope ) {


    $scope.stars = [];
    $scope.rating = {};
    this.$onInit = function () {

        $scope.rating = {
            id: '',
            rate: this.rating != null ? this.rating.rate : null,
            user_id: $rootScope.authId,
            post_id: this.postId,
            type: this.type
        };


        // $scope.authId = $rootScope.authId;
        // $scope.postId = this.postId;
        // $scope.rating = this.rating;
         $scope.max = this.max;
        // $scope.type = this.type;
        $scope.stars = $scope.countStars( $scope.rating.rate, $scope.max );
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
        $scope.rating.rate = rating;
        $scope.stars = $scope.countStars( rating, $scope.max );
        $scope.saveRating();
    };

    $scope.saveRating = function (){
        // RatingService.rate( $scope.rating ).then(function(){
        //
        // })
    };

    this.$onChanges = function ( bindings) {

        if( bindings.postId !== undefined && bindings.postId.currentValue !== $scope.rating.post_id ){
            console.log( bindings );
        }
        if( bindings.rating !== undefined ){
            if( bindings.rating.rate !== undefined && bindings.rating.currentValue.rate !== $scope.rating.rate ){
                $scope.rating = bindings.rating.currentValue;

                bindings.rating.currentValue !== null ? $scope.setRating( null ) : $scope.setRating( bindings.rating.currentValue.rate )
            }
        }


    };
}]);
