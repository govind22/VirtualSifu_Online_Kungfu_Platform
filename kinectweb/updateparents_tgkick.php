<?php

// This is used for updating all parents from first or second or third or fourth or fifth_move
//pass all these variables name from respected php file
$tblname='tgkick';
$parent='tiger';
$grandparent='earthdragon';
$grandgrandparent='cosmicdragon';

// Assume after kinect capture and recording we will come to know what principles are violated ... db will hold 1 in principle as completed and 0 as violated
// lets assume if all principles are completed then we are going to call this file

$sql = sprintf("
			SELECT * FROM $tblname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);
			if($result['p1']==1 && $result['p2']==1 && $result['p3']==1 && $result['p4']==1 && $result['p5']==1 && $result['p6']==1){			
			   
			   $count=$result['total_points'];
		         if($result['total_attempts'] < 4)	 
				     {
					 
					$count=$result['total_points']+2000; 
					 $sql = sprintf(
			"UPDATE $tblname 
			SET total_attempts='%d', total_points='%d'
			WHERE uid='%d'",
			$result['total_attempts']+ 1,
			$result['total_points']+2000,
			$_SESSION['user_id']
		);		
		$query = $this->dbase->query($sql);	
			
			$sql = sprintf(
			"UPDATE $parent 
			SET $tblname='%d'
			WHERE uid='%d'",
			$count,
			$_SESSION['user_id']
		);		
		$query = $this->dbase->query($sql);	
		
        // update $parent parent $grandparent
		
		 $sql = sprintf("
			SELECT * FROM $parent
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
             
           if($tblname == 'tgkick')			
		   { $count=$result['$tblname']+ $result['tgwrist'];}
           else
		    {  $count=$result['$tblname']+ $result['tgkick'];}
		   
		   $sql = sprintf(
			"UPDATE $grandparent 
			SET $parent='%d'
			WHERE uid='%d'",
			$count,
			$_SESSION['user_id']
		);		
		$query = $this->dbase->query($sql);	
		
		// update $grandparent parent $grandgrandparent
         $sql = sprintf("
			SELECT * FROM $grandparent
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
		
		$count =$result['$parent']+$result['boa'];
		
		$sql = sprintf(
			"UPDATE $grandgrandparent 
			SET $grandparent='%d'
			WHERE uid='%d'",
			$count,
			$_SESSION['user_id']
		);		
		$query = $this->dbase->query($sql);	
     
       // update $grandgrandparent parent $grandgrandgrandparent
        $sql = sprintf("
			SELECT * FROM $grandgrandparent
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
		$count =$result['celestial']+$result['$grandparent']+$result['subearth'];
		
	   $sql = sprintf(
			"UPDATE $grandgrandgrandparent 
			SET cos_dr ='%d'
			WHERE uid='%d'",
			$count,
			$_SESSION['user_id']
		);		
		$query = $this->dbase->query($sql);	
		}
		}
		
?>