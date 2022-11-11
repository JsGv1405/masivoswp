const { Client, MessageMedia } = require('whatsapp-web.js');
const express = require('express');
const { body, validationResult } = require('express-validator');
const socketIO = require('socket.io');
const qrcode = require('qrcode');
const http = require('http');
const fs = require('fs');
const { phoneNumberFormatter } = require('./helpers/formatter');
const axios = require('axios');
const mime = require('mime-types');

const port = process.env.PORT || 8000;

const app = express();
const server = http.createServer(app);
const io = socketIO(server);
// ayudame con tu correo?
// edad?
// nivel de estudios?
// presupuesto?
// fecha de viaje?
app.use(express.json());
app.use(express.urlencoded({
  extended: true
}));




app.get('/', (req, res) => {
  res.sendFile('index.html', {
    root: __dirname
  });
});

const client = new Client({
  restartOnAuthFail: true,
  puppeteer: {
    headless: true,
    args: [
      '--no-sandbox',
      '--disable-setuid-sandbox',
      '--disable-dev-shm-usage',
      '--disable-accelerated-2d-canvas',
      '--no-first-run',
      '--no-zygote',
      '--single-process', // <- this one doesn't works in Windows
      '--disable-gpu'
    ],
  },
 
});

client.on('message', msg => {
  if (msg.body == '!ping') {
    msg.reply('pong');
  } else if (msg.body == 'Hola') {
    msg.reply('hola, como vas?');
 
  }

  
});

client.initialize();

// Socket IO
io.on('connection', function(socket) {
  socket.emit('message', 'Connecting...');

  client.on('qr', (qr) => {
    console.log('QR RECEIVED', qr);
    qrcode.toDataURL(qr, (err, url) => {
      socket.emit('qr', url);
      socket.emit('message', 'QR Code received, scan please!');
    });
  });

  client.on('ready', () => {

    socket.emit('ready', 'Whatsapp is ready!');
    socket.emit('message', 'Whatsapp is ready!');
  });

 
  client.on('disconnected', (reason) => {
    socket.emit('message', 'Whatsapp is disconnected!');
   
    client.destroy();
    client.initialize();
  });
 
  
});


const checkRegisteredNumber = async function(number) {
  const isRegistered = await client.isRegisteredUser(number);
  return isRegistered;
}

// Send message
app.post('/send-message',(req,res)=>{
    console.log("hola")
    const number = (req.body.number);
    const message = req.body.message;
    
    
    client.sendMessage(number, message).then(response => {
        res.status(200).json({
          status: true,
          response: response
        });
      }).catch(err => {
        res.status(500).json({
          status: false,
          response: err
        });
      });
});
  

  


// Send media
app.post('/send-media', async (req, res) => {
  const number = phoneNumberFormatter(req.body.number);
  const caption = req.body.caption;
  // const url = req.body.url;
  //const fileUrl = req.body.file;

  const media = MessageMedia.fromFilePath('./arreglo.jpeg');
  // const file = req.files.file;
  // const media = new MessageMedia(file.mimetype, file.data.toString('base64'), file.name);
  let mimetype;
  // const attachment = await axios.get(fileUrl, {
  //   responseType: 'arraybuffer'
  // }).then(response => {
  //   mimetype = response.headers['content-type'];
  //   return response.data.toString('base64');
  // });

  //const media = new MessageMedia(mimetype, attachment, 'Media');

  client.sendMessage(number, media, {
    caption: caption
  }).then(response => {
    res.status(200).json({
      status: true,
      response: response
    });
  }).catch(err => {
    res.status(500).json({
      status: false,
      response: err
    });
  });
});





server.listen(port, function() {
  console.log('App running on *: ' + port);
});
