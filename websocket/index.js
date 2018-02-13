var app = require('express')();
var server = require('http').Server(app);
var cors = require('cors');
var io = require('socket.io')(server);
var moment = require('moment');
app.use(cors());

server.listen(4000);

app.get('/', function (req, res) {
    res.sendfile(__dirname + '/index.html');
});

io.on('connection', function (socket) {
    console.log('someone is connected');
    // var data;
    // function randomise(min, max) {
    //     return Math.random() * (max - min) + min
    // }
    // setInterval(function() {
    //     data = { c: moment.now(), 
    //         phlevel: randomise(1,10), 
    //         templevel: randomise(1, 10), 
    //         turblevel: randomise(1, 10), 
    //         waterlevel: randomise(1, 10) 
    //     };
    //     socket.emit('arduino-shout', data);
    // }, 1000);
    // socket.on('my other event', function (data) {
    //     console.log(data);
    // });

    socket.on('message', function(data) {
        data = {
            c: moment.now(),
            phlevel: data.phlevel, 
            templevel: data.templevel, 
            turblevel: data.turblevel, 
            waterlevel: data.waterlevl 
        };
        socket.emit('arduino-shout', data);
    })
});