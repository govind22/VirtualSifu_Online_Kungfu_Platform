<?php

//retrieve batches earned by user
 $badges=array();
 $sql = sprintf("
			SELECT * FROM earth_dragon_badges
			WHERE uid='%d'",
			$_SESSION['user_id']
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
			
			if($result['first_move'] == 1 )
			  array_push($badges,"img/shaas.png");
			
		   if($result['second_move'] == 1 )
			  array_push($badges,"img/shaas.png");
		 if($result['third_move'] == 1 )
			  array_push($badges,"img/shaas.png");
		 if($result['fourth_move'] == 1 )
			  array_push($badges,"img/shaas.png");
		 if($result['fifth_move'] == 1 )
			  array_push($badges,"img/shaas.png");
		 if($result['tgkick'] == 1 )
			  array_push($badges,"img/tigerkicking.jpg");
		 if($result['tgwrist_move1'] == 1 )
			  array_push($badges,"img/shaas.png");
		 if($result['tgwrist_move2'] == 1 )
			  array_push($badges,"img/shaas.png");
		 if($result['tgwrist'] == 1 )
			  array_push($badges,"img/tigerwrist.jpg");
		 if($result['tiger'] == 1 )
			  array_push($badges,"img/tiger.jpg");
		 if($result['earthdragon'] == 1 )
			  array_push($badges,"img/earthdragon.jpg");
			  
		

?>