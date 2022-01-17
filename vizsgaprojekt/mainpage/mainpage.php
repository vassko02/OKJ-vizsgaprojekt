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
      <div class="card">
        <div class="slides">
          <div slide-id="1" slide-color="#D18B49" class="slide active">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL1'];
                        break;
                      } ?>" /></div>
            <h1 class="title">Room 1</h1>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
          <div slide-id="2" slide-color="#542F13" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL2'];
                        break;
                      } ?>" /></div>
            <h1 class="title">Room 2</h1>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
          <div slide-id="3" slide-color="#A5AAAE" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL3'];
                        break;
                      } ?>" /></div>
            <h1 class="title">Room 3</h1>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
          <div slide-id="4" slide-color="#ED8D1F" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL1'];
                        break;
                      } ?>" /></div>
            <h1 class="title">Room 4</h1>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
          <div slide-id="5" slide-color="#C4C8CB" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL2'];
                        break;
                      } ?>" /></div>
            <h1 class="title">Room 5</h1>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
        <div class="footer"><a id="prev" href="#" ripple="" ripple-color="#666666" class="btn">Prev</a><a id="next" href="#" ripple="" ripple-color="#666666" class="btn">Next</a></div>
      </div>
    </div>
    <div class="col-6">
      <h1>Lorem ipsum</h1>
    </div>
  </div>

</div>





<!-- End // .directional_nav -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- partial -->
<script src="./mainpage/slider/script.js"></script>
<script src="./mainpage/bookslider/script.js"></script>