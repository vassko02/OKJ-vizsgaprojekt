<?php
	$Roomslist = $RoomObj->selectallrooms();
	echo ('<pre>');
	 print_r($_SESSION);
	 echo ('</pre>');
	if (isset($_POST['btn_srch'])) {
		//session_unset();
		$filteredrooms = $RoomObj->selectrooms($_POST);
		$_SESSION['adult'] = $_POST['adultnumber'];
		$_SESSION['children'] = $_POST['childrennumber'];
		$_SESSION['checkin'] = $_POST['checkin'];
		$_SESSION['checkout'] = $_POST['checkout'];
		// echo ('<pre>');
		//  print_r($filteredrooms);
		//  echo ('</pre>');
	}
?>

<div class="book">
	<div class="datas" id="box">
		<form method="POST">
			<div class="form-group div1 row">
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="adultsnumber">Adults number</label>
						</div>
						<div class="third">
							<input class="form-control" required value="<?php if (isset($_POST['adultnumber'])) {
									echo $_POST['adultnumber'];
								} ?>" type="number" name="adultnumber" id="adultsnumber" placeholder="Adults">
						</div>
					</div>
				</div>
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="childrennumber">Children number</label>
						</div>
						<div class="third">
							<input class="form-control" required value="<?php if (isset($_POST['childrennumber'])) {
									echo $_POST['childrennumber'];
								} ?>" type="number" name="childrennumber" id="childrennumber" placeholder="Children">
						</div>
					</div>
				</div>
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="roomnumber">Room number </label>
						</div>
						<div class="third">
							<input class="form-control" type="number" name="roomnumber" id="roomnumber" placeholder="Rooms">
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
							<input type="date" required value="<?php if (isset($_POST['checkin'])) {
									echo $_POST['checkin'];
								} ?>"  class="form-control " name="checkin" id="arrivaldate">
						</div>
					</div>
				</div>
				<div class="first col">
					<div class="second">
						<div class="third">
							<label class="col-form-label" for="leavingdate">Check-out</label>
						</div>
						<div class="third">
							<input type="date" required value="<?php if (isset($_POST['checkout'])) {
									echo $_POST['checkout'];
								} ?>" class="form-control " name="checkout" id="leavingdate">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group div3">
			<button  class="btn btn-primary" type="submit" name="btn_srch">Submit</button>  
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
<section class="dark">
	<div class=" py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">All of our Rooms</h1>
		<?php
		if (isset($_POST['btn_srch'])) {

			// $_POST = array();
			//  echo ('<pre>');
 			// print_r($_POST);
 			// echo ('</pre>');
			foreach ($filteredrooms as $room) {
				echo'
			
				<article class="postcard dark blue">
				<a class="postcard__img_link" href="index.php?m=roomdetail&">
					<img class="postcard__img" src="./book/pictures/room1.jpeg" alt="Image Title" />
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
					<form action="index.php?m=roomdetail&Roomid='.$room['RoomID'].'"  method="post">
					<button type="submit" class="btn text-light" "><i class="fas"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
					<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
					<path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
					</svg> Book now</button>
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
					<img class="postcard__img" src="./book/pictures/room1.jpeg" alt="Image Title" />
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
		
		<!-- <article class="postcard dark red">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="./book/pictures/room3.jpg" alt="Image Title" />
			</a>
			<div class="postcard__text">
				<h1 class="postcard__title red"><a href="#">Classic Room | 2 Kings | Non-Smoking</a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">One of our most popular rooms in the entire hotel, equipped with a 4K TV, a smart fridge, and a microwave. Outside on the balcony you will se on of the best sceneries that you have ever seen. The room has a classic look, with some modern touches to it. This is one of our non smoking rooms with unlimited Wifi access.</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Room</li>
					 <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> 
					<li class="tag__item play red">
						<a href="#"><i class="fas"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
								<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
								<path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
							</svg> Book now</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard dark green">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="./book/pictures/room2.jpg" alt="Image Title" />
			</a>
			<div class="postcard__text">
				<h1 class="postcard__title green"><a href="#">Exclusive Room | 1 King | Smoking</a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">One of our most exclusive rooms on the top floor of the hotel. This room is equipped with a lot of elite features, for example there is a jacuzzi installed in this room, in this room you are allowed to smoke, and you also have access to unlimited Wifi access. If you choose this room there will be waiting you with pre-chilled champagne in the fridge.</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Room</li>
					< <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> 
					<li class="tag__item play green">
						<a href="#"><i class="fas"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
								<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
								<path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
							</svg> Book now</a>
					</li>
				</ul>
			</div>
		</article>
		<article class="postcard dark yellow">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="./book/pictures/room4.jpg" alt="Image Title" />
			</a>
			<div class="postcard__text">
				<h1 class="postcard__title yellow"><a href="#">Premium Room | 1 King | Non-Smoking</a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">A premium room for premium guests. The room is equipped with a movie theather that you can watch enything on. The design of this room is made by one of our finest designers, to make sure everyone feels comfortable staying here. When sitting on the balcony cou can see the best view you have ever seen in your entire life.</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Room</li>
					< <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li> 
					<li class="tag__item play yellow">
						<a href="#"><i class="fas"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
								<path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
								<path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
							</svg> Book now</a>
					</li>
				</ul>
			</div>
		</article> -->
	</div>
</section>