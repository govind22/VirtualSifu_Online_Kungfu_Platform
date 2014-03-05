<?php
$sql = sprintf("
			SELECT * FROM $tblname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$tmp=$result[$formname];
			
			if (isset($child1)){
			
$sql = sprintf("
			SELECT * FROM $formname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$firstchild=$result[$child1];
			}
			
			if (isset($child2)){
$sql = sprintf("
			SELECT * FROM $formname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$secondchild=$result[$child2];	
}			
?>