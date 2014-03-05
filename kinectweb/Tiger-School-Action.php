<?php
include("header.php");
	
?>   

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">Tiger School Form </h1>
          <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
            <li> <a href="portfolio-1-col.php">First Level Forms</a></li>
			 <li><a href="Earth-DragonForm.php">Earth Dragon</a></li>
			 <li><a href="Earth-DragonForm.php">Earth Dragon subforms</a></li>
			<li><a href="Earth-DragonForm.php">Tiger Form</a></li>
			 
			
          </ol>
        </div>

      </div>

     
      <hr>

      <div class="row">

        <div class="col-md-5">
         <object id="Object1" type="application/x-shockwave-flash" data="player_flv_minitg.swf" width="480" height="360">
<noscript><a rel="nofollow" href ="http://www.java.com">Install or enable JAVA</a></noscript>
<param name="movie" value="player_flv_minitg.swf" />
<param name="wmode" value="opaque" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="quality" value="high" />
<param name="menu" value="true" />
<param name="autoplay" value="false" />
<param name="autoload" value="false" />
<param name="FlashVars" value="flv=TigerKickingFormCrop.flv&width=480&height=360&autoplay=0&autoload=0&buffer=5&playercolor=000000 &loadingcolor=9b9a9a&buttoncolor=ffffff&slidercolor=ffffff" />
</object>
        </div>

		 <div class="col-md-1">
		 </div>
	<!--- Zigfu Window -->	
	 <div class="col-md-6">
         <!-- <a href="portfolio-item.php"><img  alt="500x500" class="img-responsive" src="kinectshot2.jpg"></a>  -->
		  <p>            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="350" height="300" id='svg-block'>
    </svg>  </p>
        </div>
		
		<div class="col-md-5" >
		 <div id="record-buttons-container">
		  <button type="button" class="btn btn-primary"id="startButton">Record</button>
  <button type="button" class="btn btn-primary" id="startReplayButton">Replay</button>
  <button type="button" class="btn btn-primary" id="stopButton">Stop Recording</button>
   <button type="button" class="btn btn-primary" id="stopReplayButton">Stop Replay</button>
 
    </div>
		<!--<a class="btn btn-primary" href="#">Start  <i class="fa fa-play"></i></a>
        <a class="btn btn-primary" href="#">Stop <i class="fa fa-off"></i></a>
         <a class="btn btn-primary" href="#">Replay  <i class="fa fa-repeat"></i></a>  -->
		</div>
	
	<!--- Zigfu Window close -->	
	
		
      </div>

      <hr>
        <?php include("TigerSchoolTab.php"); ?>

    <div class="container">

      <hr>

      <footer>
        
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>
 	
	  <script type='text/javascript' src='zigfu/zig.js'></script>
    <script type='text/javascript' src='zigfu/record_replay_skeleton.js'></script>
    <script type='text/javascript' src='zigfu/ui_record_replay.js'></script>
    <script type='text/javascript' src='zigfu/record_replay_datasaver.js'></script>
    <!-- <link href="zigfu/radar_skeleton_style.css" type='text/css' rel='stylesheet' />  -->
	
  </body>
</php>