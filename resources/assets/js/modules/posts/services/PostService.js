post.service( 'PostService', ['$http', '$q', function( $http, $q )
    {
        var PostService = {

            save:  function(post, location, lat, lng, authId, userId )
            {
                if( post != '' ){
                    var data = {
                        post: post,
                        location: location,
                        latitude: lat,
                        longitude: lng,
                        authId: authId,
                        userId: userId
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

            },

            like: function( authId, postId, status, type )
            {
                var deferred = $q.defer();
                $http.post( '/api/posts/like', { params: { authId: authId, postId: postId, status: status, type: type }})
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

            getLikes: function( postId, type )
            {
                var deferred = $q.defer();
                $http.get( '/api/posts/likes', { params: { postId: postId, type: type }})
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