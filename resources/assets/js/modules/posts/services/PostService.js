home.service( 'PostService', ['$http', '$q', function( $http, $q )
    {
        var PostService = {

                save:  function(post)
                {
                    var data = {
                        post: post
                    };
                    var deferred = $q.defer();
                    $http.post( '/api/posts', data )
                        .success( function( response )
                        {
                            deferred.resolve( response );
                        } )
                        .error( function()
                        {
                            deferred.reject();
                        } );

                    return deferred.promise;

                },

            getPosts:  function(next)
            {
                var deferred = $q.defer();
                $http.get( '/api/posts'/*, { params: {per_page: next}}*/ )
                    .success( function( response )
                    {
                        deferred.resolve( response );
                    } )
                    .error( function()
                    {
                        deferred.reject();
                    } );

                return deferred.promise;

            }
        };
        return PostService;
    }] );