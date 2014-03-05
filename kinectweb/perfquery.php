<?php
$sql = sprintf("
			SELECT * FROM $tblname
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$tmp=$result['total_points'];
			
			if (isset($child1)){
			
$sql = sprintf("
			SELECT * FROM $child1
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$firstchild=$result['total_points'];
			}
			
			if (isset($child2)){
$sql = sprintf("
			SELECT * FROM $child2
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$secondchild=$result['total_points'];	
}

if (isset($grdchild)){
         $sql = sprintf("
			SELECT * FROM $grdchild
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			$grandchild=$result['total_points'];	
}			
?>