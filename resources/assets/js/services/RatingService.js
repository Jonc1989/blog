app.service( 'RatingService', ['$http', '$q', function( $http, $q )
{
    var RatingService = {

        rate: function(message)
        {
            var deferred = $q.defer();
            $http.post( '/api/messages', message )
                .success( function( response )
                {
                    deferred.resolve( response.data );
                } )
                .error( function()
                {
                    if ( status == 422 )
                    {
                        deferred.resolve( { errors: response } );
                    } else
                    {
                        deferred.reject();
                    }
                } );

            return deferred.promise;
        }
 
    };
    return RatingService;
}] );