var SerialPortFactory = require("serialport");  
var port = "/dev/ttyMFD1";  
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
        console.log('open'); 
		console.log('atempt4');
        serialPort.on('data', function (data) {  
            console.log('SEAN: ' + data);  
        });  
        serialPort.on('close', function () {   
          
            console.log("Serial Port closed.");  
        });  
        serialPort.on('error', function (error) {  
              
            console.log("Serial Port Error. " + error);  
        });  
    }  
});  
