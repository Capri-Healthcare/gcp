// replace these values with those generated in your TokBox Account
// var apiKey = "YOUR_API_KEY";
// var sessionId = "YOUR_SESSION_ID";
// var token = "YOUR_TOKEN";
var sessionId,apiKey,token,publisher,session;
var videoConnect=true;
var mute_mic=true;
function showMessage(message) {
  $('#subscriber').html("<div class='message'><div class='text'>"+ message +"</div></div>");
}

// (optional) add server code here
// Handling all of our errors here by alerting them
function handleError(error) {

	if (error) {
		alert(error.message);
	}
}

function initializeSession(ssid) {

	if(publisher){      
		publisher.destroy();
	}
	//alert(apiKey + ' = ' + sessionId);
	session = OT.initSession(apiKey,sessionId);

	session.on("sessionDisconnected", function(event) {
		//alert("The session disconnected. " + event.reason);
		alert("Your consultation session is closed.");
	});

	// Subscribe to a newly created stream
	session.on('streamCreated', function(event) {

		$("#loader").hide();
		$("#subscriber").show();

		var parentElementId = event.stream.videoType === 'screen' ? 'screenpreview' : 'subscriber';	
		session.subscribe(event.stream, parentElementId, {
			insertMode: 'append',
			style: { nameDisplayMode: "on" },
			fitMode: "contain",
		}, handleError);

	});

	publisher = OT.initPublisher('publisher', {
		insertMode: 'append',
		width: '100%',
		height: '100%',
		name: publisherName,
		fitMode: "contain"
		//resolution: '320x240',
  		//frameRate: 1
	}, handleError);

	session.connect(token, function (error) {
	
		if (error) {
			console.log(sessionId,token);
			console.log("Failed to connect: ", error.message);
			if (error.name === "OT_NOT_CONNECTED") {
				alert("You are not connected to the internet. Check your network connection.");
			}
		} else {
			console.log("Connected");
			$("#publisher").show();
			session.publish(publisher, handleError);
		}
	});
}

var vedioSession;
initializeSession(apiKey, sessionId, token);

function showSubscriber(){

}

function shareScreen(el){
	OT.checkScreenSharingCapability(function(response) {
		if(!response.supported || response.extensionRegistered === false) {
		  	// This browser does not support screen sharing.
			alert("This browser does not support screen sharing.");
		} else if (response.extensionInstalled === false) {
			// Prompt to install the extension.
			alert("Prompt to install the extension.") ;
		} else {
		  // Screen sharing is available. Publish the screen.
			var publishOptions = {videoSource: 'screen'};
			var screenPublisherElement = document.createElement('div');
		  	var publisher = OT.initPublisher(screenPublisherElement,
		  		publishOptions,
				function(error) {
					if (error) {
						alert(error.message);
						// Look at error.message to see what went wrong.
					} else {
						session.publish(publisher, function(error) {
							if (error) {
								alert(error.message);
								// Look error.message to see what went wrong.
							}
						});
					}
				}
		  );
		}
	});
}

function fullScreen(x){
	
	//x.classList.toggle("fa-compress");
	var fullScreen = $('#fullScreen');
	var elem = document.getElementById("videos");

	$(this).find('.fa-expand,.fa-compress').toggleClass('fa-expand').toggleClass('fa-compress');
	// ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {  /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {  /* Chrome, Safari & Opera */
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {  /* IE/Edge */
            elem.msRequestFullscreen();
        }
		fullScreen.removeClass('fa-expand').addClass('fa-compress');
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
		fullScreen.removeClass('fa-compress').addClass('fa-expand');
    }

}

function disconnect() {
	session.disconnect();
	$("#sessionEnd").show();
	$("#publisher").hide();
	$("#actionOptions").hide();
	$("#loader").hide();
	
	window.location.replace(redirect_to);
}


function toggleVideo(x){
	x.classList.toggle("fa-video-slash");
	
	if(videoConnect){
		videoConnect=false;
		return publisher.publishVideo(false);
	}else{
		videoConnect=true;
		return publisher.publishVideo(true);
	}
}

function muteMic(x){
	x.classList.toggle("fa-microphone-slash");
	
	if(mute_mic){
		mute_mic=false;
		return publisher.publishAudio(false);
	}else{
		mute_mic=true;
		return publisher.publishAudio(true);
	}
}
