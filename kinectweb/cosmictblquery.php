<?php
   $sql1 = sprintf(
			"SELECT * FROM cosmicdragon 
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
		   
		$query1 = $user->dbase->query($sql1);
		$result1 = $user->dbase->fetch_array($query1);
		     $test=$result1[$tblname];
?>
