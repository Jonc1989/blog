app.service( 'PostService', ['$http', '$q', function( $http, $q )
    {
        var PostService = {

                save:  function(post)
                {
                    if( post != '' ){
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
                    }
                },

            getPosts:  function( perPage, current, id )
            {
                var deferred = $q.defer();
                $http.get( '/api/posts', { params: {per_page: perPage, current: current, id: id }})
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