/*
  Responsible for saving zigfu data to a variable, using JQUERY

  NOTE: Requires ui_record_replay.js, jquery, and zig.js to be loaded prior.
  ui_record_replay.js: 
  - frameCounter, isRecording, 
  - userdata - this is where the kinect motion data is added to

  Author: Tien Nguyen
*/


// The dataSaver object saves data to server
var dataSaver = {
    onuserfound: function (user) {
    },
    onuserlost: function (user) {
    },
    ondataupdate: function (zigdata) {
	//Save data if recording is ON
	if (isRecording) {
	    // Increment frame counter
	    frameCounter++;
	    // Send data to server for each detected user
	    for (var userid in zigdata.users) {
		// Save JSON of the user, keeping only relevant properties
		// zigdata.users is an object, where its properties are user id numbers paired to user objects
		// make a non-circular deep clone of the user with userid

		var userCopy = {};
		//userCopy.radarelement = null; // used by radar
		// - Clone of zigdata user's properties
		userCopy.position = JSON.parse(JSON.stringify(zigdata.users[userid].position));
		userCopy.positionTracked = zigdata.users[userid].positionTracked;
		userCopy.id = zigdata.users[userid].id;
		userCopy.skeleton = JSON.parse(JSON.stringify(zigdata.users[userid].skeleton));
		userCopy.skeletonTracked = zigdata.users[userid].skeletonTracked;
		userCopy.frameCount = frameCounter;

		// Add this capture of user zigfu data to the userdata object
		userdata.motiondata.push(userCopy);

	    } // for userid
	} // endof isRecording
    }
}; // end of dataSaver


// Add datasaver to zig so that it can respond to zig data updates
zig.addListener(dataSaver);