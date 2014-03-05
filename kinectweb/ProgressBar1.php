<?php
//pass $attempts from calling file
$attempts=5;
$sql = sprintf("
			SELECT * FROM $tblname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$test=$result['total_points'];
           // $test=100;
				 if($test < 600)				 
				{ ?> 
				
				 <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $test/6 ?>%">
    <span><?php echo $test/6 ?>%</span>
  </div>
</div> 	 
          
				<?php 
				echo $attempts-$result['total_attempts']." more attempts remaining</br>";
				} 
				
				else {
				?>		  
		  <img src="img/<?php echo $image ?>" width="140" height="100" alt="40x40" class="img-rounded">
		   <span class="label label-warning">Congrats, You Have Earned This Badge!!!</span></br>
		   
		 <?php 
		   $sql = sprintf(
			"UPDATE earth_dragon_badges 
			SET $tblname='%d'
			WHERE uid='%d'",
			1,
			$_SESSION['user_id']
		);		
		$query = $db->query($sql);	
		 }
		 ?>
				
           	
           

      