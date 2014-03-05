<?php
$sql = sprintf("
			SELECT * FROM minty_users 
			WHERE email='%s'",
			$db->clean($post->email)
		);
			$result = $db->query($sql);
			$result=$db->fetch_array($result);	
            
			$sql = sprintf("
				INSERT INTO cosmicdragon 
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			
			$sql = sprintf("
				INSERT INTO earthdragon 
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO tiger 
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO tgkick 
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO first_move
				(uid) 
				VALUES ('%d')",
				$id
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO second_move
				(uid) 
				VALUES ('%d')",
				$id
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO third_move
				(uid) 
				VALUES ('%d')",
				$id
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO fourth_move
				(uid) 
				VALUES ('%d')",
				$id
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO fifth_move
				(uid) 
				VALUES ('%d')",
				$id
			);
			$result1 = $db->query($sql);
			
			
			$sql = sprintf("
				INSERT INTO celestial
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO sub_earth
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO earth_dragon_badges
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			
			$sql = sprintf("
				INSERT INTO boa
				(uid) 
				VALUES ('%d')",
				$result['ID']
			);
			$result1 = $db->query($sql);
			//$result1=$db->fetch_array($result1);
			?>