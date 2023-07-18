<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 12-09-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class video_moderation {

	

	public function __construct(){
		$this->connection = new DataBaseMysqlPDOLearning2();
	}

	public function getModerationTable()
	{
	$q = "Select * from `video` WHERE `active` = '4'";
	$result = $this->connection->RunQuery($q);
	$rowReturn = array();
	$x = 0;
	$nRows = $result->rowCount();
	if ($nRows > 0) {

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			//print_r(array_map('utf8_encode', $row));
			//$rowReturn['data'][] = array_map('utf8_encode', $row);

			$rowReturn['data'][] = [

				'id' => $row['id'],
				'name' => $row['name'],
				'supercategory' => $this->getVideoSuperCategory($row['id']),
				'active' => $row['active'],
				'author' => $row['author'],
				'editor' => $row['editor'],
				'tagger' => $row['tagger'],
				'recorder' => $row['recorder'],


			];

			

			$x++;
		}
	
		return json_encode($rowReturn);

	} else {
		

		//RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
		$rowReturn['data'] = [];
		
		return json_encode($rowReturn);
	}

}

public function getUserName($user_id){

	$q = "SELECT `firstname`, `surname` FROM `users` WHERE `user_id` = '$user_id'";
	//echo $q;

	$result = $this->connection->RunQuery($q);
	$nRows = $result->rowCount();
		if ($nRows == 1){

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$firstname = $row['firstname'];
				$surname = $row['surname'];
			}
			
			



			return $firstname . ' ' . $surname;
		}else{
			return FALSE;
		}


}

public function getManagementTable()
	{
		$q = "Select a.*, b.`invite_tag`, b.`accept_tag`, b.`review_tag`, b.`done_tag`, b.`decline_tag` from `video` as a 
	LEFT OUTER JOIN `usersTagging` as b 
	on b.`video_id` = a.`id` 
	WHERE ((b.`invite_tag` IS NULL) OR (b.`invite_tag` IS NOT NULL AND b.`decline_tag` IS NOT NULL) OR (b.`invite_tag` IS NOT NULL AND b.`accept_tag` IS NOT NULL) OR (b.`invite_tag` IS NOT NULL AND b.`review_tag` IS NOT NULL))
	AND (b.`done_tag` IS NULL) 
	GROUP BY a.`id` ORDER BY a.`id` DESC";

	//$q = "Select * from `video` WHERE `active` = '2' OR `active` = '4' ORDER BY `created` DESC";
	$result = $this->connection->RunQuery($q);
	$rowReturn = array();
	$x = 0;
	$nRows = $result->rowCount();
	if ($nRows > 0) {

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			//print_r(array_map('utf8_encode', $row));
			//$rowReturn['data'][] = array_map('utf8_encode', $row);

			$rowReturn['data'][] = [

				'id' => $row['id'],
				'name' => $row['name'],
				'supercategory' => $this->getSuperCategoryName($this->getVideoSuperCategory($row['id'])),
				'active' => $row['active'],
				'author' => $row['author'],
				'editor' => $row['editor'],
				'tagger' => $row['tagger'],
				'recorder' => $row['recorder'],


			];

			

			$x++;
		}
	
		return json_encode($rowReturn);

	} else {
		

		//RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
		$rowReturn['data'] = [];
		
		return json_encode($rowReturn);
	}

}

public function getMyTaggingTable($userid)
	{
	/* $q = "Select a.`id`, a.`name`, a.`author`, a.`active`, b.`invite_tag`, b.`accept_tag`, b.`review_tag`, b.`done_tag`, b.`decline_tag` from `video` as a 
	INNER JOIN `usersTagging` as b 
	on b.`video_id` = a.`id` 
	WHERE (a.`active` = '2' OR a.`active` = '4') AND  
	(b.`user_id` = '$userid') AND ((b.`invite_tag` IS NOT NULL) AND (b.`decline_tag` IS NULL AND b.`done_tag` IS NULL)) 
	GROUP BY a.`id` ORDER BY b.`invite_tag` DESC"; */

	$q = "Select a.`id`, a.`name`, a.`author`, a.`active`, b.`invite_tag`, b.`accept_tag`, b.`review_tag`, b.`done_tag`, b.`decline_tag` from `video` as a 
	INNER JOIN `usersTagging` as b 
	on b.`video_id` = a.`id` 
	WHERE 
	(b.`user_id` = '$userid') AND ((b.`invite_tag` IS NOT NULL) AND (b.`decline_tag` IS NULL AND b.`done_tag` IS NULL)) 
	GROUP BY a.`id` ORDER BY b.`invite_tag` DESC";


	//echo $q;

	$result = $this->connection->RunQuery($q);
	$rowReturn = array();
	$x = 0;
	$nRows = $result->rowCount();
	if ($nRows > 0) {

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			//print_r(array_map('utf8_encode', $row));
			//$rowReturn['data'][] = array_map('utf8_encode', $row);

			$action = null;
					$date = null;
					$expires = null;

					if ($row['decline_tag'] != null){

						$action = 'Tagging declined';
						$date = $row['decline_tag'];
						$expires = null;

					}else if ($row['done_tag'] != null){

						$action = 'Tagging done';
						$date = $row['done_tag'];
						$expires = null;

					}else if ($row['review_tag'] != null){

						if ($row['active'] == 1 || $row['active'] == 2 || $row['active'] == 3){

							$action = 'Tagging Reviewed.  Changes required';
							$date = $row['review_tag'];
							$expires = true;


						}else if ($row['active'] == 4){

							$action = 'Review completed. Awaiting Approval';
							$date = $row['review_tag'];
							$expires = false;

						}

						
					
					}else if ($row['accept_tag'] != null){

						if ($row['active'] == 1 || $row['active'] == 2 || $row['active'] == 3){

							$action = 'Accepted Tagging';
							$date = $row['accept_tag'];
							$expires = true;


						}else if ($row['active'] == 4){

							$action = 'Pending Moderator Review';
							$date = $row['accept_tag'];
							$expires = false;

						}

						

					}elseif ($row['invite_tag'] != null){

						$action = 'Invitation';
						$date = $row['invite_tag'];

						//get user timezone
						
						$expires = true;


					

					}


			$rowReturn['data'][] = [

				'id' => $row['id'],
				'name' => $row['name'],
				'supercategory' => $this->getSuperCategoryName($this->getVideoSuperCategory($row['id'])),
				
				'author' => $row['author'],
				'status' => $action,
				'date' => $date,
				'expires' => $expires,
			


			];

			

			$x++;
		}
	
		return $rowReturn;

	} else {
		

		//RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
		$rowReturn['data'] = [];
		
		return json_encode($rowReturn);
	}

}

