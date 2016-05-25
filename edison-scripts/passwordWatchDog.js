var
  http = require('http'),
  fs = require('fs'),
  qs = require('querystring'),
  exec = require('child_process').exec,
  url = require('url'),
  multiparty = require('multiparty'),
  spawn = require('child_process').spawn,
  shell = require('shelljs');

var fileName = "/media/password/changePassword.txt"

fs.access(fileName, fs.F_OK, function(err) {
	if (!err) {
		console.log("Change received...working on changing the password");
		shell.exec('configure_edison --password');
		console.log("password changed...invoking shutdown")
		shell.exec('shutdown -r now');
	} else {
		console.log("waiting for changePassword to show up\n");
		
	}
});


