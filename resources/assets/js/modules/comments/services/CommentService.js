comments.service( 'CommentsService', ['$http', '$q', function( $http, $q )
{

    var CommentsService = {

       
        save: function( postId, userId, type, comment )
        {
            var deferred = $q.defer();
            var data = {
                postId: postId, 
                userId: userId,
                type: type,
                comment: comment
            };
            $http.post( '/api/comments/', data )
                .success( function( response )
                {console.log();
                    deferred.resolve( response );
                } )
                .error( function( response, status )
                {
                    if (status === 422)
                    {
                        deferred.resolve({errors: response});
                    } else
                    {
                        deferred.reject();
                    }
                } );

            return deferred.promise;

        },

        all: function( postId, type )
        {
            // var params = {
            //     postId: postId,
            //     type: type
            // };

            var deferred = $q.defer();
            $http.get( '/api/comments/', { params: { postId: postId, type: type } } )
                .success( function( response )
                {
                    deferred.resolve( response );
                } )
                .error( function( response, status )
                {
                    if (status === 422)
                    {
                        deferred.resolve({errors: response});
                    } else
                    {
                        deferred.reject();
                    }
                } );

            return deferred.promise;

        }
    };
    return CommentsService;
}] );