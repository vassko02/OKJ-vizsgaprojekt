<?php
//$Roomslist = $RoomObj->selectallrooms();
$RoomPics1 = $RoomObj->selectRoomPics1ByType();
$appetiser = $StorageObj->getTwoFoodByType('Appetiser');
$soup = $StorageObj->getTwoFoodByType('Soup');
$dessert = $StorageObj->getTwoFoodByType('Dessert');
$main = $StorageObj->getTwoFoodByType('Main Course');

$appetisermobil = $StorageObj->getFoodByType('Appetiser');
$soupmobil = $StorageObj->getFoodByType('Soup');
$dessertmobil = $StorageObj->getFoodByType('Dessert');
$mainmobil = $StorageObj->getFoodByType('Main Course');

$delay = 100;
$delaymobil = 100;
//print_r($RoomPics1);
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

  <div class="mobilnezet">
    <h1>Peaceful Paradise Royale Hotel Las Vegas</h1>
    <p>"Who's prepared to pay the price <br> For a trip to paradise?"</p>
  </div>

</div>

<div class="icons">
  <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="focim">
    <h1>Hotel amenities</h1>
    <p>Explore Our Services</p>
  </div>
  <div class="row ikonok">
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-wifi"></i>
      <h1>Free Wifi</h1>
      <p>High speed internet access available. <br> Check email and browse the web.</p>
    </div>
    <a data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" href="<?php echo $baseUrl; ?>/dining" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-utensils"></i>
      <h1>Restaurant</h1>
      <p>Have an unforgettable dining experiece in our 3 Michelin Star restaurant.</p>
    </a>
    <a data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" href="<?php echo $baseUrl; ?>/gambling" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-dice"></i>
      <h1>Casino</h1>
      <p>Elevate your play in our casino playing your favorite table games or win big with slot machines.</p>
    </a>
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-swimming-pool"></i>
      <h1>4 Pools</h1>
      <p>Enjoy your day and relax on a poolside daybed or in acabana at one of our many pools.</p>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-spa"></i>
      <h1>Spa & salon</h1>
      <p>Relax and indulge at the spa or get a personal refresh at our salon.</p>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-bicycle"></i>
      <h1>Fitness center</h1>
      <p>Access to a fitness center complete with weights, cardio machines and more.</p>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-parking"></i>
      <h1>Parking</h1>
      <p>Valet and self-parking available.</p>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" id="evcharger" class="col-lg-4 col-md-6 col-sm-12">
      <i class="fas fa-charging-station"></i>
      <h1>EV Charging</h1>
      <p>Four charging stations available located in valet parking.</p>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-lg-4 col-md-6 col-sm-12" id="roki">
      <i class="fab fa-accessible-icon"></i>
      <h1>Accessibility</h1>
      <p>Accessible parking and hotel rooms available.</p>
    </div>
  </div>
</div>

<div class="rooms">
  <div class="row roomheader" data-aos="slide-up" data-aos-duration="2000" data-aos-once="true" data-aos-anchor-placement="top-bottom">
    <div class="col-lg-4 col-sm-12 roomcim">
      <h1>Rooms</h1>
    </div>
    <div class="col-lg-8 col-sm-12 roomszoveg">
      <p>At Peaceful Paradise, our luxurious rooms welcome you to unwind to your heart's content. Stay in a posh, stylish room, spacious suite or a breathtaking villa.</p>
      <a class="centerhover" href="<?php echo $baseUrl ?>/booking#osszesszoba">
        <i class="fas fa-search"></i> View all rooms
      </a>
    </div>
  </div>
  <div class="row leiras">
    <div class="" data-aos="slide-right" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
      <!--room picture slider-->
      <div class="card">
        <div class="slides">
          <div slide-id="1" class="slide active">
            <div class="thumbnail booksliderimg"><img src="<?php echo $RoomPics1[2]; ?>" /></div>
          </div>
          <div slide-id="2" class="slide">
            <div class="thumbnail"><img src="<?php echo $RoomPics1[3]; ?>" /></div>
          </div>
          <div slide-id="3" class="slide">
            <div class="thumbnail"><img src="<?php echo $RoomPics1[5]; ?>" /></div>
          </div>
        </div>
        <div class="booksliderbtn row">
          <a class="col-6 righttolefthover" id="prev" href="#" class="btn"><i class="fas fa-chevron-left"></i> Previous</a>
          <a class="col-6 lefttorighthover" id="next" href="#" class="btn">Next <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </div>
    <div class="bookszoveg" data-aos="slide-left" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
      <div class="slideszoveg active">
        <h1>High-class Rooms</h1>
        <p>One night in one of our luxurious rooms and you will realize that indulgence is not a privilige. It is a way of life.
          From 30-square-meters to 150-square-meters of enviable comforts, our rooms features
          exclusive amenities and state-of-the-art electronics.</p>
      </div>
      <div class="slideszoveg">
        <h1>Suites</h1>
        <p>Upgrade your vacation with a stay in one of our upscale suites at Peaceful Paradise.
          Whether you are here for a family trip, a business meeting or celebrating a special occasion,
          there is a suite for you.</p>
      </div>
      <div class="slideszoveg">
        <h1>Villas</h1>
        <p>Stay in an opulent villa at Peaceful Paradise and feel like an emperor.
          Be wowed by over-the-top amenities, exceptional service,
          lavish furnishings and stunning views.</p>
      </div>
    </div>
  </div>
