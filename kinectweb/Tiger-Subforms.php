<?php
include("header.php");
?>   
    

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">Tiger Form <small>Types of Tiger Form</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li> <a href="portfolio-1-col.php">First Level Forms</a></li>
			 <li><a href="Earth-DragonForm.php">Earth Dragon</a></li>
			 <li><a href="Earth-DragonForm.php">Earth Dragon subforms</a></li>
			<li><a href="Earth-DragonForm.php">Tiger Form</a></li>
			<li class="active">Tiger Subforms</li>
          </ol>
        </div>

      </div>

     
      <hr>

      <div class="row">

        <div class="col-md-7">
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

        <div class="col-md-5">
          <h3>Tiger Kicking Form</h3>
          
          <p>Welcome to Tiger Kicking Form where you will learn Front Thrust, Back Thrust and Side Thrust kicks and to combine them with deep stances, powerful punches and protective blocks. Virtual Sifu will track you as you learn the moves from a self-looping video, and highlight what needs to be worked on, giving you points towards earning your Sash. If you get want to zero-in on a particular chunk, scroll down to the video clips for even more detail and look at the recommended Drills, study the Basic Principles, or meditate on the Tiger Spirit, just by clicking on the link. Study these and you will earn your Tiger Sahes faster, and your Tiger Patch for Animal Mastery!</p>
           <?php 
                 // $test=70;
				 // include("ProgressBar.php");
				 $tblname='tgkick';
				 $pointslimit=8000;
				 $actionlink='Tiger-Kicking-Action.php';
				  $image='tigerkicking.jpg';
				 include("ProgressBar_parent.php");
           ?>	         
		 <a class="btn btn-primary" href="Tiger-KickingSubforms1-4.php">Get Started <i class="fa fa-angle-right"></i></a>
        </div>

      </div>

      <hr>

      <div class="row">
	 
        <div class="col-md-7">
           <div class="col-md-7">
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
        </div>

        <div class="col-md-5">
          <h3>Tiger Wrist Form</h3>
         
          <p>Welcome to Tiger wrist Form where you will learn Front Thrust, Back Thrust and Side Thrust kicks and to combine them with deep stances, powerful punches and protective blocks. Virtual Sifu will track you as you learn the moves from a self-looping video, and highlight what needs to be worked on, giving you points towards earning your Sash. If you get want to zero-in on a particular chunk, scroll down to the video clips for even more detail and look at the recommended Drills, study the Basic Principles, or meditate on the Tiger Spirit, just by clicking on the link. Study these and you will earn your Tiger Sahes faster, and your Tiger Patch for Animal Mastery!</p>
           <?php 
                //  $test=5;
				 // include("ProgressBar.php");
				 $tblname='tgwrist';
				 $pointslimit=8000;
				$actionlink='Tiger-Wrist-Action.php';				 
				 $image='tigerwrist.jpg';
				  include("ProgressBar_parent.php");
           ?>	
		  <a class="btn btn-primary" href="#">Get Started <i class="fa fa-angle-right"></i></a>
        </div>

      </div>

      <hr>

      <div class="row text-center">
        
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>        
        </div>

      </div>

    </div><!-- /.container -->

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
  </body>
</php>