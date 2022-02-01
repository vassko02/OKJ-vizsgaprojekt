<?php
	$error = false;
	$guestnumbererror = false;
	$Roomslist = $RoomObj->selectallrooms();
 	// echo '<pre>';
	// print_r($_SESSION);
	// echo '</pre>';

		if (isset($_POST['Edit'])) {
			$edit =$_POST['Edit'];
			if ($edit == "true") {
				
			}
			else{
				echo 'asd';
				session_unset();
			}
		}
		else{
		
			$HelpObj->clearReservation();
			$edit = "false";

		}

	if (isset($_POST['btn_srch'])) {
		$in =  $_POST['checkin'];
		$out = $_POST['checkout'];
		$date = date('Y-m-d');
		$guestnumber = $_POST['childrennumber']+$_POST['adultnumber'];
		echo $guestnumber;
		if (($_POST['adultnumber'] > 1 || $_POST['childrennumber'] > 1) && $guestnumber <= 5 ) {
			$_SESSION['adult'] = $_POST['adultnumber'];
			$_SESSION['children'] = $_POST['childrennumber'];
			$error = false;
			if ($in < $out && $in > $date ) {
				$_SESSION['checkin'] = $_POST['checkin'];
				$_SESSION['checkout'] = $_POST['checkout'];
				$filteredrooms = $RoomObj->selectrooms($_POST);
			
				$guestnumbererror = false;
			}
			else {
				$error = true;
			}
		}
		else{
			$guestnumbererror = true;
		}
		

	
		
	}
	//$HelpObj->writearray($_POST);
    //$HelpObj->writearray($_SESSION);
?>

<div class="book">
	<div class="datas" id="box">
		<form method="POST">
			<div class="form-group div1 row">
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="adultsnumber">Number of adults</label>
						</div>
						<div class="third">
							<input class="form-control" required value="<?php if (isset($_SESSION['adult'])) {
									echo $_SESSION['adult'];
								}else{ echo 2 ;} ?>" type="number" name="adultnumber" id="adultsnumber"  placeholder="Adults">
						</div>
					</div>
				</div>
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="childrennumber">Number of children</label>
						</div>
						<div class="third">
							<input class="form-control" required value="<?php if (isset($_SESSION['children'])) {
									echo $_SESSION['children'];
								}
								else{ echo 0 ;} ?>" type="number" name="childrennumber" id="childrennumber"  placeholder="Children">
						</div>
					</div>
				</div>
		
			</div>
			<div class="form-group div2 row">
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="arrivaldate">Check-in</label>
						</div>
						<div class="third">
							<input type="date" required value="<?php if (isset($_SESSION['checkin'])) {
									echo $_SESSION['checkin'];
								}else{ echo date('2022-04-20') ;} ?>"  class="form-control " name="checkin"  id="arrivaldate">
						</div>
					</div>
				</div>
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="leavingdate">Check-out</label>
						</div>
						<div class="third">
							<input type="date" required value="<?php if (isset($_SESSION['checkout'])) {
									echo $_SESSION['checkout'];
								}else{ echo date('2022-04-25') ;} ?>" class="form-control " name="checkout" id="leavingdate">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group div3">
			<button  class="btn src" type="submit" name="btn_srch">Search rooms</button>
			<p id="error"><?php if ($error === true) { echo 'Please provide valid dates!'; } else {}?></p>
			<p id="error"><?php if ($guestnumbererror === true) { echo 'Please provide valid numbers!'; } else {}?></p>
				<!-- <button class="learn-more btn" type="submit" name="btn_srch" id="button">
					<span class="circle" aria-hidden="true">
						<span class="icon arrow"></span>
					</span>
					<a class="button-text"  href="">Search rooms</a>
				</button> -->
			</div>
		</form>
	</div>
</div>
<?php
// echo ('<pre>');
// print_r($asd);
// echo ('</pre>');
?>
<!-- 	 -->
<section class="dark hatter" id="osszesszoba">
	<div class=" py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">Our Rooms</h1>
		<?php
		if (isset($_POST['btn_srch']) && isset($_SESSION['checkin'])) {
			
			// $_POST = array();
			//  echo ('<pre>');
 			// print_r($_POST);
 			// echo ('</pre>');
			if (count($filteredrooms) == 0) {
				echo'
					<p id="sorry">We dont have any available room at the moment :(</p>
				';
			}
			foreach ($filteredrooms as $room) {
				echo'
			
				<article class="postcard dark blue">
				<a class="postcard__img_link" href="index.php?m=roomdetail&">
					<img class="postcard__img" src="'.$room['ImageURL1'].'" alt="Image Title" />
				</a>
				<div class="postcard__text">
					<h1 class="postcard__title blue"><a href="index.php?m=roomdetail">'.$room['RoomName'].'</a></h1>
					<div class="postcard__subtitle medium">
						<p class="fas  mr-2">Room capacity: '.$room['Capacity'].'</p>
					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">'.$room['Description'].'</div>
					<ul class="postcard__tagbox ">
					<li class="tag__item pt-2" ><i class="fas fa-tag mr-2"></i>Room</li>
					<li class="tag__item play blue ">
					<form action="'.$baseUrl.'/booking/roomdetail"  method="post">
					<button type="submit" class="btn text-light" "><i class="fas"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
					<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
					<path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
					</svg> Book now</button>
					<input type="hidden" id="Roomid" name="Roomid" value="'.$room['RoomID'].'">
					</form>
					</li>
					</ul>
						</div>
						</article>
						
				';
			}
		}
		else{
			foreach ($Roomslist as $room) {
				echo'
				<article class="postcard dark blue">
				<a class="postcard__img_link" href="#">
					<img class="postcard__img" src="'.$room['ImageURL1'].'" alt="Image Title" />
				</a>
				<div class="postcard__text">
					<h1 class="postcard__title blue"><a href="#">'.$room['RoomName'].'</a></h1>
					<div class="postcard__subtitle medium">
					<p class="fas   mr-2">Room capacity: '.$room['Capacity'].'</p>

					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">'.$room['Description'].'</div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><i class="fas fa-tag mr-2"></i>Room</li>
						<!-- <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> -->
						
					</ul>
				</div>
			</article>
				';
			}
		}
		
		?>
	</div>
</section>