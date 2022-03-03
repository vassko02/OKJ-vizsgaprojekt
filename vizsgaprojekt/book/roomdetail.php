<?php
$id = $_POST['Roomid'];
$room = $RoomObj->selectoneroom($id);
$room2 = $RoomObj->selectoneroom2($id);
$services = $ServiceObj->getallservice();
$_SESSION['roomid'] = $_POST['Roomid'];
// echo '<pre>';
// print_r($_POST);
// print_r($_SESSION);
// echo '</pre>';
//  $serviceid = $_POST['select'];
//  echo $serviceid;
?>

<form action="<?php echo $baseUrl ?>/booking/customerdetails" class="keret" method="post">
    <div class="roooom">
        <div class="szobakepek">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img id="myImg" src="<?php echo $room2['ImageURL1']; ?>" class="d-block w-100" alt="<?php echo $room2['RoomName'] ?>">
                    </div>
                    <div class="carousel-item">
                        <img id="myImg2" src="<?php echo $room2['ImageURL2']; ?>" class="d-block w-100" alt="<?php echo $room2['RoomName'] ?>">
                    </div>
                    <div class="carousel-item">
                        <img id="myImg3" src="<?php echo $room2['ImageURL3']; ?>" class="d-block w-100" alt="<?php echo $room2['RoomName'] ?>">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="szobaszoveg">
            <h1><?php echo $room2['RoomName'];
                $_SESSION['roomname'] = $room2['RoomName']; ?></h1>
            <h4 class=""><i>Room capacity: <?php echo $room2['Capacity']; ?></i></h4>
            <div class="divider"></div>
            <p class=""><?php echo $room2['Description']; ?></p>
            <?php
            $attributes = explode(";", $room2['attributes']);
            echo '
					<ul class="postcard__tagbox ">
					<li class="tag__item play blue ">
						<i class="fa-solid fa-maximize"></i> ' . $room2['size'] . ' m<sup>2</sup>
					</li>
					<li class="tag__item play blue ">
						<i class="fa-solid fa-wifi"></i> Free Wifi
					</li>
				';
            if (strpos($room2['RoomName'], 'Non-Smoking')) {
                echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-ban-smoking"></i> Non-Smoking
					</li>';
            } else {
                echo '
					<li class="tag__item play blue ">
						<i class="fa-solid fa-smoking"></i> Smoking
					</li>';
            }
            foreach ($attributes as $attribute) {
                if ($attribute === 'aircon') {
                    echo '<li class="tag__item play blue">
                                    <i class="fa-solid fa-snowflake"></i> Air Conditioner
                                </li>';
                } else if ($attribute === 'flattv') {
                    echo '
                                <li class="tag__item play blue">
                                    <i class="fa-solid fa-tv"></i> Flat TV
                                </li>';
                } else if ($attribute === '4ktv') {
                    echo '
                                <li class="tag__item play blue">
                                    <i class="fa-solid fa-tv"></i> 4K TV
                                </li>';
                } else if ($attribute === 'movietheatre') {
                    echo '
                                <li class="tag__item play blue">
                                    <i class="fa-solid fa-film"></i> Movie Theatre
                                </li>';
                } else if ($attribute === 'coffeemaker') {
                    echo '<li class="tag__item play blue">
                                    <i class="fa-solid fa-mug-hot"></i> Coffee Maker
                                </li>';
                } else if ($attribute === 'smartfridge') {
                    echo '<li class="tag__item play blue">
                                    <i class="fa-solid fa-satellite-dish"></i> Smart Fridge
                                </li>';
                } else if ($attribute === 'smartroom') {
                    echo '<li class="tag__item play blue">
                                    <i class="fa-solid fa-microchip"></i> Smart Room
                                </li>';
                } else if ($attribute === 'jacuzzi') {
                    echo '<li class="tag__item play blue ">
                                    <i class="fa-solid fa-hot-tub-person"></i> Own Jacuzzi
                                </li>';
                } else if ($attribute === 'balcony') {
                    echo '<li class="tag__item play blue ">
                                    <i class="fa-solid fa-cloud-sun"></i> Own Balcony
                                </li>';
                } else if ($attribute === 'champagne') {
                    echo '<li class="tag__item play blue ">
                                    <i class="fa-solid fa-champagne-glasses"></i> Pre-Chilled Champagne
                                </li>';
                }
            }
            echo '</ul>';
            ?>
            <div class="szobabottom">
                <div class="d-flex pb-2">
                    <h5 class=""><i class="fa-solid fa-calendar-days"></i>&nbsp; <?php echo $_SESSION['checkin']; echo ' <strong>—</strong> '; echo $_SESSION['checkout'];?></h5>
                    <h5 class="ms-auto"> Room price: $<?php echo $room2['RoomPrice'];
                                                        $_SESSION['RoomPrice'] = $room2['RoomPrice']; ?>/night
                    </h5>
                </div>
            </div>
            <select class="form-select" name="select" aria-label="Default select example">

                <?php foreach ($services as $service) {
                    echo ' <option value="' . $service['ServiceID'] . '">' . $service['ServiceType'] . ' $' . $service['ServicePrice'] . ' /night </option>';
                } ?>

            </select>

            <button type="submit" name="btn_contin" class="continue">
                Continue &nbsp;<i class="fa-solid fa-arrow-right-long"></i>
            </button>
            <a href="<?php echo $baseUrl ?>/booking" name="btn_cancel" class="cancel">
                <i class="fa-solid fa-xmark"></i> &nbsp;Cancel
            </a>

        </div>

    </div>

    </div>
</form>

<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">

    <div id="caption"></div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var img2 = document.getElementById('myImg2');
    var img3 = document.getElementById('myImg3');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    img2.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    img3.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>