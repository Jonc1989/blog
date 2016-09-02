var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('post-added');
redis.subscribe('user-online');
redis.on('message', function ( channel, message ) {
console.log( channel );
    console.log( message );
    message = JSON.parse(message);

    io.emit( channel, message.data );
});

server.listen(3000);