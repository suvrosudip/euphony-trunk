var SerialPortFactory = require("serialport");  
var fs = require('fs');
var port = "/dev/ttyMFD1"; 
var latitude;
var longitude; 
var timestamp;
var serialPort = new SerialPortFactory.SerialPort(port,  
    {  
    baudrate: 9600,   
    dataBits: 8,   
   parity: 'none',   
   stopBits: 1,   
   flowControl: false,  
    parser: SerialPortFactory.parsers.readline()  
}, false);  
serialPort.open(function (error) {  
    if (error) {  
        console.log('Failed to open: ' + error);  
    }   
    else {  
        console.log('Opened GPS Connection'); 
        serialPort.on('data', function (data) {  
            if (data.indexOf("$GPGLL") > -1)
			{
				latitude = (data.split(",")[1])/100;
				longitude = (data.split(",")[3])/100;
				timestamp = data.split(",")[5];
				fs.appendFile('/media/config/gpsInfo.txt', "Timestamp: " + timestamp + " Latitude: " + latitude + ", " + " Longitude: " + longitude + "\n", function (err) {	});
				
			}
			//Console.log('data received: ' + data);  
        });  
        serialPort.on('close', function () {   
          
            console.log("Serial Port closed.");  
        });  
        serialPort.on('error', function (error) {  
              
            console.log("Serial Port Error. " + error);  
        });  
    }  
});  
