var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3004;
const cookie = require('cookie');
const cookieParser = require('cookie-parser');


app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});

io.on('petit_nouveau', function(pseudo) {
    socket.pseudo = pseudo;
      
});

 io.on('sendSession', function(data) {

  	    var username = data.sessionName;
        var sessionId = data.sessionId;
 
        socket.username = username;
        console.log(username);
       
 });

 


io.on('connection', function(socket){

	 


  socket.on('chat message', function(msg,username){

  	 var username = cookie.parse(socket.handshake.headers.cookie).PHPSESSNAME;
        


    io.emit('chat message', {msg:msg,username:username});

  console.log(username);
 
    
  });
  

   

});


http.listen(port, function(){
  console.log('listening on *:' + port);
});