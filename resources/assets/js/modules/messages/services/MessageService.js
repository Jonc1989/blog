messages.service( 'MessageService', ['$http', '$q', function( $http, $q )
    {
        var MessageService = {

            send: function(message)
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
            },
            getMessengers:  function()
            {
                var deferred = $q.defer();
                $http.get( '/api/messengers' )
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
            getMessages: function( id )
            {
                var deferred = $q.defer();
                $http.get( '/api/messages/' + id )
                    .success( function( response )
                    {
                        deferred.resolve( response );
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
            },
            markReaded: function( message )
            {
                var deferred = $q.defer();
                var data = {
                    readed: message.readed
                };
                $http.put( '/api/messages/' + message.id, data )
                    .success( function( response )
                    {
                        deferred.resolve( response );
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
            },
            getNewMessages: function( id )
            {
                var deferred = $q.defer();
                $http.get( '/api/new-messages/' + id )
                    .success( function( response )
                    {
                        deferred.resolve( response );
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
            },
            
            
            
            
            
            
            
            
            
            
            
            loadMore: function( id, currentPage )
            {
                var deferred = $q.defer();
                $http.get( '/api/messages/' + id, { params: { currentPage: currentPage } } )
                    .success( function( response )
                    {
                        deferred.resolve( response );
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
        return MessageService;
    }] );