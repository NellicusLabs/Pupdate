<?php
class Model { // PARENT CLASS...

		function __construct() {	
		
			$this->con = config(); // CALL CONFIGRATION FUNCTION

		}
		
		// DASHBOARD PAGE CONTROL HERE...
		function dashboard(){ 
		
			$sql = "SELECT * FROM pets WHERE pet_status=0 ORDER BY pet_id DESC";
			$result = mysqli_query($this->con, $sql);			
			return $result;		  
		}
		
		// PAGE TITLE CONTROL HERE...
		function pageTitle($id){ 
		
			$sql = "SELECT pet_name FROM pets WHERE pet_id=".$id;
			$result = mysqli_query($this->con,$sql);			
			$rows = mysqli_num_rows($result);
			if($rows > 0){
				$res = mysqli_fetch_row($result);
				return $res[0];		
			}			  
		}
		
		// ADD PET PAGE CONTROL HERE...
		function addPet($post){
		
		
			$pet_name = $post['name'];
			$pet_dob = $post['pet_dob'];
			$pet_species = $post['species'];
			$pet_breed = $post['breed'];
			$sqlfetch = "SELECT * FROM pets WHERE pet_name='".$pet_name."' AND pet_dob='".$pet_dob."' AND pet_breed='".$pet_breed."' AND pet_species='".$pet_species."'";
			$resultfetch = mysqli_query($this->con,$sqlfetch);	
			$rows = mysqli_num_rows($resultfetch);
			if($rows > 0){
				echo 'Pet information already inserted!';
				exit;
			}else{	
				$sql = "INSERT INTO pets (pet_name,pet_dob,pet_breed,pet_species,pet_status) VALUES ('".$pet_name."','".$pet_dob."','".$pet_breed."','".$pet_species."',0)";
				$Query = mysqli_query($this->con,$sql);
				$last_id = mysqli_insert_id($this->con);
				echo $last_id;
				exit;
			}			
			
		}
		
		// PROFILE PAGE CONTROL HERE...
		function profile($pid){
			$sql = "SELECT * FROM pets WHERE pet_id=".$pid;
			$result = mysqli_query($this->con,$sql);	
			return $result;	
		}
		
		// PROFILE PAGE GET MARKING ...
		function getMarking($pid){
			$sql = "SELECT * FROM marking WHERE pet_id=".$pid;
			$row = mysqli_query($this->con,$sql);	
			return $row;	
		}
		
		// PROFILE PAGE GET MARKING FIELDS...
		function getMarkingField($pid){
			$sql = "SELECT * FROM marking_fields WHERE pet_id=".$pid;
			$row = mysqli_query($this->con,$sql);	
			return $row;	
		}
		
		// PROFILE PAGE GET VACCINATIONS...
		function getVaccinations($pid){
			$sql = "SELECT * FROM vaccinations WHERE pet_id=".$pid." ORDER BY id DESC";
			$row = mysqli_query($this->con,$sql);	
			return $row;	
		}
		
		// EDIT PROFILE PAGE CONTROL HERE...
		function editProfile($post){
			
			$pet_name = $post['pet_name'];
			$pet_age = $post['pet_age'];
			$pet_breed = $post['pet_breed'];
			$pet_species = $post['pet_species'];
			$pet_color = $post['pet_color'];
			$pet_dob = $post['pet_dob'];
			$pet_sex = $post['pet_sex'];
			$pid = $post['pid'];
			
			$sql = "UPDATE pets SET pet_name='".$pet_name."', pet_age='".$pet_age."', pet_breed='".$pet_breed."' , pet_species='".$pet_species."', pet_color='".$pet_color."', pet_dob='".$pet_dob."', pet_sex='".$pet_sex."' WHERE pet_id=".$pid;
			
			$result = mysqli_query($this->con,$sql);	
			if($result){
				echo 'Pet information updated!';
				exit;
			}else{
				echo 'Somthing went wrong!';
				exit;
			}
						
		}
		
