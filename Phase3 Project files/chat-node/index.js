const express = require('express');
const cors = require('cors');
const app = require('http').createServer();
const io = require('socket.io')(app, {
  cors: {
    origin: ['http://localhost:8000','http://localhost:3000','http://127.0.0.1:8000','http://127.0.0.1:3000','https://pxn2799.uta.cloud','http://pxn2799.uta.cloud','https://pxn2799.uta.cloud/','http://backend.pxn2799.uta.cloud','https://pavannerella35.github.io'],
    credentials: true
  }
});

io.on('connection', (socket) => {
    console.log('Connection to client established');

    socket.on('connected-user', (user) => {
        console.log('connected-user', user)
        io.emit('respond', (user));
    });

    socket.on('message', (message) => {
        console.log('message:', message)
        io.emit('receive-message', (message));
    });

    socket.on('disconnect', (username)=>{
        console.log('disconnected from user ', username);
    });

});

const PORT = process.env.PORT || 5000;
app.listen(PORT, function() {
    console.log('listening on *:' + PORT);
});