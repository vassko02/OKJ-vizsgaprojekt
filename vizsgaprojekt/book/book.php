<?php
$error = false;
$guestnumbererror = false;
$Roomslist = $RoomObj->selectallrooms();


if (isset($_POST['Edit'])) {
	$edit = $_POST['Edit'];
	if ($edit == "true") {
	} else {
		session_unset();
	}
} else {

	$HelpObj->clearReservation();
	$edit = "false";
}

if (isset($_POST['btn_srch'])) {
	$in =  $_POST['checkin'];
	$out = $_POST['checkout'];
	$date = date('Y-m-d');
	$guestnumber = $_POST['childrennumber'] + $_POST['adultnumber'];
	//echo $guestnumber;
	if (($_POST['adultnumber'] > 1 || $_POST['childrennumber'] > 1) && $guestnumber <= 5) {
		$_SESSION['adult'] = $_POST['adultnumber'];
		$_SESSION['children'] = $_POST['childrennumber'];
		$error = false;
		if ($in < $out && $in > $date) {
			$_SESSION['checkin'] = $_POST['checkin'];
			$_SESSION['checkout'] = $_POST['checkout'];
			$filteredrooms = $RoomObj->selectrooms($_POST);

			$guestnumbererror = false;
		} else {
			$error = true;
		}
	} else {
		$guestnumbererror = true;
	}
}
//$HelpObj->writearray($_POST);
//$HelpObj->writearray($_SESSION);


?>

	<div class="d-flex foglalashatter">
		<div class="datas " id="box">
			<form method="POST">
				<div class="form-group div1 row">
					<div class="first ">
						<div class="second row">
							<div class="third col-lg-4 col-sm-6">
								<label class="col-form-label" for="adultsnumber">Number of adults</label>
							</div>
							<div class="third col-lg-8 col-sm-6">
								<input class="form-control" required value="<?php if (isset($_SESSION['adult'])) {
																				echo $_SESSION['adult'];
																			} else {
																				echo 2;
																			} ?>" type="number" name="adultnumber" id="adultsnumber" placeholder="Adults">
							</div>
						</div>
					</div>
					<div class="first ">
						<div class="second row">
							<div class="third col-lg-4 col-sm-6">
								<label class="col-form-label" for="childrennumber">Number of children</label>
							</div>
							<div class="third col-lg-8 col-sm-6">
								<input class="form-control" required value="<?php if (isset($_SESSION['children'])) {
																				echo $_SESSION['children'];
																			} else {
																				echo 0;
																			} ?>" type="number" name="childrennumber" id="childrennumber" placeholder="Children">
							</div>
						</div>
					</div>
					<div class="first">
						<div class="second row">
							<div class="third col-lg-4 col-sm-6">
								<label class="col-form-label" for="arrivaldate">Check-in</label>
							</div>
							<div class="third col-lg-8 col-sm-6">
								<input type="date" required value="<?php if (isset($_SESSION['checkin'])) {
																		echo $_SESSION['checkin'];
																	} else {
																		echo date('2022-04-20');
																	} ?>" class="form-control " name="checkin" id="arrivaldate">
							</div>
						</div>
					</div>
					<div class="first">
						<div class="second row">
							<div class="third col-lg-4 col-sm-6">
								<label class="col-form-label" for="leavingdate">Check-out</label>
							</div>
							<div class="third col-lg-8 col-sm-6">
								<input type="date" required value="<?php if (isset($_SESSION['checkout'])) {
																		echo $_SESSION['checkout'];
																	} else {
																		echo date('2022-04-25');
																	} ?>" class="form-control " name="checkout" id="leavingdate">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group div3">
					<button class="btn src"  type="submit" name="btn_srch" ><a id="scrollaaa" href="#pageHeaderTitle" >Search rooms</a></button>
					<p id="error"><?php if ($error === true) {
										echo 'Please provide valid dates!';
									} else {
									} ?></p>
					<p id="error"><?php if ($guestnumbererror === true) {
										echo 'Please provide valid numbers!';
									} else {
									} ?></p>
					<!-- <button class="learn-more btn" type="submit" name="btn_srch" id="button">
					<span class="circle" aria-hidden="true">
						<span class="icon arrow"></span>
					</span>
					<a class="button-text"  href="">Search rooms</a>
				</button> -->
				</div>
			</form>
		</div>
		<div class="rightside">
					<h1 id="makeareservation" class="">
						Make a reservation
					</h1>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
						<p>With high ceilings and spacious lanais overlooking the ocean, these rooms incorporate patterns, textures and art inspired by the Vespucci coastline. You'll also receive exclusive Club Floor privileges including breakfast, a full-service bar, and private check-in and check-out.</p><br>
				</div>
				<div class="carousel-item">
								<p>Through our Complete Suite Experience, you’ll benefit from a heightened level of service, amenities and privacy while taking in idyllic views of Vespucci Beach from your oceanfront suite. </p><br>
				</div>
				<div class="carousel-item">
					<p>The Elite suites are our newest oceanfront suites, offering sensational views of the Pacific Ocean and islands beyond. Enjoy special services and amenities including a remarkable wine collection, a personal assistant and more.</p><br>
				
				</div>
			</div>
		
			</div>
					</div>
	
	</div>

