<?php
$Roomslist = $RoomObj->selectallrooms();
?>
<div class="lapozo">

  <!-- partial:index.partial.html -->
  <div class="slidder">
    <div class="slidde_viewer">
      <div class="slidde_group">
        <div class="slidde">
          <div class="elso">
            <h1>Peaceful Paradise Royale Hotel Las Vegas</h1>
            <h2>"Who's prepared to pay the price <br> For a trip to paradise?"</h2>
          </div>
        </div>
        <div class="slidde">
          <div class="masodik">
            <h1>Stay in our hotel to go through <br> a phenomenal experience</h1>
          </div>
        </div>
        <div class="slidde">
          <div class="harmadik">
            <h1>Indulge and treat yourself <br> like you are in paradise</h1>
          </div>
        </div>
        <div class="slidde">
          <div class="harmadik">
            <h1>Taste the most tempting and heavenly <br> foods on the Earth</h1>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End // .slidder -->

  <div class="slidde_buttons">
  </div>

  <div class="directional_nav">
    <div class="previous_btn" title="Previous">
      <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
      </svg>
    </div>
    <div class="next_btn" title="Next">
      <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
      </svg>
    </div>
  </div>
</div>

<div class="icons">
  <div class="row">
    <a href="index.php?m=book" class="col btn button">
      <div class="row">
        <i class="col-12 fas fa-bed"></i>
        <p class="col-12">Accommodation</p>
      </div>
    </a>
    <a href="index.php?m=casino" class="col btn button">
      <div class="row">
        <i class="col-12 fas fa-dice"></i>
        <p class="col-12">Casino</p>
      </div>
    </a>
    <a href="index.php?m=restaurant" class="col btn button">
      <div class="row">
        <i class="col-12 fas fa-utensils"></i>
        <p class="col-12">Dining</p>
      </div>
    </a>
    <a href="index.php?m=contactus" class="col btn button">
      <div class="row">
        <i class="fab fa-telegram-plane"></i>
        <p class="col-12">Contact us</p>
      </div>
    </a>
  </div>
</div>

<div class="rooms">
  <div class="row">
    <div class="col-lg-4 col-sm-12 roomcim">
      <h1>Rooms</h1>
    </div>
    <div class="col-lg-8 col-sm-12 roomszoveg">
      <p>At Peaceful Paradise, our luxurious rooms welcome you to unwind to your heart's content. Stay in a posh, stylish room, spacious suite or a breathtaking villa.</p>
      <a href="../book/book.php">View all rooms
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
  </div>
  <div class="row ">
    <div class="col-6">
      <!--room picture slider-->

      <div id="roomslider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#roomslider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#roomslider" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#roomslider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL1'];
                        break;
                      } ?>" class="d-block w-100" alt="">
          </div>
          <div class="carousel-item">
            <img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL2'];
                        break;
                      } ?>" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL3'];
                        break;
                      } ?>" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#roomslider" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#roomslider" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="col-6">
      asd
    </div>
  </div>

</div>





<!-- End // .directional_nav -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- partial -->
<script src="./mainpage/slider/script.js"></script>