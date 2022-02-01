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
            <h1>Indulge and treat yourself <br> like you are in Paradise</h1>
          </div>
        </div>
        <div class="slidde">
          <div class="harmadik">
            <h1>Taste the most tempting and heavenly <br> foods on Earth</h1>
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
    <a href="<?php echo $baseUrl?>/booking" class="col btn button">
      <div class="row">
        <i class="col-12 fas fa-bed"></i>
        <p class="col-12">Accommodation</p>
      </div>
    </a>
    <a href="<?php echo $baseUrl?>/gambling" class="col btn button">
      <div class="row">
        <i class="col-12 fas fa-dice"></i>
        <p class="col-12">Casino</p>
      </div>
    </a>
    <a href="<?php echo $baseUrl?>/dining" class="col btn button">
      <div class="row">
        <i class="col-12 fas fa-utensils"></i>
        <p class="col-12">Dining</p>
      </div>
    </a>
    <a href="<?php echo $baseUrl?>/contactus" class="col btn button">
      <div class="row">
        <i class="fab fa-telegram-plane"></i>
        <p class="col-12">Contact us</p>
      </div>
    </a>
  </div>
</div>

<div class="rooms">
  <div class="row roomheader">
    <div class="col-lg-4 col-sm-12 roomcim">
      <h1>Rooms</h1>
    </div>
    <div class="col-lg-8 col-sm-12 roomszoveg">
      <p>At Peaceful Paradise, our luxurious rooms welcome you to unwind to your heart's content. Stay in a posh, stylish room, spacious suite or a breathtaking villa.</p>
      <a href="<?php echo $baseUrl?>/booking#osszesszoba">
        <span class="centerhover" ><i class="fas fa-search"></i> View all rooms  </span> 
      </a>
    </div>
  </div>
  <div class="row leiras">
    <div class="col-lg-7 col-sm-12">
      <!--room picture slider-->
      <div class="card">
        <div class="slides">
          <div slide-id="1" class="slide active">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL1'];
                        break;
                      } ?>" /></div>
            
          </div>
          <div slide-id="2" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL2'];
                        break;
                      } ?>" /></div>
            
          </div>
          <div slide-id="3" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL3'];
                        break;
                      } ?>" /></div>
            
          </div>
          <div slide-id="4" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL1'];
                        break;
                      } ?>" /></div>
            
          </div>
          <div slide-id="5" class="slide">
            <div class="thumbnail"><img src="<?php foreach ($Roomslist as $room) {
                        echo $room['ImageURL2'];
                        break;
                      } ?>" /></div>
            
          </div>
        </div>
        <div class="booksliderbtn row">
          <a class="col-6 righttolefthover" id="prev" href="#" class="btn"><i class="fas fa-chevron-left"></i> Previous</a>
          <a class="col-6 lefttorighthover" id="next" href="#" class="btn">Next <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-sm-12 bookszoveg">
      <h1>Lorem ipsum</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus consectetur erat ante, in eleifend neque interdum at. Etiam aliquet pellentesque augue, et volutpat purus faucibus vitae. Donec ac accumsan lectus. Donec nisi urna, malesuada et magna at, varius pharetra odio. Cras eu lectus quis ipsum vulputate mattis sit amet ac diam. In et libero in eros accumsan blandit. Quisque at lacus eget ante imperdiet convallis. Aliquam ut justo nisi. Cras pharetra tempus mi, eget suscipit ligula ullamcorper quis. Quisque eu arcu porttitor, consectetur eros quis, posuere arcu. Donec non auctor felis. </p>
    </div>
  </div>

</div>





<!-- End // .directional_nav -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- partial -->
<script src="./mainpage/slider/script.js"></script>
<script src="./mainpage/bookslider/script.js"></script>