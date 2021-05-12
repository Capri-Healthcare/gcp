//var apiKey = "46903874";
//var sessionId = "2_MX40NjkwMzg3NH5-MTU5OTU0MzU0MDI3M35NNUZRZVp2d1RXNUtLdk9hSWhNMjF1NjR-fg";
//var token = "T1==cGFydG5lcl9pZD00NjkwMzg3NCZzaWc9NmM2MmI2OWFlNDY3YjViNTIyZGQ2Njk0MjM3ZDg0ZGIxZDhkNDRhYjpzZXNzaW9uX2lkPTJfTVg0ME5qa3dNemczTkg1LU1UVTVPVFUwTXpVME1ESTNNMzVOTlVaUlpWcDJkMVJYTlV0TGRrOWhTV2hOTWpGMU5qUi1mZyZjcmVhdGVfdGltZT0xNTk5NTQzNTQwJnJvbGU9bW9kZXJhdG9yJm5vbmNlPTE1OTk1NDM1NDAuODg0MzM4MTk4ODAzNSZleHBpcmVfdGltZT0xNTk5NjI5OTQwJmNvbm5lY3Rpb25fZGF0YT1uYW1lJTNESm9obm55JmluaXRpYWxfbGF5b3V0X2NsYXNzX2xpc3Q9Zm9jdXM=";

// (optional) add server code here
initializeSession();


// Handling all of our errors here by alerting them
function handleError(error) {
  if (error) {
    alert(error.message);
  }
}

function initializeSession() {
	var session = OT.initSession(apiKey, sessionId);

	// Subscribe to a newly created stream
	session.on('streamCreated', function(event) {
		session.subscribe(event.stream, 'subscriber', {
			insertMode: 'append',
			width: '100%',
			height: '100%'
		 }, handleError);
	});

	// Create a publisher
	var publisher = OT.initPublisher('publisher', {
		insertMode: 'append',
		width: '100%',
		height: '100%'
	}, handleError);

	// Connect to the session
	session.connect(token, function(error) {
		// If the connection is successful, publish to the session
		if (error) {
			handleError(error);
		} else {
			session.publish(publisher, handleError);
		}
	});
}