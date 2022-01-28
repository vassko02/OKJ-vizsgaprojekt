<?php
$id = $_POST['Roomid'];
$room = $RoomObj->selectoneroom($id);
$services = $ServiceObj->getallservice();
$_SESSION['roomid'] = $_POST['Roomid'];
// echo '<pre>';
// print_r($_POST);
// print_r($_SESSION);
// echo '</pre>';
//  $serviceid = $_POST['select'];
//  echo $serviceid;
?>

<form action="<?php echo $baseUrl?>/booking/customerdetails" class="keret " method="post">
    <div class="container roooom mt-5 ">
        <div class="row">
            <div class="col ">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="myImg" src="<?php foreach ($room as $item) {
                                            echo $item['ImageURL1'];
                                        } ?>" class="d-block w-100" alt="<?php echo $item['RoomName'] ?>">

                        </div>
                        <div class="carousel-item">
                            <img id="myImg2" src="<?php foreach ($room as $item) {
                                            echo $item['ImageURL2'];
                                        } ?>" class="d-block w-100" alt="<?php echo $item['RoomName'] ?>">

                        </div>
                        <div class="carousel-item">
                            <img id="myImg3" src="<?php foreach ($room as $item) {
                                            echo $item['ImageURL3'];
                                        } ?>" class="d-block w-100" alt="<?php echo $item['RoomName'] ?>">

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
            <div class="col">
                <h1><?php foreach ($room as $item) {
                        echo $item['RoomName'];
                        $_SESSION['roomname'] = $item['RoomName'];
                    } ?></h1>
                <h4 class="mt-3">Room capacity: <?php foreach ($room as $item) {
                                                    echo $item['Capacity'];
                                                } ?></h4>
                <p class="text-justify mt-5 fs-5"><?php foreach ($room as $item) {
                                                        echo $item['Description'];
                                                    } ?></p>
                <h5 class="float-right"> Room price: $<?php foreach ($room as $item) {
                                        echo $item['RoomPrice'];
                                        $_SESSION['RoomPrice'] = $item['RoomPrice'];
                                    } ?>/night
                </h5>
                <select class="form-select bg-dark text-light" name="select" aria-label="Default select example">

                    <?php foreach ($services as $service) {
                        echo ' <option value="' . $service['ServiceID'] . '">' . $service['ServiceType'] . ' $'.$service['ServicePrice'].' /night </option>';
                    } ?>

                </select>
              
                <button type="submit" name="btn_contin" class="btn btn-warning mb-3">
                    Continue
                </button>      
                <a href="<?php echo $baseUrl ?>/booking"  name="btn_cancel" class="btn btn-danger mb-3 ">
                    Cancel
                </a>
                
                </div>

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
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
img2.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
img3.onclick = function(){
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