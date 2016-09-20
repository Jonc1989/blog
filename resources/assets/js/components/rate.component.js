app.component( 'rate', {
    templateUrl: '/api/view/layouts.api.rate',
    controller: 'RateController',
    bindings: {
        rating: "<",
        max: "<",
        postId: '<',
        setRating: "&",
        image: '<'
    }
});