app.factory('HttpInterceptor', function($q) {
    return {
        // optional method
        'request': function(config) {
            // do something on success
            return config;
        },

        // optional method
        'requestError': function(rejection) {
            // do something on error
            if (canRecover(rejection)) {
                return responseOrNewPromise
            }
            return $q.reject(rejection);
        },



        // optional method
        'response': function(response) {
            return response;
        },

        // optional method
        'responseError': function(response) {
            var status = response.status;
            if (status == 401) {
                console.log('You are unauthorised!')
                //window.location.replace( "/" );
                return;
            }
            return $q.reject(response);
        }
    };
});
