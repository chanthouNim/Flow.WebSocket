// var wsUri = "ws://127.0.0.1:5003";
var wsUri = "ws://10.10.2.119:5003";
var output;
var otherScreen;
var websocket;

window.onbeforeunload = function() {
	ws.send('quit');
};
window.onload = function() {
	try {
		output = document.getElementById("output");
		websocket = new WebSocket(wsUri);
		writeToScreen('Connect stat=' + websocket.readyState);

		websocket.onopen = function(evt) {
			writeToScreen('Connection successfully' + this.readyState);
		};
		websocket.onmessage = function(evt) {
			text = evt.data;
			user = text.substring(0, text.indexOf(':') + 1);
			user = '<strong>' + user + '</strong>';
			sms = user + text.substring(text.indexOf(':') + 1);
			sms = '<div class="alert alert-warning alert-dismissable">' + sms + '</div>';
			writeToScreen(sms);
		};
		websocket.onclose = function(evt) {
			if (this.readyState == 2) {
				writeToScreen('closing handshake (readyState '
						+ this.readyState + ')');
			} else if (this.readyState == 3) {
				writeToScreen('The connection has been closed(readyState '
						+ this.readyState + ')');
			} else {
				writeToScreen('Connection closed... (unhandled readyState '
						+ this.readyState + ')');
			}
		};
		websocket.onerror = function(evt) {
			writeToScreen('error connection');
		};
	} catch (exception) {
		writeToScreen('exception');
	}
}

function sendText() {
	text = jQuery("#textSend").val();
	jQuery("#textSend").val('');
	textNumber = text.replace(/ /g,'');
	text = jQuery("#currentUser").val() + ':'+ text;
	if (textNumber.length) {
		websocket.send(text);
	}
}
function writeToScreen(message) {
	var pre = document.createElement("p");
	pre.style.wordWrap = "break-word";
	pre.innerHTML = message;
	output.appendChild(pre);
	output.scrollTop = output.scrollHeight;
}