		// EDIT PROFILE PAGE DESCRIPTION CONTROL HERE...
		function editDescription($post){
			
			$about_pet = $post['about_pet'];
			$pid = $post['pid'];
			
			$sql = "UPDATE pets SET about_pet='".$about_pet."' WHERE pet_id=".$pid;
			
			$result = mysqli_query($this->con,$sql);	
			if($result){
				echo 'Pet description updated!';
				exit;
			}else{
				echo 'Somthing went wrong!';
				exit;
			}
						
		}
		
		// EDIT MARKING FIELD PAGE CONTROL HERE...
		function editMarkingField($post){
			
			$marking_name = $post['marking_name'];
			$marking_data = $post['marking_data'];
			$mid = $post['mid'];
			
			$sql = "UPDATE marking_fields SET marking_name='".$marking_name."' , marking_data='".$marking_data."' WHERE id=".$mid;
			
			$result = mysqli_query($this->con,$sql);	
			if($result){
				echo 'Marking field updated!';
				exit;
			}else{
				echo 'Somthing went wrong!';
				exit;
			}
						
		}
		
		// EDIT MARKING CONTROL HERE...
		function editMarking($post){
			
			$transponder_number = $post['transponder_number'];
			$date_of_application = $post['date_of_application'];
			$location = $post['location'];
			$pid = $post['pid'];
			$sqlfetch = "SELECT id FROM marking WHERE pet_id='".$pid."'";
			$resultfetch = mysqli_query($this->con,$sqlfetch);	
			$rows = mysqli_num_rows($resultfetch);
			if($rows > 0){
				$sql = "UPDATE marking SET transponder_number='".$transponder_number."', date_of_application='".$date_of_application."', location='".$location."' WHERE pet_id=".$pid;			
				mysqli_query($this->con,$sql);
				echo 'Marking information updated!';
				exit;
			}else{	
				$sql = "INSERT INTO marking (transponder_number,date_of_application,location,pet_id) VALUES ('".$transponder_number."','".$date_of_application."','".$location."','".$pid."')";
				mysqli_query($this->con,$sql);
				echo 'Marking information updated!';
				exit;
			}	
			
						
		}
		
		// EDIT VACCINATION IN PROFILE PAGE...
		function editVaccination($post){ 
			
			$type = $post['type'];
			$date = $post['date'];
			$valid = $post['valid'];
			$pid = $post['pid'];
			$sqlfetch = "SELECT id FROM vaccinations WHERE pet_id='".$pid."' AND type='".$type."' AND date='".$date."' AND valid='".$valid."'";
			$resultfetch = mysqli_query($this->con,$sqlfetch);	
			$rows = mysqli_num_rows($resultfetch);
			if($rows > 0){
				$res = mysqli_fetch_row($resultfetch);
				$id = $res[0];
				$sql = "UPDATE vaccinations SET type='".$type."', date='".$date."', valid='".$valid."' WHERE id=".$id;			
				mysqli_query($this->con,$sql);
				echo 'Vaccination information updated!';
				exit;
			}else{	
				$sql = "INSERT INTO vaccinations (type,date,valid,pet_id) VALUES ('".$type."','".$date."','".$valid."','".$pid."')";
				mysqli_query($this->con,$sql);
				echo 'Vaccination information added!';
				exit;
			}	
			
						
		}
		
		// DELETE VACCINATION PAGE CONTROL HERE...
		function deleteVaccination($post){
			$vid = $post['vid'];
			$sql = "DELETE FROM vaccinations WHERE id=".$vid;
			$row = mysqli_query($this->con,$sql);	
			return $row;	
		}
		
		// DELETE MAKING FIELD PAGE CONTROL HERE...
		function deleteMarkingField($post){ 
			$mid = $post['mid'];
			$sql = "DELETE FROM marking_fields WHERE id=".$mid;
			$row = mysqli_query($this->con,$sql);	
			return $row;	
		}
		
		// DELETE PROFILE PAGE CONTROL HERE...
		function deleteProfile($post){
			$pet_id = $post['pet_id'];
			$sql = "DELETE FROM pets WHERE pet_id=".$pet_id;
			$row = mysqli_query($this->con,$sql);	
			echo 'Profile record deleted!';
			exit;	
		}

