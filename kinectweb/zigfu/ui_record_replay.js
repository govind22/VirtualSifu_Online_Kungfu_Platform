/*
  This script controls the User Interface with JQuery
  Unlike ui.js, this version saves data to server, using JQUERY and AJAX when a user ends their recording session.
  Unlike ui_motiondata.js, this does not save data to the server
  
  NOTE: Requires loaded prior: jquery, record_replay_skeleton
  record_replay_skeleton.js:
  - FRAME_TIMEOUT
  - radar


  TODO:
  - when create/reuse logoutBlock, change the text inside to match user name

  Author: Tien Nguyen
*/

// DOM elements
var $buttonContainer = null; // holds start, stop, and start/stop replay buttons
var $startReplayButton = null; // the start replay button
var $stopReplayButton = null; // the stop replay button
var $startButton = null; // the start recording  button
var $stopButton = null; // the stop recording button
// Some UI stuff
var sessionCounter = 0; // count the sessions
var frameCounter = 0; // count the frames since recording session
var isRecording = false; // true if recording a session
var isReplaying = false; // true if replaying the recording
// Data recorded
var userdata = {}; // user's kinect motion data
var lastRecording = {}; // last recorded user frames. In motiondata format.


window.onload = function() {
    initMotionCaptures();
    // Save the important button elements from the page
    $buttonContainer = $("#record-buttons-container");
    $startButton = $("#startButton");
    $stopButton = $("#stopButton");
    $startReplayButton = $("#startReplayButton");
    $stopReplayButton = $("#stopReplayButton");
    // Set click listeners to buttons
    $startButton.click(startRecording);
    $stopButton.click(stopRecording);
    $startReplayButton.click(startReplay);
    $stopReplayButton.click(stopReplay);
    // Initialize the user interface with the start and replay buttons
    initUI();
};

/*
  Initializes the UI with the start and replay buttons
*/
function initUI() {
    // Detach Stop and Stop Replay
    $stopButton.detach();
    $stopReplayButton.detach();
    // Append start and start replay
    $buttonContainer.append($startButton);
    $buttonContainer.append($startReplayButton);
}
/*
  Initializes user data objects
*/
function initMotionCaptures() {
    resetUserdata();
    // Last recording should be set to {motiondata:[]}
    lastRecording = {};
    lastRecording.motiondata = [];
} // initMotionCaptures
/*
  resets the userdata variable to {motiondata:[]}
*/
function resetUserdata() {
    userdata = {};
    userdata.motiondata = [];
} // resetUserdata

/*
  Stashes the recorded data to the variable used by record_replay_skeleton.js
*/
function saveRecording(userdata) {
    // Clone the userdata
    lastRecording = JSON.parse(JSON.stringify(userdata));
}

/*
  Start the recording
  Parameters:
  evt - Not used
*/
function startRecording(evt) {
    //console.log("Started recording");

    // Resets the userdata to store new kinect data captures from scratch
    resetUserdata();

    // Detach the start/replay buttons, append the stop button, keep listeners
    $startButton.detach();
    $startReplayButton.detach();
    $buttonContainer.append($stopButton);

    // Reset frame counter
    frameCounter = 0;
    // Increment session counter
    sessionCounter += 1;
    // Allow recording
    isRecording = true;
} //startRecording

/*
  Stops recording
*/
function stopRecording() {
    // Save the userdata to be able to be replayed
    saveRecording(userdata);

    // Detach Stop button, bring back initial button setup
    initUI();

    // Reset values that should reset
    frameCounter = 0; // count the frames since recording session
    isRecording = false; // true if recording a session
} //stopRecording

function startReplay() {
    // Detach Start and StartReplay buttons from UI, append stop replay button
    $startButton.detach();
    $startReplayButton.detach();
    $buttonContainer.append($stopReplayButton);
    
    // Begin replay
    isReplaying = true;
    doReplay(0, lastRecording);
}
/*
  Does the replay
  Recursively calls itself.
  Note: Depends on the radar variable from record_replay_skeleton.js
  @param frameCounter count of frames elapsed in the replay
*/
function doReplay(frameCounter, lastRecording) {
        // Play back the recorded frames until finished
    if (isReplaying && frameCounter < lastRecording.motiondata.length) {
	radar.onFrameUpdate(lastRecording.motiondata[frameCounter]);
	// update again after timeout
	setTimeout( function () {
	    doReplay(frameCounter + 1, lastRecording);
	}, FRAME_TIMEOUT);
    }
    else {
	// End of replay
	console.log("Replay ended");
	stopReplay();
    }
}

/*
  Ends the replay and brings back UI to initial setup
*/
function stopReplay() {
    // Detach Stop replay button, bring back initial button setup
    initUI();

    // Reset values that should reset
    frameCounter = 0; // count the frames since recording session
    isReplaying = false;
}


