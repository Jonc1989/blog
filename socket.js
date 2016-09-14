var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('post-added');
redis.subscribe('user-online');
redis.subscribe('message-sent');
redis.subscribe('message-readed');
redis.subscribe('comment-created');
redis.subscribe('like');
redis.on('message', function ( channel, message ) {
console.log( channel );

    message = JSON.parse(message);
    console.log( message );
    io.emit( channel, message.data );
});

server.listen(3000);