		// ADD EVENT OF INDIVIDUAL PET ...
		function addEvent($post){ 
			//print_r($post);die;
		    if($post['event_type']){
				$event_type = $post['event_type'];
				$time = $post['event_time'];
				$pid = $post['pid'];
				$date = date('m/d/Y');
				$event_time  = $date.' '.$time; 
				 if($event_type == 'Pee & Poo'){
					$sql = "INSERT INTO events (pet_id,event_type,event_time) VALUES ('".$pid."','Pee','".$event_time."')";
					mysqli_query($this->con,$sql);
					
					$sql = "INSERT INTO events (pet_id,event_type,event_time) VALUES ('".$pid."','Poo','".$event_time."')";
					mysqli_query($this->con,$sql);
					
				 }else{	 
					$sql = "INSERT INTO events (pet_id,event_type,event_time) VALUES ('".$pid."','".$event_type."','".$event_time."')";
					mysqli_query($this->con,$sql);
				 }			
			}	
		}
		
		// PROFILE PAGE GET EVENTS RECORDS...
		function getEvents($pid){
			$sql = "SELECT * FROM events WHERE pet_id=".$pid." ORDER BY id DESC LIMIT 5";
			$query = mysqli_query($this->con,$sql);	
			$row = mysqli_num_rows($query);
			if($row > 0){	
			while($res = mysqli_fetch_assoc($query)){	
			$timeexplode = explode(' ',$res['event_time']); 
			$event_time = $timeexplode[1].' '.$timeexplode[2].' '.$timeexplode[0];
			
				$tr .= '<tr><th scope="row"><a id="'.$res['id'].'" class="del-event"><em class="fa fa-trash"></em></a></th>
				<td>'.$res['event_type'].'</td>
				<td>'.$event_time.'</td>
				</tr>';
            }	
			$tr .="<script> $('.del-event').on('click', function() {
					var id = $(this).attr('id');
					var pid = $('#pid').val();
					if(id){
						var checkstr =  confirm('Are you sure you want to delete this event?');
						if(checkstr == true){
								$.ajax({     
									type: 'POST',
									url: 'ajax/delete-event.php',
									data: { 'id': id, 'pid': pid },
									success: function (data) {
										$('.event-table').html(data);
									},
								});
							}else{
							return false;
						} 
					}
				})</script>";
			}else{
				$tr = 'No record found.';
			}				
			echo  $tr;	
		}
		
		// DASHBOARD GET EVENT...
		function getprofileEvents($pid){ 
			$sql = "SELECT * FROM events WHERE pet_id=".$pid." ORDER BY id DESC";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// DELETE VACCINATION PAGE CONTROL HERE...
		function deleteEvent($post){ 
			$id = $post['id'];
			$sql = "DELETE FROM events WHERE id=".$id;
			$row = mysqli_query($this->con,$sql);	
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastPlaytime($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Playtime' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastMeal($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Meal' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastWater($pid){
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Water' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastTreat($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Treat' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		// PROFILE PAGE CONTROL HERE...
		function lastVomit($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Vomit' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		// PROFILE PAGE CONTROL HERE...
		function lastPooDiarrhea($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Poo-Diarrhea' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastPee($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Pee' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastPoo($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Poo' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastPeePoo($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Pee & Poo' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastBath($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Bath' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastVetVisit($pid){ 
			$sql = "SELECT event_time,event_type FROM events WHERE pet_id=".$pid." AND event_type ='Vet Visit' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE CONTROL HERE...
		function lastWeight($pid){ 
			$sql = "SELECT event_time,event_type,event_data FROM events WHERE pet_id=".$pid." AND event_type ='Weight' ORDER BY id DESC LIMIT 1";
			$row = mysqli_query($this->con,$sql);								 
			return $row;	
		}
		
		// PROFILE PAGE IMAGE CONTROL HERE...
		function profileImage($image_name , $pid){
			
			$sql = 'UPDATE pets SET pet_image ="'.$image_name.'" WHERE pet_id='.$pid;
			mysqli_query($this->con,$sql);
			exit;
		}
		
		// PROFILE PAGE WEIGHT CONTROL HERE...
		function addWeight($post){ 
		
			$weight = $post['weight'];
			$pid = $post['pid'];
			$time = $post['event_time'];
			$date = date('m/d/Y');
			$event_time  = $date.' '.$time;
				
				$sql = "INSERT INTO events (pet_id,event_type,event_time, event_data) VALUES ('".$pid."','Weight','".$event_time."','".$weight."')";
				mysqli_query($this->con,$sql);
				echo 'Weight information inserted sucessfull!';
				exit;
			
			
		}
		
		// PROFILE PAGE MAKING ADD CONTROL HERE...
		function addMarking($post){ 
		
			$marking_name = $post['marking_name'];
			$marking_data = $post['marking_data'];
			$pid = $post['pid'];
			
			$sqlfetch = "SELECT * FROM marking_fields WHERE marking_name='".$marking_name."' AND marking_data='".$marking_data."' AND pet_id =".$pid;
			
			$resultfetch = mysqli_query($this->con,$sqlfetch);	
			$rows = mysqli_num_rows($resultfetch);
			if($rows > 0){
				echo 'Marking field already inserted!';
				exit;
			}else{	
				$sql = "INSERT INTO marking_fields (marking_name,marking_data,pet_id) VALUES ('".$marking_name."','".$marking_data."',".$pid.")";
				mysqli_query($this->con,$sql);
				echo 'Marking field inserted sucessfull!';
				exit;
			}
			
		}
		
		// PROFILE PAGE EVENTS WITH PAGINATION MAKING ADD CONTROL HERE...
		function allEvents($post){ 
				$pid = $post['pid'];
				$record_per_page = 5;

				
				$page = "";
				$result = "";
				
				if(ISSET($post['page'])){
					$page = $post['page'];
				}else{
					$page =  1;
				}
				
				$start = ($page - 1) * $record_per_page;
				$sQL = "SELECT * FROM events WHERE pet_id=".$pid." ORDER BY id DESC LIMIT $start, $record_per_page";
				
				$q_book = mysqli_query($this->con,$sQL);	
				$result .="<table class='table table-striped tbl-td' ><tbody>";
				while($f_book = mysqli_fetch_assoc($q_book)){	
					$timeexplode = explode(' ',$f_book['event_time']); 
					$result .= "
						<tr>
						 <th scope='row'><a id='".$f_book['id']."' class='del-event'><em class='fa fa-trash'></em></a></th>               
							<td style = 'width:50%;'>".$f_book['event_type']."</td>
							<td style = 'width:50%;'>".$timeexplode[1].' '.$timeexplode[2].' '.$timeexplode[0]."</td>
						</tr>
					";
				}
				$result .= "
					</tbody></table>
				";
				
				$qsql = "SELECT * FROM events WHERE pet_id=".$pid;
				$q_page =  mysqli_query($this->con,$qsql);
				$v_page = mysqli_num_rows($q_page);
				
				$total_pages = ceil($v_page/$record_per_page);
				$total_pages = 8;
				$result .="<ul class='page-nav main-sel'>";
				/* for($i = 1; $i <= $total_pages; $i++){ */
				for($i = 1; $i <= $total_pages; $i++){
					if($i == $page){
						$class = 'active';
					}else{
						$class = '';
					}
						$result .="<li class = 'pagination ".$class."'  id = '".$i."'>".$i."</li>";
					}
					$result .="</ul>";
					$result .="<script> $('.del-event').on('click', function() {
										var id = $(this).attr('id');
										var pid = $('#pid').val();
										if(id){
											var checkstr =  confirm('Are you sure you want to delete this event?');
											if(checkstr == true){
													$.ajax({     
														type: 'POST',
														url: 'ajax/delete-event.php',
														data: { 'id': id, 'pid': pid },
														success: function (data) {
															location.reload();
														},
													});
												}else{
												return false;
											} 
										}
									})</script>";
			echo $result;
		}
		
}	
?>
