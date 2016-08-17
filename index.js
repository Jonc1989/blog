var express = require('express')();
var server = require('http').Server(express);

var io = require('socket.io')(server);

server.listen(8000, function () {
    console.log('socket.io connected!')
});
express.get( '/', function ( request, response ) {
    response.sendFile( __dirname + '/public/index.php' );
});