<?php
// echo ('<pre>');
// print_r($asd);
// echo ('</pre>');
?>
<!-- 	 -->
<section class="dark hatter mt-5" id="osszesszoba">
	<div class=" py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">Our Rooms</h1>
		<?php
		if (isset($_POST['btn_srch']) && isset($_SESSION['checkin'])) {

			// $_POST = array();
			//  echo ('<pre>');
			// print_r($_POST);
			// echo ('</pre>');
			if (count($filteredrooms) == 0) {
				echo '
					<p id="sorry">We dont have any available room at the moment :(</p>
				';
			}
			//rendezés szobaár alapján
			$price = array();
			foreach ($filteredrooms as $key => $row) {
				$price[$key] = $row['RoomPrice'];
			}
			array_multisort($price, SORT_ASC, $filteredrooms);
			foreach ($filteredrooms as $room) {
				echo '
			
				<article class="postcard dark blue">
				<a class="postcard__img_link" >
					<img class="postcard__img"  id="' . $room['ImageURL1'] . '" src="' . $room['ImageURL1'] . '" alt="Image Title" />
				</a>
				<div class="postcard__text">
					<h1 class="postcard__title blue">' . $room['RoomName'] . '</h1>
					<div class="postcard__subtitle medium">
						<p class="mr-2">Room capacity: ' . $room['Capacity'] . '</p>
					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">' . $room['Description'] . '</div>';
				//szoba mérete és wifi
				echo '
					<ul class="postcard__tagbox ">
					<li class="tag__item play blue ">
						<i class="fa-solid fa-maximize"></i> ' . $room['size'] . ' square-meters
					</li>
					<li class="tag__item play blue ">
						<i class="fa-solid fa-wifi"></i> Free Wifi
					</li>
				';
				if (strpos($room['RoomName'], 'Non-Smoking')) { //cigis szoba
					echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-ban-smoking"></i> Non-Smoking
					</li>';
				} else { //nem cigis szoba
					echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-smoking"></i> Smoking
					</li>';
				}
				echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-tv"></i> 4K TV
					</li>
					<li class="tag__item play blue ">
						<i class="fa-solid fa-snowflake"></i> Air Conditioner
					</li>
					<li class="tag__item play blue ">
						<i class="fa-solid fa-mug-hot"></i> Coffee Maker
					</li>
					<li class="tag__item play blue ">
					<i class="fa-solid fa-cloud-sun"></i> Own Balcony
					</li>
				';
				echo '		
					</ul>
					<h3>$' . $room['RoomPrice'] . '/night</h3>
					<form action="' . $baseUrl . '/booking/roomdetail"  method="post">
					<button type="submit" class="btn text-light" "><i class="fas"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
					<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
					<path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
					</svg> Book now</button>
					<input type="hidden" id="Roomid" name="Roomid" value="' . $room['RoomID'] . '">
					</form>
				</div>
				</article>
						
				';
				//UPDATE `room` SET `size`= 12 WHERE room.RoomName = "Classic Room | 1 King | Non-Smoking"
				//SELECT RoomName,Description,Capacity,RoomPrice,size FROM `room` group by RoomName
			}
		} else {
			$price = array();
			foreach ($Roomslist as $key => $row) {
				$price[$key] = $row['RoomPrice'];
			}
			array_multisort($price, SORT_ASC, $Roomslist);
			foreach ($Roomslist as $room) {
				echo '
				<article class="postcard dark blue">
				<a class="postcard__img_link" >
					<img class="postcard__img" id="' . $room['ImageURL1'] . '" src="' . $room['ImageURL1'] . '" alt="Image Title" />
				</a>
				<div class="postcard__text">
					<h1 class="postcard__title blue"><a href="#">' . $room['RoomName'] . '</a></h1>
					<div class="postcard__subtitle medium">
					<p class="mr-2">Room capacity: ' . $room['Capacity'] . '</p>

					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">' . $room['Description'] . '</div>';
				echo '
					<ul class="postcard__tagbox ">
					<li class="tag__item play blue ">
						<i class="fa-solid fa-maximize"></i> ' . $room['size'] . ' square-meters
					</li>
					<li class="tag__item play blue ">
						<i class="fa-solid fa-wifi"></i> Free Wifi
					</li>
				';
				if (strpos($room['RoomName'], 'Non-Smoking')) { //cigis szoba
					echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-ban-smoking"></i> Non-Smoking
					</li>';
				} else { //nem cigis szoba
					echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-smoking"></i> Smoking
					</li>';
				}
				echo '
				</div>
				</article>';
			}
		}

		?>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<span class="close"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
			</svg></span>
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-interval="false" data-bs-ride="carousel">
			<div class="carousel-inner ">
				<div class="carousel-item active ">
					<img class="d-block" id="sliderimg1" src="" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block" id="sliderimg2" src="" alt="Second slide">
				</div>
				<div class="carousel-item ">
					<img class="d-block" id="sliderimg3" src="" alt="Third slide">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>

		<div id="caption"></div>
	</div>
</section>
 
<?php
foreach ($Roomslist as $room) {
	echo '
		<script>
	// Get the modal
	var modal = document.getElementById("myModal");
	
	// Get the image and insert it inside the modal - use its "alt" text as a caption
	
	var img = document.getElementById("' . $room['ImageURL1'] . '");
	var sliderimg1 = document.getElementById("sliderimg1");
	var sliderimg2 = document.getElementById("sliderimg2");
	var sliderimg3 = document.getElementById("sliderimg3");
	var captionText = document.getElementById("caption");
	img.onclick = function(){
	  modal.style.display = "block";
	  sliderimg1.src = "' . $room['ImageURL1'] . '";
	  sliderimg2.src = "' . $room['ImageURL2'] . '";
	  sliderimg3.src = "' . $room['ImageURL3'] . '";
	  captionText.innerHTML = "' . $room['RoomName'] . '";
	}
	
	
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	  modal.style.display = "none";
	}
	 
	</script>
		
		';
}
?>