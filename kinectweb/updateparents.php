<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../config.php');

if (!$user->authenticated)
{
	header('Location: ../signin.php');
	die();
}
?>
<?php

//$_SESSION['user_id']=2;
//echo "Hurrey You did it !!!";
// This is used for updating all parents from first or second or third or fourth or fifth_move
//pass all these variables name from respected php file
$tblname='first_move';
$parent='tgkick';
$grandparent='tiger';
$grandgrandparent='earthdragon';
$grandgrandgrandparent='cosmicdragon';

// Assume after kinect capture and recording, we will know what principles are violated ... db will hold 1 in principle as completed and 0 as violated
// lets assume if all principles are completed then we are going to call this file
// just check here session variables either p1,p2 and p3 is set. if so then just tell them which principles are voilated
 if(isset($_SESSION['p1']) || isset($_SESSION['p2']) || isset($_SESSION['p3']))
 //if($_SESSION['user_id']==2)
 {
    echo "please try again..Hard luck!!!";
	$str= "<h3>List of Principles violated </h3>";
	if($_SESSION['p1'])
	$str.= '<li><a href="principle1Expl.php">Principle 1 - Hip Initiation</a></li>';
	if($_SESSION['p2'])
	$str.= '<li><a href="principle4Expl.php">Principle 2 - Shoulder Down</a></li>';
	if($_SESSION['p3'])
	$str.= '<li><a href="principle3Expl.php">Principle 3 - SPiral Transfer</a></li>';
    echo $str;
 }
 else {
 
$sql = sprintf("
			SELECT * FROM $tblname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);
			if($result['p1']==1 && $result['p2']==1 && $result['p3']==1 && $result['p4']==1 && $result['p5']==1 && $result['p6']==1){			
			   
			   $count=$result['total_points'];
		         if($result['total_attempts'] < 5)	 
				     {
					 
					$count=$result['total_points']+120; 
					 $sql = sprintf(
			"UPDATE $tblname 
			SET total_attempts='%d', total_points='%d'
			WHERE uid='%d'",
			$result['total_attempts']+1,
			$result['total_points']+120,
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
		
		    $count=$result['first_move']+ $result['second_move']+ $result['third_move']+ $result['fourth_move']+ $result['fifth_move'];
           
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
		
		$count =$result['tgkick']+$result['tgwrist'];
		
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
		$count =$result['boa']+$result['tiger'];
		
		
		$sql = sprintf(
			"UPDATE $grandgrandgrandparent 
			SET $grandgrandparent ='%d'
			WHERE uid='%d'",
			$count,
			$_SESSION['user_id']
		);		
		$query = $this->dbase->query($sql);	
		
 	   // update cos_dr from comsimcdragon
	   $sql = sprintf("
			SELECT * FROM $grandgrandgrandparent
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
	   $count =$result['subearth']+$result['celestial']+$result['earthdragon'];
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
		}
?>