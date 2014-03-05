<?php
include("header.php");
?>   

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">First level Forms <small>Start from here</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">First level Forms</li>
          </ol>
        </div>

      </div>

      <div class="row">

        <div class="col-md-7">
          <object id="Object1" type="application/x-shockwave-flash" data="player_flv_mini.swf" width="480" height="360">
<noscript><a rel="nofollow" href ="http://www.java.com">Install or enable JAVA</a></noscript>
<param name="movie" value="Earth.swf" />
<param name="wmode" value="opaque" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="quality" value="high" />
<param name="menu" value="true" />
<param name="autoplay" value="false" />
<param name="autoload" value="false" />
<param name="FlashVars" value="flv=Earth.flv&width=480&height=360&autoplay=0&autoload=0&buffer=5&playercolor=000000 &loadingcolor=9b9a9a&buttoncolor=ffffff&slidercolor=ffffff" />
</object> 
        </div>

        <div class="col-md-5">
          <h3>Earth Dragon</h3>
          <p>Earth Dragon combines the irrepressible force of Tiger with the irresistible grace of Boa, combining spiraling punches and kicks with locks and chokes and that seem to happen as if by magic. In Wushu Valley, Earth Dragon Temple has produced the greatest number of Dragon Warriors, warriors who have fought for the good of the valley people. Enter the Earth Dragon Temple, or visit Tiger Mountain or Boa Forest to earn Sashes for individual forms and a Patch for Animal Mastery!</p>
           <?php 
		          $tblname='earthdragon';
		         // $movename='earthdragon';
				 $pointslimit=40000;
				   $image='earthdragon.jpg';
				    $actionlink='Earth-Dragon-Action.php';
				 
                 // include("cosmictblquery.php");
				  include("ProgressBar_parent.php");
           ?>		   
		 <a class="btn btn-primary" href="Earth-DragonForm.php">Get Started <i class="fa fa-angle-right"></i></a>
        </div>

      </div>

      <hr>

      <div class="row">

        <div class="col-md-7">
          <object id="Object1" type="application/x-shockwave-flash" data="player_flv_mini.swf" width="480" height="360">
<noscript><a rel="nofollow" href ="http://www.java.com">Install or enable JAVA</a></noscript>
<param name="movie" value="Celestial.swf" />
<param name="wmode" value="opaque" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="quality" value="high" />
<param name="menu" value="true" />
<param name="autoplay" value="false" />
<param name="autoload" value="false" />
<param name="FlashVars" value="flv=celestial.flv&width=480&height=360&autoplay=0&autoload=0&buffer=5&playercolor=000000 &loadingcolor=9b9a9a&buttoncolor=ffffff&slidercolor=ffffff" />
</object> 
        </div>

        <div class="col-md-5">
          <h3>Celestial Dragon</h3>
          
          <p>Celestial Dragon is a combination of White Leopard and Cobra styles, and combines high flying kicks with pressure point strikes. The Celestial Dragon Temple is well-known throughout Wushu Valley as the most demanding for its acrobatics and subtle energy control. You can choose to enter the Temple or knock on the doors of Leopard Peak or House of Cobra to gain entrance to these animal schools, where you will earn Sashes for individual forms you learn on your way to obtaining the Patch…for Animal Mastery!</p>
           <?php 
                   $tblname='celestial';
		          $pointslimit=40000;
				$image='celestial.jpg';
				  $actionlink='Celestial-Dragon-Action.php';
				  include("ProgressBar_parent.php");
           ?>	        
 		 <a class="btn btn-primary" href="CelestialDragon.php">Get Started <i class="fa fa-angle-right"></i></a>
        </div>

      </div>

      <hr>

      <div class="row">

        <div class="col-md-7">
         <object id="Object1" type="application/x-shockwave-flash" data="player_flv_mini.swf" width="480" height="360">
<noscript><a rel="nofollow" href ="http://www.java.com">Install or enable JAVA</a></noscript>
<param name="movie" value="sberth.swf" />
<param name="wmode" value="opaque" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="quality" value="high" />
<param name="menu" value="true" />
<param name="autoplay" value="false" />
<param name="autoload" value="false" />
<param name="FlashVars" value="flv=SubEarth.flv&width=480&height=360&autoplay=0&autoload=0&buffer=5&playercolor=000000 &loadingcolor=9b9a9a&buttoncolor=ffffff&slidercolor=ffffff" />
</object> 
        </div>

        <div class="col-md-5">
          <h3>Sub-Earth Dragon</h3>
         
          <p>Sub-Earth Dragon marries the Black Panther and Python styles, combining high-speed circular kicks and strikes with crippling locks and joint-breaks. Disciples of Sub-Earth Dragon Temple master the art of whirling, spinning and whipping kicks and chops, and are known throughout Wushu Valley as the Shadow Warriors, for their subterfuge and cunning. You may enter the Sub-Earth Dragon Temple directly, but the most renown Shadow Warriors started their arduous training in Python Tower or Panther’s Den, where they earned Sashes for learning individual forms and Patches for their Animal Mastery! </p>
          <?php 
                   $tblname='sub_earth';
		         // $movename='subearth';
				  $pointslimit=40000;
                 $image='subearth.jpg';
				   $actionlink='SubEarth-Dragon-Action.php';
				  include("ProgressBar_parent.php");
           ?>	         
		 <a class="btn btn-primary" href="subEarthDragonForm.php">Get Started <i class="fa fa-angle-right"></i></a>
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