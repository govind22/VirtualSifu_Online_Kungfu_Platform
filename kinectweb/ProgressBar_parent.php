<?php
//pass $attempts, $tblname from calling file
$attempts=4;
$sql = sprintf("
			SELECT * FROM $tblname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$test=$result['total_points'];
           // $test=100;
				 if($test < $pointslimit)				 
				{ ?> 
				
				 <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $test/($pointslimit/100) ?>%">
    <span><?php echo $test/($pointslimit/100) ?>%</span>
  </div>
</div>   

	<?php 
	if($tblname == 'tgkick'){
	$total=$result['first_move']+$result['second_move']+$result['third_move']+$result['fourth_move']+$result['fifth_move']; 
	$limit=3000;
	}
	else if($tblname == 'tgwrist'){
	  $total=$result['move1']+$result['move2']; 
	  $limit=1200;
	  }
	  
	else if($tblname == 'tiger'){
	  $total=$result['tgkick']+$result['tgwrist']; 
	  $limit=16000;
	  }  
	  
	  else if($tblname == 'boa'){
	  $total=0;
	  $limit=0;
	  }  
	  
	   else if($tblname == 'earthdragon'){
	  $total=$result['tiger']+$result['boa']; 
	  $limit=40000;
	  }  
	  
	 if($total < $limit)
	    {
		echo $attempts-$result['total_attempts']." more attempts remaining</br>";
	?>
	 
	 <a href="#" class="btn btn-primary disabled" role="button">Action</a>
	  <?php 
	  } else {
	   echo $attempts-$result['total_attempts']." more attempts remaining</br>";
	  ?>
	   <a href="<?php echo $actionlink ?>" class="btn btn-primary" role="button">Action</a>
	   <?php }
	   ?> 		           
				<?php 
				} 
				
				
				else {
				?>		  
		  <img src="img/<?php echo $image ?>" width="140" height="100" alt="40x40" class="img-rounded">
		   <span class="label label-warning">Congrats, You Have Earned This Badge!!!</span>
		 <?php 
		      $count=1;
		     $sql = sprintf(
			"UPDATE earth_dragon_badges 
			SET $tblname='%d'
			WHERE uid='%d'",
			$count,
			$_SESSION['user_id']
		);			
	        $db->query($sql);
		//print_r($query);
		 }
		 ?>
				
           	
           

      