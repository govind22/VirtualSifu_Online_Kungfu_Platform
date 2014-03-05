VirtualSifu_Online_Kungfu_Platform
==================================

Online platform to learn Martial Arts


/* This Program will record user motion and at the same time send data to DTW.php through json , 
   then DTW.php will send DTW scores to Trained Neural Network Files to receive scores of three principle Hip Initiation, Shoulder Down, Spinar posture and transfer
   Once JavaScript file receives Scores back from DTW.php it shows joints of violated principles in red color.
   Threshold for all Principle is 3. if The received score is below or equal to 3 then it is considered as violated Principle.
*/

/* Instructions to Run */
===========================================
Requirement: All files should be in same Directory, You should have installed Wamp/Xampp/Lamp web server to run html and php files.

Open record_and_replay.html ,
Click on Record button to start recording & click stop recording if you want to stop.
If you would like to replay then click "replay" button.
While recording you will see your joints in red color if you have violated some principles.
For ex. IF you violate "shoulders down" principle then on screen you will see your left shoulder and right shoulder will be shown in red
  
============================================
1) Html Files

record_and_replay.html

2) PHP Files

/* DTW (Dynamic Time Warping) files */

DTW.php
JointDataReader.class.php
MasterJointData.class.php
StudentJointData.class.php
Principles.class.php


3) Neural Network Files

/* Original Neural Network file used for Training the Network  */
NNp1.php    // NN file for Principle 1
NNp2.php    // NN file for Principle 2
NNp3.php    // NN file for Principle 3

/* Trained NN with the saved weights into the initialized neural network. This way you won't need to train the network each time the application has been executed */

my_network_p1.ini    // File having saved Weights of principle 1 
my_network_p1.ini    // File having saved Weights of principle 2 
my_network_p1.ini    // File having saved Weights of principle 3 

/* Files used to get NN score by loading Trained NN */

NNp1test.php  // NN test files for Principle 1 used to feed input and get score
NNp2test.php  // NN test files for Principle 1 used to feed input and get score
NNp3test.php  // NN test files for Principle 1 used to feed input and get score
