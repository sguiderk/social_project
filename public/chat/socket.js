var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3004;
const cookie = require('cookie');
const cookieParser = require('cookie-parser');
var mysql = require('mysql')

var messages = []
var isInitMessages = false
var socketCount = 0

// Define our db creds
var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password :'root',
    database: 'zenddatabase'
})
 
// Log any errors connected to the db
db.connect(function(err){
    if (err) console.log(err)
})
 
// Define/initialize our global vars

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});


io.on('connection', function(socket){

  socketCount++  

    socket.on('disconnect', function(socket){

     socketCount-- 

    });



 socket.on('new messages', function(msg){
       
    var username = cookie.parse(socket.handshake.headers.cookie).PHPSESSNAME;
        
         messages.push(msg)
       
         var values = [msg,username];


         db.query('INSERT INTO message (message,username) VALUES (?)', [values])

         io.emit('new messages',msg,username); 



         //  console.log(messages);
          // socket.emit('initial messages', messages)

    }); 
 


// Check to see if initial query/Messages are set

    if (! isInitMessages) {

        // Initial app start, run db query

        db.query('SELECT * FROM message')
            .on('result', function(data){

                // Push results onto the messages array

                messages.push(data)
            })
            .on('end', function(){

                // Only emit notes after query has been completed

                socket.emit('initial messages', messages)
            })
 
        isInitMessages = true
    } else {
        // Initial notes already exist, send out
        socket.emit('initial messages', messages) 
    }


});





http.listen(port, function(){
  console.log('listening on *:' + port);
});