</div>

<div class="roomelvalaszto">
  <div class="header" data-aos="fade-zoom-in" data-aos-duration="1500" data-aos-delay="100">
    <h1>An experience straight from paradise</h1>
    <p>Select from an extensive list of room types, amenities, views and locations at the iconic
      Peaceful Paradise resort. <br> As one of the largest Las Vegas hotels,
      there are five "towers" of the most luxurious rooms you have ever seen.</p>
  </div>
  <div class="leiras row" data-aos="fade-zoom-in" data-aos-duration="1500" data-aos-delay="200">
    <div class="col-sm-6 col-lg-2">
      <h1>10</h1>
      <h3>Bars / Lounges</h3>
    </div>
    <div class="col-sm-6 col-lg-2">
      <h1>3</h1>
      <h3>Villas</h3>
    </div>
    <div class="col-sm-6 col-lg-2">
      <h1>10</h1>
      <h3>Suites</h3>
    </div>
    <div class="col-sm-6 col-lg-2">
      <h1>150+</h1>
      <h3>Hotel rooms</h3>
    </div>
    <div class="col-sm-6 col-lg-2">
      <h1><i class="fas fa-infinity"></i></h1>
      <h3>Infinite luxury</h3>
    </div>
  </div>
</div>

<div class="restaurant">
  <div class="header row" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="100">
    <h1 class="col-lg-5 col-sm-12">Eat like an Emperor</h1>
    <div class="col-lg-7 col-sm-12">
      <p>Enjoy the best eats at Peaceful Paradise Royale Restaurant,
        available in all price points and cuisines.</p>
      <a class="centerhover" href="<?php echo $baseUrl; ?>/dining">Go ahead - indulge.</a>
    </div>
  </div>
  <div class="leiras row">
    <a href="<?php echo $baseUrl; ?>/dining" class="col-sm-12 col-md-12 col-lg-12 col-xl-6 etteremkep">
      <img src="" alt="">
    </a>
    <div class="col-sm-12 col-lg-12 col-xl-6 row etteremleiras">
      <div class="col-md-6">
        <?php
        //rendes nézet
        foreach ($appetiser as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delay . '" data-aos-duration="1000">
            <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center eloetel">
              <img src="' . $item['ImageURL'] . '" alt="">
              <div class="desc ps-3">
                <div class="text d-flex align-items-center">
                  <h1 class="">' . $item['ItemName'] . '</h1>
                  <h3 class="">$' . $item['Price'] . '</h3>
                </div>
              </div>
            </a>
          </div>';
          $delay += 100;
        }
        foreach ($soup as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delay . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center leves">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delay += 100;
        }

        //mobil nézet
        foreach ($appetisermobil as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delaymobil . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center eloetelmobil">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delaymobil += 100;
        }
        foreach ($soupmobil as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delaymobil . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center levesmobil">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delaymobil += 100;
        }
        ?>
      </div>
      <div class="col-md-6">
        <?php
        //rendes nézet
        foreach ($main as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delay . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center foetel">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delay += 100;
        }
        foreach ($dessert as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delay . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center desszert">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delay += 100;
        }

        //mobil nézet
        foreach ($mainmobil as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delaymobil . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center foetelmobil">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delaymobil += 100;
        }
        foreach ($dessertmobil as $item) {
          echo '<div data-aos="fade-up" data-aos-delay="' . $delaymobil . '" data-aos-duration="1000">
          <a href="' . $baseUrl . '/dining/menu#' . $item['StorageID'] . '" class="kaja d-flex align-items-center desszertmobil">
            <img src="' . $item['ImageURL'] . '" alt="">
            <div class="desc ps-3">
              <div class="text d-flex align-items-center">
                <h1 class="">' . $item['ItemName'] . '</h1>
                <h3 class="">$' . $item['Price'] . '</h3>
              </div>
            </div>
          </a>
        </div>';
          $delaymobil += 100;
        }
        ?>
      </div>
    </div>
  </div>
</div>




<!-- End // .directional_nav -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- partial -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="./mainpage/slider/script.js"></script>
<script src="./mainpage/bookslider/script.js"></script>
<script>
  AOS.init({
    once: true
    //disable: 'mobile'
  });
</script>
<!--
  data-aos: az animácó
  data-aos-anchor: egy másik elemhez van hozzáfűzve, akkor jelenik meg
  data-aos-offset: 
  data-aos-easing: 
  data-aos-anchor-placement: a képernyő melyik részekor jelenjen meg
  data-aos-duration: maga a delay
  https://preview.colorlib.com/#unwind
-->