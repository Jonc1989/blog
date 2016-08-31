galleries.service( 'GalleriesService', ['$http', '$q', 'Upload', function( $http, $q, Upload )
    {

        var GalleriesService = {

            upload: function (files, id)
            {
                if (files && files.length)
                {
                    var deferred = $q.defer();

                    for (var i = 0; i < files.length; i++)
                    {

                        var file = files[i];
                        Upload.upload({
                            url: '/api/save-gallery-images',
                            data: id,
                            file: file
                        }).progress(function (evt) {

                        }).success(function (response) {
                            //console.log(response);
                            deferred.resolve( response );
                        }).error(function (response, status)
                        {
                            if (status === 422)
                            {
                                deferred.resolve({errors: response});
                            } else
                            {
                                deferred.reject();
                            }
                        });

                    }
                    return deferred.promise;
                }
            },
            save: function( name )
            {
                var deferred = $q.defer();
                var data = {
                    name: name
                };
                $http.post( '/api/galleries/', data )
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

            all: function( auth )
            {
                var deferred = $q.defer();
                $http.get( '/api/galleries/', { params: { auth: auth } } )
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

            },

            // mine: function(id)
            // {
            //     var deferred = $q.defer();
            //     $http.get( '/api/galleries/' + id)
            //         .success( function( response )
            //         {
            //             deferred.resolve( response );
            //         } )
            //         .error( function( response, status )
            //         {
            //             if (status === 422)
            //             {
            //                 deferred.resolve({errors: response});
            //             } else
            //             {
            //                 deferred.reject();
            //             }
            //         } );
            //
            //     return deferred.promise;
            //
            // },
            gallery: function(id)
            {
                var deferred = $q.defer();
                $http.get( '/api/galleries/' + id)
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

            },
            delete: function(id)
            {
                var deferred = $q.defer();
                $http.delete( '/api/galleries/' + id)
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

            },

        };
        return GalleriesService;
    }] );