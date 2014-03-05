<?php
//include("session.php");
include("header.php");
?>   

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">Earth Dragon Form <small>Types of Earth Dragon Form</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li> <a href="portfolio-1-col.php">First Level Forms</a></li>
			 <li><a href="portfolio-1-col.php">Earth Dragon</a></li>	
			<li class="active">Earth Dragon subforms</li>
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
          <h3>Tiger School</h3>
          
          <p>Enter Tiger Mountain to train in the ways of physical strength and power. At Tiger Mountain you will learn the famous Tiger Breathing, Tiger Kicking Form, Punching Form, Wrist Form, and Sword Form. Virtual Sifu will break down the whole form into chunks of clear, easy to learn moves. Virtual Sifu will also recommend basic Exercise Drills, to guide your practice. Drills will be linked to Basic Principles, and Tiger Spirit Lessons -- the fundamental principles and Tiger quality you focus on for all techniques. For each form you memorize and perform well, you earn a Sash. Earn all Sashes and you earn a Tiger Patch, which can be used to unlock special doors in the Earth Dragon Temple. Welcome to Tiger Mountain! Embrace the Tiger! </p>
           <?php 
                  $tblname='tiger';
				  $pointslimit=20000;
				   $actionlink='Tiger-School-Action.php';
		          //$movename='tiger';
				   $image='tiger.jpg';
				 
				  include("ProgressBar_parent.php");
		 ?>
		   <a class="btn btn-primary" href="Tiger-Subforms.php">Get Started <i class="fa fa-angle-right"></i></a>
          
		 </div>

      </div>

      <hr>

      <div class="row">

        <div class="col-md-7">
          <object id="Object1" type="application/x-shockwave-flash" data="player_flv_mini.swf" width="480" height="360">
<noscript><a rel="nofollow" href ="http://www.java.com">Install or enable JAVA</a></noscript>
<param name="movie" value="Boa.swf" />
<param name="wmode" value="opaque" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="quality" value="high" />
<param name="menu" value="true" />
<param name="autoplay" value="false" />
<param name="autoload" value="false" />
<param name="FlashVars" value="flv=Boa.flv&width=480&height=360&autoplay=0&autoload=0&buffer=5&playercolor=000000 &loadingcolor=9b9a9a&buttoncolor=ffffff&slidercolor=ffffff" />
</object> 
        </div>

        <div class="col-md-5">
          <h3>Boa School</h3>
         
          <p>Enter Boa Forest and journey to discover the power of softness and the softness of power. The breeze blowing through Boa Forest teaches suppleness, grace, and fluidity. At Boa Forest you will learn Boa Long Form, Boa Short Form and Boa Staff Form. Virtual Sifu will break down the whole form into chunks of clear, easy to learn moves. Virtual Sifu will also recommend basic Exercise Drills, to guide your practice. Drills will be linked to Basic Principles, and Boa Spirit Lessons -- the fundamental principles and Boa quality you focus on for all techniques. For each form you memorize and perform well, you earn a Sash. Earn all Sashes and you earn a Boa Patch, which can be used to unlock special doors in the Earth Dragon Temple. Welcome to Boa Forest! Let Boa embrace you!</p>
           <?php 
                   $tblname='boa';
				  $pointslimit=20000;
				   $actionlink='Boa-School-Action.php';
				 $image='boa.jpg';
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
</html>