public function getOutstandingTable()
	{
	$q = "Select a.`id`, a.`name`, a.`author`, a.`active`, b.`user_id`, b.`invite_tag`, b.`accept_tag`, b.`review_tag`, b.`done_tag`, b.`decline_tag` from `video` as a 
	INNER JOIN `usersTagging` as b 
	on b.`video_id` = a.`id` 
	WHERE (a.`active` = '2') AND  
	((b.`invite_tag` IS NOT NULL) AND (b.`decline_tag` IS NULL AND b.`done_tag` IS NULL)) 
	GROUP BY a.`id` ORDER BY b.`invite_tag` DESC";


	//echo $q;

	$result = $this->connection->RunQuery($q);
	$rowReturn = array();
	$x = 0;
	$nRows = $result->rowCount();
	if ($nRows > 0) {

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

			//print_r(array_map('utf8_encode', $row));
			//$rowReturn['data'][] = array_map('utf8_encode', $row);

			$action = null;
					$date = null;
					$expires = null;

					if ($row['decline_tag'] != null){

						$action = 'Tagging declined';
						$date = $row['decline_tag'];
						$expires = null;

					}else if ($row['done_tag'] != null){

						$action = 'Tagging done';
						$date = $row['done_tag'];
						$expires = null;

					}else if ($row['review_tag'] != null){

						if ($row['active'] == 2){

							$action = 'Tagging Reviewed.  Changes required';
							$date = $row['review_tag'];
							$expires = true;


						}else if ($row['active'] == 4){

							$action = 'Review completed. Awaiting Approval';
							$date = $row['review_tag'];
							$expires = false;

						}

						
					
					}else if ($row['accept_tag'] != null){

						if ($row['active'] == 2){

							$action = 'Accepted Tagging';
							$date = $row['accept_tag'];
							$expires = true;


						}else if ($row['active'] == 4){

							$action = 'Pending Moderator Review';
							$date = $row['accept_tag'];
							$expires = false;

						}

						

					}elseif ($row['invite_tag'] != null){

						$action = 'Invitation';
						$date = $row['invite_tag'];

						//get user timezone
						
						$expires = true;


					

					}


			$rowReturn['data'][] = [

				'id' => $row['id'],
				'name' => $row['name'],
				'supercategory' => $this->getSuperCategoryName($this->getVideoSuperCategory($row['id'])),
				
				'author' => $row['user_id'],
				'status' => $action,
				'date' => $date,
				'expires' => $expires,
			


			];

			

			$x++;
		}
	
		return $rowReturn;

	} else {
		

		//RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
		$rowReturn['data'] = [];
		
		return json_encode($rowReturn);
	}

}

    
     

	public function getVideoSuperCategory($videoid){

		$q = "SELECT e.`superCategory`, d.`tagName` FROM `video` as a INNER JOIN `chapter` as b ON a.`id` = b.`video_id` INNER JOIN `chapterTag` as c ON b.`id` = c.`chapter_id` INNER JOIN `tags` as d ON d.`id` = c.`tags_id` INNER JOIN `tagCategories` as e ON d.`tagCategories_id` = e.`id` WHERE a.`id` = '$videoid' GROUP BY e.`id` ORDER BY d.`tagName` ASC";


			$rowReturn = [];

			$result = $this->connection->RunQuery($q);
			
			$x = 0;
			$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['superCategory'];


				}

				$values = array_count_values($rowReturn);
				arsort($values);
				$popular = array_slice(array_keys($values), 0, 1, true);
				return $popular[0];

			} else {
				

				return false;
			}



	}

	public function getSuperCategoryName($id){

			
		$q = "SELECT `superCategory`, `superCategory_t` from `values` WHERE `superCategory` = '$id'";
			//$q = "SELECT `superCategory` FROM `tagCategories` WHERE `id` = $id";
	
			//echo $q;
	
			$result = $this->connection->RunQuery($q);
	
			$x = 0;
			$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){
					
					$tagCategoryName = $row['superCategory_t'];
				
					
					
					
					
				}
			
				return $tagCategoryName;
			}else{
				
				return null;
			}
		



	}

	public function videoHasOpenTaggerInvite($videoid, $debug){

		$q = "SELECT `user_id` from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NULL AND `done_tag` IS NULL) ORDER BY `invite_tag` DESC";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['user_id'];


				}

				return $rowReturn; //single value expected
			

			} else {
				
				//echo 'false';
				return false;
			}

	}

	public function videoHasOpenTaggerInviteReturnKey($videoid, $debug){

		$q = "SELECT `id` from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NULL AND `done_tag` IS NULL) ORDER BY `invite_tag` DESC";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['id'];


				}

				return $rowReturn; //single value expected
			

			} else {
				
				//echo 'false';
				return false;
			}

	}

	public function getTagLockedUser($videoid, $debug){

		$q = "SELECT `user_id` from `usersTagging` WHERE (`video_id` = '$videoid') AND (`invite_tag` IS NOT NULL) AND (`decline_tag` IS NULL AND `done_tag` IS NULL) ORDER BY `invite_tag` DESC LIMIT 1";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$rowReturn = [];

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn[] = $row['user_id'];


				}

			
				return $rowReturn;

			} else {
				
				//echo 'false';
				return false;
			}


	}

	public function getActionsLast5($videoid, $debug){

		$q = "SELECT `user_id`, `inviting_user`, `invite_tag`, `accept_tag`, `review_tag`, `done_tag`, `decline_tag` from `usersTagging` WHERE (`video_id` = '$videoid') ORDER BY `invite_tag` DESC LIMIT 5";

		if ($debug){

			echo $q;
		}
		$result = $this->connection->RunQuery($q);

		$rowReturn = [];

		$nRows = $result->rowCount();

			if ($nRows > 0) {

				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					

					//$dateArray = [$row['invite_tag'], $row['accept_tag'], $row['review_tag'], $row['done_tag'], $row['decline_tag']];
					//purge null

					//else use Europe/Brussels
					
					//date of action

					//=latest of 4 dates

					//action

					//column head of the 
					$action = null;
					$date = null;
					$expires = null;

					if ($row['decline_tag'] != null){

						$action = 'Tagging declined';
						$date = $row['decline_tag'];
						$expires = null;

					}else if ($row['done_tag'] != null){

						$action = 'Tagging done';
						$date = $row['done_tag'];
						$expires = null;

					}else if ($row['review_tag'] != null){

						$action = 'Tagging sent for Review';
						$date = $row['review_tag'];
						$expires = true;
					
					}else if ($row['accept_tag'] != null){

						$action = 'Accepted Tagging';
						$date = $row['accept_tag'];
						$expires = true;

					}elseif ($row['invite_tag'] != null){

						$action = 'Invitation';
						$date = $row['invite_tag'];

						//get user timezone
						
						$expires = true;


					

					}


					$rowReturn[] = [
						
						'date' => $date,
						'user' => $row['user_id'],
						'inviting_user' => $row['inviting_user'],
						'action' => $action,
						'expires' => $expires,
						'review' => $row['review_tag'],
						
						
						
					];


				}

			
				return $rowReturn;

			} else {
				
				//echo 'false';
				return false;
			}


	}

	public function checkModerationKeyExists($key){

        $q = "SELECT `id` FROM `usersTagging` WHERE `id` = '$key'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                return TRUE;
			}else{
				return FALSE;
			}


	}

	public function getMailImage($videoid){

        $q = "SELECT `thumbnail` FROM `video` WHERE `id` = '$videoid'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['thumbnail'];


				}

				return $rowReturn;

			
				
			}else{
				return FALSE;
			}


	}

	public function isVideoLive($videoid){

        $q = "SELECT `active` FROM `video` WHERE `id` = '$videoid'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['active'];


				}

				if ( $rowReturn == '1' || $rowReturn == '3'){
					return TRUE;
				}else{
					return FALSE;
				}

			
				
			}else{
				return FALSE;
			}


	}

	public function isVideoUnderReview($videoid){

        $q = "SELECT `active` FROM `video` WHERE `id` = '$videoid'";
        //echo $q;

        $result = $this->connection->RunQuery($q);
		$nRows = $result->rowCount();
			if ($nRows == 1){

                while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$rowReturn = $row['active'];


				}

				if ( $rowReturn == '4'){
					return TRUE;
				}else{
					return FALSE;
				}

			
				
			}else{
				return FALSE;
			}


	}
/**
    
     * Close mysql connection
     */
	public function endvideo_moderation(){
		$this->connection->CloseMysql();
	}

}