app.factory('SocketFactory', function ($rootScope) {
    var socket = io('http://localhost:3000');
    return {
        on: function (eventName, callback) {
            socket.on(eventName, function () {
                console.log( eventName );
                var args = arguments;
                $rootScope.$apply(function () {
                    callback.apply(socket, args);
                });
            });
        },
        emit: function (eventName, data, callback) {
            socket.emit(eventName, data, function () {
                var args = arguments;
                $rootScope.$apply(function () {
                    if (callback) {
                        callback.apply(socket, args);
                    }
                });
            })
        },
        removeAllListeners: function (eventName, callback) {
            socket.removeAllListeners(eventName, function() {
                var args = arguments;
                $rootScope.$apply(function () {
                    callback.apply(socket, args);
                });
            });
        }
    };
});