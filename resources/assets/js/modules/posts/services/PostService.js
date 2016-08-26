post.service( 'PostService', ['$http', '$q', function( $http, $q )
    {
        var PostService = {

                save:  function(post, location, lat, lng)
                {
                    if( post != '' ){
                        var data = {
                            post: post,
                            location: location,
                            latitude: lat,
                            longitude: lng
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

            getPosts:  function( perPage, current, authid, userId )
            {
                var deferred = $q.defer();
                $http.get( '/api/posts', { params: {per_page: perPage, current: current, authid: authid, userId: userId }})
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